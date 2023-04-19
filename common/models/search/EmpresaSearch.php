<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Empresa;

/**
 * EmpresaSearch represents the model behind the search form of `common\models\Empresa`.
 */
class EmpresaSearch extends Empresa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'rut'], 'integer'],
            [['razon_social'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Empresa::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

         if (\Yii::$app->user->can('Empresa')){
            $id = \Yii::$app->user->id;
            $user= \common\models\User::findOne($id);
          
            $query->andFilterWhere([
                'id' => $user->id_empresa
            ]);
         
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'rut' => $this->rut,
        ]);

        $query->andFilterWhere(['like', 'razon_social', $this->razon_social]);

        return $dataProvider;
    }
}
