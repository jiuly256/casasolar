<?php

use yii\helpers\{Html,ArrayHelper};
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\UserEtapa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-etapa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    
    echo $form->field($model, "id_etapa")->widget(Select2::classname(), [
            'data' =>  ArrayHelper::map(\common\models\Etapa::find()->all(),'id','descripcion'),
            'options' => ['placeholder' => Yii::t('app','Select')],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); 
    ?>


    <?php
    
    echo $form->field($model, "status")->widget(Select2::classname(), [
            'data' =>  \common\models\UserEtapa::listaEstadoFilter(),
            'options' => ['placeholder' => Yii::t('app','Select')],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]); 
    ?>


    <?= $form->field($model, 'observaciones')->textarea(['rows' => 6]) ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
