<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Subject */

$this->title = 'Edit Mata Pelajaran';
$this->params['breadcrumbs'][] = ['label' => 'Mata Pelajaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id_subject]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="subject-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
