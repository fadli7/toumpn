<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Scorepsi */

$this->params['breadcrumbs'][] = ['label' => 'Detail Nilai', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scorepsi-view">

    <p>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id_scorePsi], [
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
            'id_scorePsi',
            'id_exam',
            'id_student',
            'benar',
            'totalSoal',
            'skala',
            'description',
            'date',
        ],
    ]) ?>

</div>
