<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RecordscoreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nilai Tryout';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recordscore-nilai">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'benar',
            'salah',
            'score',
            'date',
            'rekomendasi',
            ['class' => 'yii\grid\ActionColumn2'],
        ],
    ]); ?>
    <h4>Rekomendasi tidak termasuk test bakat artistik</h4>
</div>
