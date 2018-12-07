<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Chapter */

$this->params['breadcrumbs'][] = ['label' => 'Paket Soal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chapter-view">

    <p>
        <?= Html::a('Edit', ['update', 'id' => $model->id_chapter], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id_chapter], [
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
            'id_chapter',
            'name',
            'description:ntext',
            'id_subject',
            'id_exam'
        ],
    ]) ?>

</div>
