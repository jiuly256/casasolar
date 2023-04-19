<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\daterange\DateRangePicker;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ProgramaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Programa');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programa-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Add'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'descripcion',
            [
                'attribute' => 'fecha_inicio',
                'format' => 'date',
                'filter' => DateRangePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'fecha_inicio',
                    'convertFormat' => true,
                    'presetDropdown'=>true,
                'hideInput'=>true,
                'options' => ['placeholder' => Yii::t('app','Seleccione rango...')],
                    'pluginOptions' => [
                        'locale' => [
                            'format' => 'd-m-Y'
                        ],
                            'showDropdowns'=>true
                    ],
                ]),
            ],
            [
                'attribute' => 'fecha_vencimiento',
                'format' => 'date',
                'filter' => DateRangePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'fecha_vencimiento',
                    'convertFormat' => true,
                    'presetDropdown'=>true,
                'hideInput'=>true,
                'options' => ['placeholder' => Yii::t('app','Seleccione rango...')],
                    'pluginOptions' => [
                        'locale' => [
                            'format' => 'd-m-Y'
                        ],
                            'showDropdowns'=>true
                    ],
                ]),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
