<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Recordscore */

$this->title = 'Tambah';
$this->params['breadcrumbs'][] = ['label' => 'Nilai Tryout', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recordscore-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
