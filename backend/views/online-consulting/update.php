<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\OnlineConsulting */

$this->title = 'Update Online Consulting: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Online Consultings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="online-consulting-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
