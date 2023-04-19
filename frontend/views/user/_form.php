<?php

// use yii\widgets\ActiveForm;
use yii\helpers\{Html,ArrayHelper};
use kartik\form\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin([
         'id'=>'user-form',
         'enableClientValidation' => false,
         'enableAjaxValidation' => false
    ]); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
   
    <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true]) ?>
   
    <?= $form->field($model, 'dni')->textInput(['maxlength' => 9]) ?>
   
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $model->isnewRecord==true?$form->field($model, 'password')->passwordInput():'' ?>

   
 
    <?php
    
        echo $form->field($model, "tipo")->widget(Select2::classname(), [
                'data' =>  ArrayHelper::map(\common\models\Tipo::find()->all(),'id','nombre'),
                'options' => ['placeholder' => Yii::t('app','Select'),'id'=>'id_tipo'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); 
    ?>
    <div id="empresa" style="display:none;">
        <?php
        
            echo $form->field($model, "id_empresa")->widget(Select2::classname(), [
                    'data' =>  ArrayHelper::map(\common\models\Empresa::find()->all(),'id','razon_social'),
                    'options' => ['placeholder' => Yii::t('app','Select')],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]); 
        ?>
    </div>
    <div id="programa" style="display:none;">            
    <?php
        
        echo $form->field($model, "id_programa")->widget(Select2::classname(), [
                'data' =>  ArrayHelper::map(\common\models\Programa::find()->all(),'id','descripcion'),
                'options' => ['placeholder' => Yii::t('app','Select')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); 
    ?>
    </div>
    <div id="comuna" style="display:none;">       
    <?php

        echo $form->field($model, "id_comuna")->widget(Select2::classname(), [
                'data' =>  ArrayHelper::map(\common\models\Comuna::find()->all(),'id','nombre'),
                'options' => ['placeholder' => Yii::t('app','Select')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); 
    ?>
    </div>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app','Save'), ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
