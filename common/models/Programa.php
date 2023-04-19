<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "programa".
 *
 * @property int $id
 * @property string $descripcion
 * @property string|null $fecha_inicio
 * @property string|null $fecha_vencimiento
 *
 * @property Etapa[] $etapas
 * @property User[] $users
 */
class Programa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'programa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'descripcion','fecha_inicio','fecha_vencimiento'], 'required'],
            [['id'], 'integer'],
            [['fecha_inicio', 'fecha_vencimiento'], 'safe'],
            [['descripcion'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'fecha_inicio' => Yii::t('app', 'Fecha Inicio'),
            'fecha_vencimiento' => Yii::t('app', 'Fecha Vencimiento'),
        ];
    }

    /**
     * Gets query for [[Etapas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEtapas()
    {
        return $this->hasMany(Etapa::className(), ['id_programa' => 'id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id_programa' => 'id']);
    }
}
