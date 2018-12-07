<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Chapter */

$this->title = 'Edit Paket Soal';
$this->params['breadcrumbs'][] = ['label' => 'Paket Soal', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id_chapter]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="chapter-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
