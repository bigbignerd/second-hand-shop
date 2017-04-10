<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\OnlineConsultingContent */

$this->title = 'Update Online Consulting Content: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Online Consulting Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="online-consulting-content-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
