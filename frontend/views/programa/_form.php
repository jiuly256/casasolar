<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Programa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="programa-form">

    <?php $form = ActiveForm::begin(); ?>

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

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
