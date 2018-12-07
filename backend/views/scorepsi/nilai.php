<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RecordscoreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nilai Psikotes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scorepsi-nilai">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'benar',
            'totalSoal',
            'skala',
            'description',
            'date',
            ['class' => 'yii\grid\ActionColumn2'],
        ],
    ]); ?>
</div>
