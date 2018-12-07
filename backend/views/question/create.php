<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Question */

$this->title = 'Tambah Soal';
$this->params['breadcrumbs'][] = ['label' => 'Soal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
