<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@mdm/admin/messages'   => '@vendor/mdmsoft/yii2-admin/messages',
        '@mdm/admin/assets'   => '@vendor/mdmsoft/yii2-admin/assets',
        '@mdm/admin/mail'   => '@vendor/mdmsoft/yii2-admin/mail',

    ],

    'sourceLanguage'=>'en',
    'language'=>'es',
    'name'=>'Casa solar',
    'defaultRoute'=>'user/index',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
         //rbac
         'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

         // Estándares de formato
         'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'dateFormat' => 'dd-MM-yyyy',
            'thousandSeparator' => '.',
            'decimalSeparator' => ',',
            'currencyCode' => 'CLP',
        ],

        'assetManager' => [
            'bundles' => [
                'kartik\form\ActiveFormAsset' => [
                    'bsDependencyEnabled' => false // do not load bootstrap assets for a specific asset bundle
                ],
            ],
        ],

        'gridview' =>  [
            'class' => '\kartik\grid\Module',
            // enter optional module parameters below - only if you need to  
            // use your own export download action or custom translation 
            // message source
            // 'downloadAction' => 'gridview/export/download',
             'i18n' => [
                [
                   'class' => 'yii\i18n\PhpMessageSource',
                   'basePath' => '@kvgrid/messages',
                   'forceTranslation' => true
               ]
            ]
        ],
        
    ],
];
