<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "empresa_comuna".
 *
 * @property int $id
 * @property int $id_empresa
 * @property int $id_comuna
 */
class EmpresaComuna extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empresa_comuna';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_empresa', 'id_comuna'], 'required'],
            [['id', 'id_empresa', 'id_comuna'], 'integer'],
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
            'id_empresa' => Yii::t('app', 'Id Empresa'),
            'id_comuna' => Yii::t('app', 'Id Comuna'),
        ];
    }
}
