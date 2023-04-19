<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "empresa".
 *
 * @property int $id
 * @property int|null $rut
 * @property string|null $razon_social
 */
class Empresa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empresa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'rut'], 'integer'],
            [['razon_social', 'rut'], 'required'],
            [['razon_social'], 'string', 'max' => 255],
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
            'rut' => Yii::t('app', 'Rut'),
            'razon_social' => Yii::t('app', 'Razon Social'),
        ];
    }
}
