<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\OnlineConsulting */

$this->title = 'Create Online Consulting';
$this->params['breadcrumbs'][] = ['label' => 'Online Consultings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="online-consulting-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
