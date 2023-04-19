<?php

// use yii\widgets\ActiveForm;
use yii\helpers\{Html,ArrayHelper};
use kartik\form\ActiveForm;
use kartik\select2\Select2;
use common\models\UserHotel;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin([
         'id'=>'user-form',
         'enableClientValidation' => true,
         'enableAjaxValidation' => true
    ]); ?>


    <?= $form->field($model, 'password')->passwordInput() ?>
    <?= $form->field($model, 'password_repeat')->passwordInput() ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app','Save'), ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
