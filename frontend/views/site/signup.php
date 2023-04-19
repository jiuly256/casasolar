<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\{Html,ArrayHelper};
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;

$val = rand(1, 11);

$value="url(../images/fondoLogin3.jpg)";

?>
<style>

body {

background-image:<?=$value?> ;
  /* background-size: contain; */
background-repeat: no-repeat;
background-size: 2000px auto;
  
}
</style>


<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap material admin template">
    <meta name="author" content="">
    
    <title>Register V3 | Remark Material Admin Template</title>
    
    <link rel="apple-touch-icon" href="../theme/material/mmenu/assets/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="../theme/material/mmenu/assets/images/favicon.ico">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="../theme/material/global/css/bootstrap.min.css">
    <link rel="stylesheet" href="../theme/material/global/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="../theme/material/mmenu/assets/css/site.min.css">
    
    <!-- Plugins -->
    <link rel="stylesheet" href="../theme/material/global/vendor/animsition/animsition.css">
    <link rel="stylesheet" href="../theme/material/global/vendor/asscrollable/asScrollable.css">
    <link rel="stylesheet" href="../theme/material/global/vendor/switchery/switchery.css">
    <link rel="stylesheet" href="../theme/material/global/vendor/intro-js/introjs.css">
    <link rel="stylesheet" href="../theme/material/global/vendor/slidepanel/slidePanel.css">
    <link rel="stylesheet" href="../theme/material/global/vendor/flag-icon-css/flag-icon.css">
    <link rel="stylesheet" href="../theme/material/global/vendor/waves/waves.css">
        <link rel="stylesheet" href="../theme/material/mmenu/assets/examples/css/pages/register-v3-hotel.css">
    
    
    <!-- Fonts -->
    <link rel="stylesheet" href="../theme/material/global/fonts/material-design/material-design.min.css">
    <link rel="stylesheet" href="../theme/material/global/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    
    <!-- Scripts -->
    <script src="../theme/material/global/vendor/breakpoints/breakpoints.js"></script>
    <script>
      Breakpoints();
    </script>
  </head>
  <body class="animsition page-register-v3 layout-full">

    <!-- Page -->
    <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
      <div class="page-content vertical-align-middle">
        <div class="panel" style="box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.4);">
          <div class="panel-body" >
            <div class="brand">
            <h2 class="brand-text font-size-14" style="font-weight: 600;">CASA SOLAR</h2>
                <img class="brand-img" src="../images/sol.png" style="width:35%" alt="sol">
            </div>
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

              <div class="form-group" data-plugin="formMaterial">
                <?= $form->field($model, 'username')->textInput(['autofocus' => true,'placeholder'=>Yii::t('app','Username')])->label(false) ?>
              </div>
         
              <div class="form-group" data-plugin="formMaterial">
                 <?= $form->field($model, 'email')->textInput(['placeholder'=>Yii::t('app','Mail')])->label(false) ?>
              </div>
              
              <div class="form-group" data-plugin="formMaterial">
                <?= $form->field($model, 'password')->passwordInput(['placeholder'=>Yii::t('app','Password')])->label(false) ?>
              </div>
              
              <div class="form-group" data-plugin="formMaterial">
                <?= $form->field($model, 'nombre')->textInput(['placeholder'=>Yii::t('app','Nombre')])->label(false) ?>
              </div>
              
              <div class="form-group" data-plugin="formMaterial">
                <?= $form->field($model, 'apellidos')->textInput(['placeholder'=>Yii::t('app','Apellidos')])->label(false) ?>
              </div>
              
              <div class="form-group" data-plugin="formMaterial">
                <?= $form->field($model, 'dni')->textInput(['placeholder'=>Yii::t('app','Dni')])->label(false) ?>
              </div>
              
              <div class="form-group" data-plugin="formMaterial">
              <?php
    
                  echo $form->field($model, "id_programa")->widget(Select2::classname(), [
                          'data' =>  ArrayHelper::map(\common\models\Programa::find()->all(),'id','descripcion'),
                          'options' => ['placeholder' => Yii::t('app','Seleccione programa')],
                          'pluginOptions' => [
                              'allowClear' => true
                          ],
                      ])->label(false); 
                ?>
              </div>
              
              <div class="form-group" data-plugin="formMaterial">
              <?php
    
                  echo $form->field($model, "id_comuna")->widget(Select2::classname(), [
                          'data' =>  ArrayHelper::map(\common\models\Comuna::find()->all(),'id','nombre'),
                          'options' => ['placeholder' => Yii::t('app','Seleccione comuna')],
                          'pluginOptions' => [
                              'allowClear' => true
                          ],
                      ])->label(false); 
              ?>
              </div>
              
              
              
              <?= Html::submitButton(Yii::t('app','SIGN UP'), ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                <?php ActiveForm::end(); ?>
                <p><?=Yii::t('app','Are you already registered? Please ')?><a href="/site/login"><?=Yii::t('app','Log In')?></a></p>
          </div>
        </div>

       
      </div>
    </div>
    <!-- End Page -->


    <!-- Core  -->
    <script src="../theme/material/global/vendor/babel-external-helpers/babel-external-helpers.js"></script>
    <script src="../theme/material/global/vendor/jquery/jquery.js"></script>
    <script src="../theme/material/global/vendor/popper-js/umd/popper.min.js"></script>
    <script src="../theme/material/global/vendor/bootstrap/bootstrap.js"></script>
    <script src="../theme/material/global/vendor/animsition/animsition.js"></script>
    <script src="../theme/material/global/vendor/mousewheel/jquery.mousewheel.js"></script>
    <script src="../theme/material/global/vendor/asscrollbar/jquery-asScrollbar.js"></script>
    <script src="../theme/material/global/vendor/asscrollable/jquery-asScrollable.js"></script>
    <script src="../theme/material/global/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>
    <script src="../theme/material/global/vendor/waves/waves.js"></script>
    
    <!-- Plugins -->
    <script src="../theme/material/global/vendor/switchery/switchery.js"></script>
    <script src="../theme/material/global/vendor/intro-js/intro.js"></script>
    <script src="../theme/material/global/vendor/screenfull/screenfull.js"></script>
    <script src="../theme/material/global/vendor/slidepanel/jquery-slidePanel.js"></script>
        <script src="../theme/material/global/vendor/jquery-placeholder/jquery.placeholder.js"></script>
    
    <!-- Scripts -->
    <script src="../theme/material/global/js/Component.js"></script>
    <script src="../theme/material/global/js/Plugin.js"></script>
    <script src="../theme/material/global/js/Base.js"></script>
    <script src="../theme/material/global/js/Config.js"></script>
    
    <script src="../theme/material/mmenu/assets/js/Section/Menubar.js"></script>
    <script src="../theme/material/mmenu/assets/js/Section/GridMenu.js"></script>
    <script src="../theme/material/mmenu/assets/js/Section/Sidebar.js"></script>
    <script src="../theme/material/mmenu/assets/js/Section/PageAside.js"></script>
    <script src="../theme/material/mmenu/assets/js/Plugin/menu.js"></script>
    
    <script src="../theme/material/global/js/config/colors.js"></script>
    <script src="../theme/material/mmenu/assets/js/config/tour.js"></script>
    <script>Config.set('assets', '../../assets');</script>
    
    <!-- Page -->
    <script src="../theme/material/mmenu/assets/js/Site.js"></script>
    <script src="../theme/material/global/js/Plugin/asscrollable.js"></script>
    <script src="../theme/material/global/js/Plugin/slidepanel.js"></script>
    <script src="../theme/material/global/js/Plugin/switchery.js"></script>
        <script src="../theme/material/global/js/Plugin/jquery-placeholder.js"></script>
        <script src="../theme/material/global/js/Plugin/material.js"></script>
    
    <script>
      (function(document, window, $){
        'use strict';
    
        var Site = window.Site;
        $(document).ready(function(){
          Site.run();
        });
      })(document, window, jQuery);
    </script>
    
  </body>
</html>
