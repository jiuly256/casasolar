<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
// use yii\grid\GridView;
use kartik\grid\GridView;
use mdm\admin\components\Helper;
use kartik\editable\Editable;
use yii\widgets\Breadcrumbs;


/* @var $this yii\web\View */
/* @var $searchModel common\models\search\UserEtapaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app','Etapa usuario');
$this->params['breadcrumbs'][] = $this->title;


?>

<style>.popover.kv-editable-popover { display:none;}

</style>

<div class="container">
<h1><?= Html::encode($this->title) ?></h1>
<?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
</div>
<div class="user-etapa-index">

   <?php  if (Yii::$app->user->can('Administradores') )  { ?>
        <p>
        <?= Html::a(Yii::t('app','Add'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php } ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=   GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'resizableColumns'=>true,
                    'persistResize' => false,
                    'pjax' => true, // pjax is set to always true for this demo
                    'pjaxSettings'=>[
                        'neverTimeout'=>true,
                        'options'=>[
                            'id'=>'w0-containers',
                            ]
                    ],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute'=>'id_user',
                'value'=>function($model) {
                    return ($model->id_user=='')?'':$model->users->username;
                },
                'filter'=>ArrayHelper::map(\common\models\User::find()->orderBy(['username'=>SORT_ASC])->all(),'id','username'),
                'filterType' => GridView::FILTER_SELECT2,
                                'filterWidgetOptions' => [
                                    'options' => ['prompt' => ''],
                                    'pluginOptions' => ['allowClear' => true],
                ],
                'visible'=>(Yii::$app->user->can('Administrador') || Yii::$app->user->can('Empresa'))?true:false,
            ],
            [
                'attribute'=>'id_etapa',
                'value'=>function($model) {
                    return ($model->id_etapa=='')?'':$model->etapas->descripcion;
                },
                'filter'=>ArrayHelper::map(\common\models\Etapa::find()->orderBy(['descripcion'=>SORT_ASC])->all(),'id','descripcion'),
            ],

            [
                'class' => 'kartik\grid\EditableColumn',
                'attribute' => 'status',
                'value'=>function($model) {
                    return $model->getEstados($model->status);
                },
                'vAlign' => 'middle',
                'editableOptions'=>[
                    'inputType'=>\kartik\editable\Editable::INPUT_DROPDOWN_LIST,
                    'data'=>\common\models\UserEtapa::listaEstadoFilter()
                ],
                'visible'=>(Yii::$app->user->can('Administrador') )?true:false,
            ],

            [
                'attribute'=>'status',
                'value'=>function($model) {
                    return $model->getEstados($model->status);
                },
                'filter'=>\common\models\UserEtapa::listaEstadoFilter(), 
                'visible'=>(Yii::$app->user->can('Empresa') || Yii::$app->user->can('Solicitante') )?true:false,  
            ],
            'observaciones:ntext',
            //'fecha_creacion',
            //'fecha_actualizacion',

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
