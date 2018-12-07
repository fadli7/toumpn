<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Exam */

$this->title = 'Tambah Ujian';
$this->params['breadcrumbs'][] = ['label' => 'Ujian', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exam-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
