<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ChapterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Paket Soal';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chapter-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Paket Soal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_chapter',
            'name',
            'description:ntext',
            'id_subject',
            'id_exam',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
