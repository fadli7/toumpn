<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AnswerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Answers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="answer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Answer', ['jawab'], ['class' => 'btn btn-success']) ?>
    </p>
</div>
