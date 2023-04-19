<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAssetRbac extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
//css de la plantilla
      // <!-- Stylesheets -->
      'theme/material/global/css/bootstrap.min.css',
      'theme/material/global/css/bootstrap-extend.min.css',
      'theme/material/mmenu/assets/css/site.min.css',
      // <!-- Plugins -->
      'theme/material/global/vendor/animsition/animsition.css',
      'theme/material/global/vendor/asscrollable/asScrollable.css',
      'theme/material/global/vendor/switchery/switchery.css',
      'theme/material/global/vendor/intro-js/introjs.css',
      'theme/material/global/vendor/slidepanel/slidePanel.css',
      'theme/material/global/vendor/jquery-mmenu/jquery-mmenu.css',
      'theme/material/global/vendor/flag-icon-css/flag-icon.css',
      'theme/material/global/vendor/waves/waves.css',
      'theme/material/global/vendor/chartist/chartist.css',
      'theme/material/global/vendor/jvectormap/jquery-jvectormap.css',
      'theme/material/global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css',
      'theme/material/mmenu/assets/examples/css/dashboard/v1.css',
      // <!-- Fonts -->
      'theme/material/global/fonts/material-design/material-design.min.css',
      'theme/material/global/fonts/brand-icons/brand-icons.min.css',
      'https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic',
        
      
    ];

    public $js = [
        // <!-- Core  -->
        'theme/material/global/vendor/babel-external-helpers/babel-external-helpers.js',
        // 'theme/material/global/vendor/jquery/jquery.js',
        'theme/material/global/vendor/popper-js/umd/popper.min.js',
        'theme/material/global/vendor/bootstrap/bootstrap.js',
        'theme/material/global/vendor/animsition/animsition.js',
        'theme/material/global/vendor/mousewheel/jquery.mousewheel.js',
        'theme/material/global/vendor/asscrollbar/jquery-asScrollbar.js',
        'theme/material/global/vendor/asscrollable/jquery-asScrollable.js',
        'theme/material/global/vendor/waves/waves.js',

        // <!-- Plugins -->
        'theme/material/global/vendor/jquery-mmenu/jquery.mmenu.min.all.js',
        'theme/material/global/vendor/switchery/switchery.js',
        'theme/material/global/vendor/intro-js/intro.js',
        'theme/material/global/vendor/screenfull/screenfull.js',
        'theme/material/global/vendor/slidepanel/jquery-slidePanel.js',
        'theme/material/global/vendor/matchheight/jquery.matchHeight-min.js',
        'theme/material/global/vendor/peity/jquery.peity.min.js',
       
        // <!-- Scripts -->
        'theme/material/global/js/Component.js',
        'theme/material/global/js/Plugin.js',
        'theme/material/global/js/Config.js',
        'theme/material/global/js/Base.js',
        'theme/material/mmenu/assets/js/Section/Menubar.js',
        'theme/material/mmenu/assets/js/Section/Sidebar.js',
        'theme/material/mmenu/assets/js/Section/PageAside.js',
        'theme/material/mmenu/assets/js/Section/GridMenu.js',

        // <!-- Config -->
        'theme/material/global/js/config/colors.js',
        'theme/material/mmenu/assets/js/config/tour.js',
       
        // <!-- Page -->
        'theme/material/mmenu/assets/js/Site.js',
        'theme/material/global/js/Plugin/asscrollable.js',
        'theme/material/global/js/Plugin/slidepanel.js',
        'theme/material/global/js/Plugin/switchery.js',
        'theme/material/global/js/Plugin/matchheight.js',
        'theme/material/global/js/Plugin/peity.js',
        
        'theme/material/mmenu/assets/examples/js/dashboard/v1 hotel.js', //linea 21 y 59
        
            
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
