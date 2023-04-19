<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "etapa".
 *
 * @property int $id
 * @property int $id_programa
 * @property string|null $descripcion
 * @property string $fecha_inicio
 * @property string $fecha_vencimiento
 * @property string|null $observaciones
 *
 * @property Programa $programa
 */
class Etapa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'etapa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_programa', 'fecha_inicio', 'fecha_vencimiento','descripcion'], 'required'],
            [['id', 'id_programa'], 'integer'],
            [['fecha_inicio', 'fecha_vencimiento'], 'safe'],
            [['observaciones'], 'string'],
            [['descripcion'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['id_programa'], 'exist', 'skipOnError' => true, 'targetClass' => Programa::className(), 'targetAttribute' => ['id_programa' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Id'),
            'id_programa' => Yii::t('app', 'Programa'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'fecha_inicio' => Yii::t('app', 'Fecha Inicio'),
            'fecha_vencimiento' => Yii::t('app', 'Fecha Vencimiento'),
            'observaciones' => Yii::t('app', 'Observaciones'),
        ];
    }


    public function getProgramas()
    {
        return $this->hasOne(Programa::className(), ['id' => 'id_programa']);
    }



    /**
     * Gets query for [[Programa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPrograma()
    {
        return $this->hasOne(Programa::className(), ['id' => 'id_programa']);
    }
}
