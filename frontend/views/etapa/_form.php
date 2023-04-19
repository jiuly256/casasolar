<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Etapa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="etapa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    
        echo $form->field($model, "id_programa")->widget(Select2::classname(), [
                'data' =>  ArrayHelper::map(\common\models\Programa::find()->all(),'id','descripcion'),
                'options' => ['placeholder' => Yii::t('app','Select')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); 
    ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?php

        echo $form->field($model, 'fecha_inicio')->widget(DatePicker::classname(), [
            'options' => [
                'value'=>($model->isNewRecord)?date('d-m-Y'):(($model->fecha_inicio==null)?'':date('d-m-Y',strtotime($model->fecha_inicio))),
            ],
            'pluginOptions' => [
                'format'=>'dd-mm-yyyy',
                'autoclose' => true,
                'todayBtn' => true,
                'todayHighlight' => true,
            ]
        ]);
    ?>

    <?php

        echo $form->field($model, 'fecha_vencimiento')->widget(DatePicker::classname(), [
            'options' => [
                'value'=>($model->isNewRecord)?date('d-m-Y'):(($model->fecha_vencimiento==null)?'':date('d-m-Y',strtotime($model->fecha_vencimiento))),
            ],
            'pluginOptions' => [
                'format'=>'dd-mm-yyyy',
                'autoclose' => true,
                'todayBtn' => true,
                'todayHighlight' => true,
            ]
        ]);
    ?>

    <?= $form->field($model, 'observaciones')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
