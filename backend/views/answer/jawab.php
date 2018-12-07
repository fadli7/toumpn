<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Answer */

$this->title = 'Ujian';
$this->params['breadcrumbs'][] = ['label' => 'Ujian', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="answer-jawab">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formjawab', [
        'model' => $model,
        'data' => $data
    ]) ?>

</div>
