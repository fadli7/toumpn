<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\QuestionChoice */

$this->title = 'Edit Pilihan Ganda';
$this->params['breadcrumbs'][] = ['label' => 'Pilihan Ganda', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_qchoice, 'url' => ['view', 'id' => $model->id_qchoice]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="question-choice-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
