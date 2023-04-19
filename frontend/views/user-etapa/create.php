<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model common\models\UserEtapa */

$this->title = Yii::t('app','Add');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app','Etapa usuario'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
<h1><?= Html::encode($this->title) ?></h1>
<?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
</div>
<div class="user-etapa-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
