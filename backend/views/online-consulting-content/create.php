<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\OnlineConsultingContent */

$this->title = 'Create Online Consulting Content';
$this->params['breadcrumbs'][] = ['label' => 'Online Consulting Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="online-consulting-content-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
