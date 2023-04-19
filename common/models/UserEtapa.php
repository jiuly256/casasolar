<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_etapa".
 *
 * @property int $id
 * @property int|null $id_user
 * @property int|null $id_etapa
 * @property int|null $status 1. iniciada, 2 en espera de recudos, 3 verificado, 4 rechazado
 * @property string|null $observaciones
 * @property string|null $fecha_creacion
 * @property string|null $fecha_actualizacion
 */
class UserEtapa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_etapa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'id_etapa', 'status'], 'integer'],
            [['observaciones'], 'string'],
            [['fecha_creacion', 'fecha_actualizacion'], 'safe'],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Id'),
            'id_user' => Yii::t('app', 'Usuario'),
            'id_etapa' => Yii::t('app', 'Etapa'),
            'status' => Yii::t('app', 'Status'),
            'observaciones' => Yii::t('app', 'Observaciones'),
            'fecha_creacion' => Yii::t('app', 'Fecha Creacion'),
            'fecha_actualizacion' => Yii::t('app', 'Fecha Actualizacion'),
        ];
    }

    public function getUsers()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    public function getEtapas()
    {
        return $this->hasOne(Etapa::className(), ['id' => 'id_etapa']);
    }

    public static function listaEstadoFilter() {
        return [
            1 => 'Iniciado',
            2 => 'En espera de recaudos',
            3 => 'Verificado',
            4 => 'Rechazado',
          
        ];
    }

    public function getEstados($value){
                  if ($value==1)
                    return 'Iniciado';
                  else if ($value==2)
                    return 'En espera de recaudos';
                  else if ($value==3)
                    return 'Verificado';
                  else
                    return 'Rechazado';
    }

}
