<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\models\UserEtapa */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Etapa usuario', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="container">
<h1><?= Html::encode($this->title) ?></h1>
<?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
</div>
<div class="user-etapa-view">

    <?php  if (Yii::$app->user->can('Administrador') )  { ?>
        <p>
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    <?php } ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute'=>'id_user',
                'value'=>$model->users->username,
            ],
            [
                'attribute'=>'id_etapa',
                'value'=>$model->etapas->descripcion,
            ],
            [
                'attribute'=>'status',
                'value'=>$model->getEstados($model->status),
            ],
            'observaciones:ntext',
            'fecha_creacion',
            'fecha_actualizacion',
        ],
    ]) ?>

</div>
