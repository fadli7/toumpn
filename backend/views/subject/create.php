<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Subject */

$this->title = 'Tambah Mapel';
$this->params['breadcrumbs'][] = ['label' => 'Mata Pelajaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
