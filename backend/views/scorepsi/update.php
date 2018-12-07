<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Scorepsi */

$this->title = 'Update Scorepsi: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Scorepsis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_scorePsi, 'url' => ['view', 'id' => $model->id_scorePsi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="scorepsi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
