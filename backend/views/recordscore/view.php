<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Recordscore */

$this->params['breadcrumbs'][] = ['label' => 'Nilai Tryout', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recordscore-view">

    <p>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id_recordscore], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_recordscore',
            'id_exam',
            'id_student',
            'benar',
            'salah',
            'score',
            'date',
            'rekomendasi'
        ],
    ]) ?>

</div>
