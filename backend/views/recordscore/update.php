<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Recordscore */

$this->title = 'Edit Nilai Tryout';
$this->params['breadcrumbs'][] = ['label' => 'Nilai Tryout', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_recordscore, 'url' => ['view', 'id' => $model->id_recordscore]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="recordscore-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
