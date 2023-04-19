<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAssetRbac;
use common\widgets\Alert;

AppAssetRbac::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html class="no-js css-menubar" lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="otro">
    <meta name="author" content="">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <link rel="apple-touch-icon" href="favicon.png">
    <link rel="shortcut icon" href="favicon.png">

      <!-- Scripts -->
      <script src="../../theme/material/global/vendor/breakpoints/breakpoints.js"></script>
    <script>
      Breakpoints();
    </script>


</head>
<body class="animsition site-navbar-small dashboard" id="body-site">
<?php $this->beginBody() ?>
<style>
.modal-dialog { padding-top:44px;}
.breadcrumb > li + li:before {
    color: #ccc;
    content: "/ ";
    padding: 0 5px;
}
</style>
<div class="wrap">
  

    <div class="">
  
        <?=  (Yii::$app->user->isGuest)? '' : $this->render('topbar'); ?>      
        <?=  (Yii::$app->user->isGuest)? '' : $this->render('sidebar'); ?>    
      
    <div class="page">

      <div class="page-content">
      <div class="container">
        
        <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
        </div>
        <!-- Panel Modals Styles -->
        <div class="panel">

          <div class="panel-body container-fluid">
 
                        <?= Alert::widget() ?>
                    
                        <?= $content ?>
          </div> 
        </div>
       </div>
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

   
<script src="../../theme/material/global/js/Config.js"></script>
<!-- Config -->
<!-- <script src="../../theme/material/global/js/config/colors.js"></script> -->
<!-- <script src="../../theme/material/mmenu/assets/js/config/tour.js"></script> -->
    
  
<script>Config.set('assets', '../../theme/material/mmenu/assets');</script>

<!-- <script src="../../js/main.js"></script> -->
   
</body>
</html>
<?php $this->endPage() ?>
