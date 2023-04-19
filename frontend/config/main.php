<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);
//anular los dialog de kartik ya que dan conflicto con el tema
// \Yii::$container->set('kartik\dialog\Dialog', ['overrideYiiConfirm' => false]);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log',
        [
            'class' => 'common\components\LanguageSelector',
            'supportedLanguages' => ['en', 'es','fr','de','nl'],
        ],  
    ],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        //rbac
        'authManager' => [
            'class' => 'mdm\admin\components\DbManager'
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        // 'user' => [
        //     'identityClass' => 'common\models\User',
        //     'enableAutoLogin' => true,
        //     'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        // ],

        //rbac    
        'user' => [
            'identityClass' => 'common\models\User',
            // 'loginUrl' => ['rbac/user/login'],
            'loginUrl' => ['site/login'],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],

        'i18n' => [
            'translations' => [
                'app*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                ],
              
            ],
        ],
        
    ],
    //rbac
    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module',
            // your other grid module settings
        ],
        'admin' => [
            'class' => 'frontend\modules\admin\Module',
        ],

        'rbac' => [
            'class' => 'mdm\admin\Module',
            'controllerMap' => [
                'assignment' => [
                   'class' => 'mdm\admin\controllers\AssignmentController',
                   'userClassName' => 'common\models\User',
                   'idField' => 'id',
                   'usernameField' => 'username',
               ],
           ],
           'layout' => 'left-menu',
           'mainLayout' => '@app/views/layouts/mainRbac.php', 
        ],

      
       
    ],

    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
            'debug/*',
            // 'rbac/*',

        ]
    ],

    'params' => $params,
];
