<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\QuestionChoiceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pilihan Ganda';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-choice-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Pilihan Ganda', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_qchoice',
            'choice_1',
            'choice_2',
            'choice_3',
            'choice_4',
            //'choice_5',
            //'answer',
            //'id_question',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
