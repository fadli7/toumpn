<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ExamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ujian-Ujian';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exam-ujian">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="jumbotron">
        <p>
            <?= Html::a('Tryout UMPN', ['umpn'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Psikotes', ['psikotes'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>

</div>
