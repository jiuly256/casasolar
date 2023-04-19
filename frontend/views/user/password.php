<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;


/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = Yii::t('app','Change User Password: ') . $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','User'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app','Update');
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


<div class="user-update">

    <?= $this->render('_formpassword', [
        'model' => $model,
    ]) ?>

</div>



</div>
</div>

