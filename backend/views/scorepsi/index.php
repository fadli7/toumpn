<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ScorepsiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Nilai Psikotes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scorepsi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_scorePsi',
            'id_exam',
            'id_student',
            'benar',
            'totalSoal',
            'skala',
            'description',
            'date',

            ['class' => 'yii\grid\ActionColumn2'],
        ],
    ]); ?>
</div>
