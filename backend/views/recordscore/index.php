<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RecordscoreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nilai Tryout Siswa';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recordscore-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <p>
        <?= Html::a('Nilai Psikotes', ['/scorepsi/'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_recordscore',
            'id_exam',
            'id_student',
            'benar',
            'salah',
            'score',
            'date',
            'rekomendasi',
            ['class' => 'yii\grid\ActionColumn2'],
        ],
    ]); ?>
</div>
