<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\UserEtapa;

/**
 * UserEtapaSearch represents the model behind the search form of `common\models\UserEtapa`.
 */
class UserEtapaSearch extends UserEtapa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'id_etapa', 'status'], 'integer'],
            [['observaciones', 'fecha_creacion', 'fecha_actualizacion'], 'safe'],
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
        $query = UserEtapa::find();

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

        if (\Yii::$app->user->can('Solicitante')) {
          
            $id = \Yii::$app->user->id;
            $user= \common\models\User::findOne($id);
            $query->andFilterWhere([
                'id_user' => ($user->id)
            ]);
         
        }else if (\Yii::$app->user->can('Empresa')){
            $id = \Yii::$app->user->id;
            $user= \common\models\User::findOne($id);
          
            $comuna=array();
            $users=array();
            $empresacomunas=\common\models\EmpresaComuna::findBysql("select * from empresa_comuna where id_empresa=$user->id_empresa")->all();
            foreach  ($empresacomunas as $ec){
                $userquery= \common\models\User::findBysql("select * from user where id_comuna =$ec->id_comuna")->all();
                foreach ($userquery as $uq){
                    array_push($users, $uq->id);
                }
            }

            $query->andFilterWhere([
                'id_user' => $users
            ]);
         
        }


        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_user' => $this->id_user,
            'id_etapa' => $this->id_etapa,
            'status' => $this->status,
            'fecha_creacion' => $this->fecha_creacion,
            'fecha_actualizacion' => $this->fecha_actualizacion,
        ]);

        $query->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
