<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\models\User;
use kartik\icons\FontAwesomeAsset;
use kartik\dialog\Dialog;

FontAwesomeAsset::register($this);

AppAsset::register($this);

$user='';
if (isset(Yii::$app->user->id)){
  $user=User::findOne(['id'=>Yii::$app->user->id])->username;
}
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html class="no-js css-menubar" lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Presupuesto hoteles">
    <meta name="author" content="">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <link rel="apple-touch-icon" href="favicon.png">
    <link rel="shortcut icon" href="favicon.png">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js" crossorigin="anonymous"></script>


      <!-- Scripts -->
      <script src="../theme/material/global/vendor/breakpoints/breakpoints.js"></script>
    <script>
      Breakpoints();
    </script>


</head>
<style>
.modal-dialog { padding-top:44px;}
.breadcrumb > li + li:before {
    color: #ccc;
    content: "/ ";
    padding: 0 5px;
}
</style>
<body class="animsition site-navbar-small dashboard" id="body-site">
<?php $this->beginBody() ?>
<?php
 echo  Dialog::widget(['overrideYiiConfirm' => true,
 'options' => [  // customized BootstrapDialog options
      // 'size' => Dialog::SIZE_SMALL, // large dialog text
      'type' => Dialog::TYPE_INFO, // bootstrap contextual color
      'btnOKClass' => 'btn-info',
      'btnOKLabel' => Yii::t('app','Ok'),
  ]
 ]);
 ?>
 <div class="wrap">
  

    <div class="">
  
        <?=  (Yii::$app->user->isGuest)? '' : $this->render('topbar'); ?>      
        <?=  (Yii::$app->user->isGuest)? '' : $this->render('sidebar'); ?>    
      
    <div class="page">
    <div class="col-sm-0 float-right alert alert-default"><?=(isset(Yii::$app->user->id))?Yii::t('app','User: '):''?><strong><?=$user?></strong></div>
      <div class="page-content">
      <!-- <div class="container"> -->
        
        <?php /* Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) */?>
        <!-- </div> -->
        <!-- Panel Modals Styles -->
        <div class="panel">

          <div class="panel-body container-fluid">
 
                        <?= Alert::widget() ?>
                      
                        <?= $content ?>
          </div>
        </div>
      <!-- </div> -->
    </div>


       
   
        
    </div>
</div>

<?=  (Yii::$app->user->isGuest)? '' : $this->render('footer'); ?>      
<!-- <footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer> -->

<?php $this->endBody() ?>

   
<script src="../theme/material/global/vendor/breakpoints/breakpoints.js"></script>
  
<script>Config.set('assets', 'theme/material/mmenu/assets');</script>

   
</body>
</html>
<?php $this->endPage() ?>
