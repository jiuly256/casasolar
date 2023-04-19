<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;


/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Usuario', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
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


<div class="user-view">
    <?php  if (Yii::$app->user->can('Administrador') )  { ?>
        <p>
            <?= Html::a(Yii::t('app','Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app','Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app','Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    <?php } ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'username',
            'nombre',
            'apellidos',
            'dni',
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',
            'email:email',
             [
                'attribute'=>'tipo',
                'value'=>$model->tipos->nombre,
            ],
             [
                'attribute'=>'id_comuna',
                'value'=>($model->id_comuna=='')?'':$model->comunas->nombre,
            ],
            [
                'attribute'=>'id_programa',
                'value'=>($model->id_programa=='')?'':$model->programas->descripcion,
            ],

            // 'status',
            // 'created_at',
            // 'updated_at',
            // 'verification_token',
        ],
    ]) ?>

</div>



</div>
</div>

