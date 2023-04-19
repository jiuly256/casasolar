<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Programa;

/**
 * ProgramaSearch represents the model behind the search form of `common\models\Programa`.
 */
class ProgramaSearch extends Programa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['descripcion', 'fecha_inicio', 'fecha_vencimiento'], 'safe'],
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
        $query = Programa::find();

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

        if ($this->fecha_inicio<>'' ) {

            list($fecha_inicio, $fecha_fin) = explode(' - ', $this->fecha_inicio);
            $fecha_inicio = date('Y-m-d',strtotime($fecha_inicio));   
            $fecha_fin = date('Y-m-d',strtotime($fecha_fin));   
    
            $query->andFilterWhere(['between', 'date(fecha_inicio)', $fecha_inicio, $fecha_fin]);
    
        }

        if ($this->fecha_vencimiento<>'' ) {

            list($fecha_inicio, $fecha_fin) = explode(' - ', $this->fecha_vencimiento);
            $fecha_inicio = date('Y-m-d',strtotime($fecha_inicio));   
            $fecha_fin = date('Y-m-d',strtotime($fecha_fin));   
    
            $query->andFilterWhere(['between', 'date(fecha_vencimiento)', $fecha_inicio, $fecha_fin]);
    
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
