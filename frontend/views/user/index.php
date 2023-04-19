<?php

use yii\helpers\{Html,ArrayHelper};
use kartik\grid\GridView;
use mdm\admin\components\Helper;
use yii\widgets\Breadcrumbs;
use kartik\daterange\DateRangePicker;



/* @var $this yii\web\View */
/* @var $searchModel common\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app','User');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="container">
<h1><?= Html::encode($this->title) ?></h1>
<?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
</div>
<!-- Panel Modals Styles -->
<div class="panel">

<div class="panel-body container-fluid">



<div class="user-index">
    <?php  if (Yii::$app->user->can('Administrador') )  { ?>
        <p>
        <?= Html::a(Yii::t('app','Add'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php } ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'nombre',
            'apellidos',
            'dni',
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',
            'email:email',
            [
                'attribute'=>'status',
                'value'=>function($model) {
                    return $model->getEstados($model->status);
                },
                'filter'=>\common\models\User::listaEstadoFilter(),   
            ],
            [
                'attribute'=>'id_programa',
                'value'=>function($model) {
                    return ($model->id_programa=='')?'':$model->programas->descripcion;
                },
                'filter'=>ArrayHelper::map(\common\models\Programa::find()->orderBy(['descripcion'=>SORT_ASC])->all(),'id','descripcion'),
            ],
            [
                'attribute'=>'id_comuna',
                'value'=>function($model) {
                    return ($model->id_comuna=='')?'':$model->comunas->nombre;
                },
                'filter'=>ArrayHelper::map(\common\models\Comuna::find()->orderBy(['nombre'=>SORT_ASC])->all(),'id','nombre'),
            ],
         
            // 'status',
            //'created_at',
            //'updated_at',
            //'verification_token',

            [
                'class' => 'yii\grid\ActionColumn',
                
                'template' => Helper::filterActionColumn('{view}{update}{delete}'),
                'buttons' => [
                    'view'=> function ($url,$model) {
                        return Html::a('<span class="fa fa-eye"></span>', ['view', 'id' => $model->id], [
                            'style'=>'padding: 0 10px',
                                ]);
                    },
                    'update'=> function ($url,$model) {
                        return Html::a('<span class="fa fa-pen"></span>', ['update', 'id' => $model->id], [
                            'style'=>'padding: 0 10px',
                                ]);
                    },
                  
                    'delete' => function ($url,$model) {
                        if (Yii::$app->user->can('Administrador')) {
                            return Html::a('<span class="fa fa-trash"></span>', ['delete', 'id' => $model->id], [
                                'style'=>'padding: 0 10px',        
                                'data' => [
                                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                            'method' => 'post',
                                        ],
                                    ]);
                        }

                    },
                  
                ]
            ]
        ],
    ]); ?>


</div>


</div>
</div>

