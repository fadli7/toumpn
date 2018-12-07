<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\QuestionChoice */

$this->title = 'Tambah Pilihan Ganda';
$this->params['breadcrumbs'][] = ['label' => 'Pilihan Ganda', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-choice-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
