<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User;

/**
 * UserSearch represents the model behind the search form of `common\models\User`.
 */
class UserSearch extends User
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'created_at', 'updated_at','id_programa','id_comuna'], 'integer'],
            [['username', 'auth_key', 'password_hash', 'password_reset_token', 'email', 'verification_token','nombre','apellidos','dni'], 'safe'],
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
        $query = User::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
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
                'id' => ($user->id)
            ]);
         
        }else if (\Yii::$app->user->can('Empresa')){
            $id = \Yii::$app->user->id;
            $user= \common\models\User::findOne($id);
          
            $comuna=array();
            $empresacomunas=\common\models\EmpresaComuna::findBysql("select * from empresa_comuna where id_empresa=$user->id_empresa")->all();
            foreach  ($empresacomunas as $ec){
                array_push($comuna, $ec->id_comuna);
            }

            $query->andFilterWhere([
                'id_comuna' => $comuna
            ]);
         
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'id_programa' => $this->id_programa,
            'id_comuna' => $this->id_comuna,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellidos', $this->apellidos])
            ->andFilterWhere(['like', 'dni', $this->dni])
            ->andFilterWhere(['like', 'password_hash', $this->password_hash])
            ->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'verification_token', $this->verification_token]);

        
            if (!\Yii::$app->user->can('Administrador')) {
          
                // $id = \Yii::$app->user->id;
                // $user= \common\models\User::findOne($id);
                // $armeria= $user->id_armeria;
                // $query->andFilterWhere([
                //     'id_armeria' => $user->id_armeria
                // ]);
             
            }else{
                // $query->andFilterWhere([
                //     'id_armeria' => $this->id_armeria
                // ]);
             
            }
    
        
        //     if ($this->last_login <>'' ) {

        
        //     list($fecha_inicio1, $fecha_fin1) = explode(' - ', $this->last_login);
        //     $fecha_inicio1 = strtotime($fecha_inicio1);   
        //     $fecha_fin1 =  strtotime($fecha_fin1);   
    
        //     $query->andFilterWhere(['between', 'last_login', $fecha_inicio1, $fecha_fin1]);
    
        // }            

        return $dataProvider;
    }
}
