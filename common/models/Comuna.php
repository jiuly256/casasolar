<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comuna".
 *
 * @property int $id
 * @property int|null $id_region
 * @property string|null $nombre
 *
 * @property Region $region
 * @property User[] $users
 */
class Comuna extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comuna';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'id_region'], 'integer'],
            [['nombre'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['id_region'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['id_region' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'id_region' => Yii::t('app', 'Id Region'),
            'nombre' => Yii::t('app', 'Nombre'),
        ];
    }

    /**
     * Gets query for [[Region]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::className(), ['id' => 'id_region']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id_comuna' => 'id']);
    }
}
