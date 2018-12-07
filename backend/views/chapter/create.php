<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Chapter */

$this->title = 'Tambah Paket Soal';
$this->params['breadcrumbs'][] = ['label' => 'Paket Soal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chapter-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
