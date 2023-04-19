<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$val = rand(1, 11);

$value="url(../images/fondoLogin$val.jpg)";

?>
<style>

body {

  background-image:<?=$value?> ;
  /* background-size: contain; */
background-repeat: no-repeat;
background-size: 2000px auto;
  
}
</style>
<html class="no-js css-menubar" lang="en">
  <head>
    
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
        <link rel="stylesheet" href="../theme/material/mmenu/assets/examples/css/pages/login-v3-hotel.css">
    
    
    <!-- Fonts -->
    <link rel="stylesheet" href="../theme/material/global/fonts/material-design/material-design.min.css">
    <link rel="stylesheet" href="../theme/material/global/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
    
    <!-- Scripts -->
    <script src="../theme/material/global/vendor/breakpoints/breakpoints.js"></script>
    <script>
      Breakpoints();
    </script>
  
  </head>
  <div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p>Please fill out the following fields to login:</p> -->

    <div class="row">
        <div class="col-lg-5">
        </div>
    </div>
</div>

  <body class="animsition page-login-v3 layout-full">
    
    <!-- Page -->
    <div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">>
      <div class="page-content vertical-align-middle">
        <div class="panel" style="box-shadow: 5px 5px 5px 0px rgba(0,0,0,0.4);">
          <div class="panel-body">

            <div class="brand">
              <h2 class="brand-text font-size-14" style="font-weight: 600;">CASA SOLAR</h2>
              <img class="brand-img" src="../images/sol.png" style="width:35%" alt="sol">
            </div>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <div class="form-group" data-plugin="formMaterial">
            <?= $form->field($model, 'username')->textInput(['autofocus' => true,'placeholder'=>Yii::t('app', 'Username')])->label(false) ?>
            </div>
            <div class="form-group" data-plugin="formMaterial">
               <?= $form->field($model, 'password')->passwordInput(['placeholder'=>Yii::t('app','Password')])->label(false) ?>
            </div>

                
                <?= Html::submitButton(Yii::t('app','LOG IN'), ['class' => 'btn btn-primary btn btn-primary btn-block form-submit ', 'name' => 'login-button']) ?>
                </br>
                </br>

                <div class="col-ls-12"> </div>
              </div>
            
              <?php ActiveForm::end(); ?>
              
            <!-- </form> -->
            <p><?=Yii::t('app','Do not you have an account? ')?><a href="signup"><?=Yii::t('app','Please Sign Up')?></a>
            <p>
            </p>
          </br>
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
          $('#w0-success-0').removeClass("fade in");
        });
      })(document, window, jQuery);
      
    </script>
  </body>
</html>




