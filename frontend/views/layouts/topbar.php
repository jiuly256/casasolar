
<?php
use yii\helpers\Html;
use yii\helpers\Url;

$base=Url::home(true);

$user= Yii::$app->user->id;

//cambiar por el frontend/web para llamar bien el idioma
$pizza  = Yii::$app->getRequest()->getUrl();
$porciones = explode("/frontend/web/", $pizza);
$url="/frontend/web/site/language";

if (!isset($porciones[1])){
  $porciones[1]=Yii::$app->getRequest()->getUrl();
  $url="/site/language";

}

if ($pizza=="/frontend/web/" && (!isset($porciones[1]))){
	$url="/frontend/web/site/language";
	$porciones[1]="/";
}


?>

<!-- Top-->

<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
    
    <div class="navbar-header  bg-grey-600">
      <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
        data-toggle="menubar">
        <span class="sr-only">Toggle navigation</span>
        <span class="hamburger-bar"></span>
      </button>
      <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
        data-toggle="collapse">
        <i class="icon md-more" aria-hidden="true"></i>
      </button>
      <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu" style="padding: 1.15rem;">
      <img class="navbar-brand-logo" src="<?=$base?>/images/sol.png" title="casa solar" style="height: 45px; ">
        <!-- <img class="navbar-brand-logo" src="../theme/material/base/assets/images/logo.png" title="Remark"> -->
        <span class="navbar-brand-text hidden-xs-down" style="    font-size: 1.046rem;">CASA SOLAR</span>
      </div>
      <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"
        data-toggle="collapse">
        <span class="sr-only">Toggle Search</span>
        <i class="icon md-search" aria-hidden="true"></i>
      </button>
    </div>
  
    <div class="navbar-container container-fluid">
      <!-- Navbar Collapse -->
      <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
        <!-- Navbar Toolbar -->
        <ul class="nav navbar-toolbar">
          <li class="nav-item hidden-float" id="toggleMenubar">
            <a class="nav-link" data-toggle="menubar" href="#" role="button">
              <i class="icon hamburger hamburger-arrow-left">
                <span class="sr-only">Toggle menubar</span>
                <span class="hamburger-bar"></span>
              </i>
            </a>
          </li>
        </ul>
        <!-- End Navbar Toolbar -->
  
        <!-- Navbar Toolbar Right -->
        <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
          <li class="nav-item dropdown">
              
            </li>
       
            <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false"
              data-animation="scale-up" role="button">
            
            <i class="icon fa fa-user" aria-hidden="true"></i>
            </a>
            <div class="dropdown-menu" role="menu">
              <a class="dropdown-item" href="/user/update?id=<?=$user?>" role="menuitem"><i class="icon md-account" aria-hidden="true"></i> <?=Yii::t('app','Profile')?></a>
              <?= Html::a('<i class="icon md-key" aria-hidden="true"></i> '.Yii::t('app','Change Password').'',["/user/password?id=".Yii::$app->user->id],['data-method' => 'post','class'=>'dropdown-item']) ?>
              <div class="dropdown-divider" role="presentation"></div>
              <!-- <a class="dropdown-item" href="javascript:void(0)" role="menuitem"><i class="icon md-power" aria-hidden="true"></i> Logout</a> -->
              <?= Html::a('<i class="icon md-power" aria-hidden="true"></i> '.Yii::t('app','Log out').'',['/site/logout'],['data-method' => 'post','class'=>'dropdown-item']) ?>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="javascript:void(0)" title="<?=Yii::t('app','Notifications')?>"
              aria-expanded="false" data-animation="scale-up" role="button">
              <i class="icon fa fa-bell" aria-hidden="true"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-media" role="menu">
              <div class="dropdown-menu-header">
                <h5><?=Yii::t('app','NOTIFICATIONS')?></h5>
                <!-- <span class="badge badge-round badge-danger">Nuevo 5</span> -->
              </div>
              
              <div class="dropdown-menu-footer">
                <a class="dropdown-menu-footer-btn" href="javascript:void(0)" role="button">
                  <i class="icon md-settings" aria-hidden="true"></i>
                </a>
                <a class="dropdown-item" href="javascript:void(0)" role="menuitem">
                  <?=Yii::t('app','All notifications')?>
                </a>
              </div>
            </div>
          </li>
        </ul>
        <!-- End Navbar Toolbar Right -->
      </div>
      <!-- End Navbar Collapse -->
  
      <!-- Site Navbar Seach -->
      <div class="collapse navbar-search-overlap" id="site-navbar-search">
        <form role="search">
          <div class="form-group">
            <div class="input-search">
              <i class="input-search-icon md-search" aria-hidden="true"></i>
              <input type="text" class="form-control" name="site-search" placeholder="Search...">
              <button type="button" class="input-search-close icon md-close" data-target="#site-navbar-search"
                data-toggle="collapse" aria-label="Close"></button>
            </div>
          </div>
        </form>
      </div>
      <!-- End Site Navbar Seach -->
    </div>
  </nav> 

<!--End Top-->

