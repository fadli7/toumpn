<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Exam */

$this->title = 'Edit Ujian';
$this->params['breadcrumbs'][] = ['label' => 'Ujian', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id_exam]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="exam-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
