<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Question */

$this->title = 'Edit Soal';
$this->params['breadcrumbs'][] = ['label' => 'Soal', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_question, 'url' => ['view', 'id' => $model->id_question]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="question-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
