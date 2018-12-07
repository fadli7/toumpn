<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Subject */

$this->params['breadcrumbs'][] = ['label' => 'Mata Pelajaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subject-view">

    <p>
        <?= Html::a('Edit', ['update', 'id' => $model->id_subject], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id_subject], [
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
            'id_subject',
            'name',
            'shortname',
        ],
    ]) ?>

</div>
