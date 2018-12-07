<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Scorepsi */

$this->title = 'Create Scorepsi';
$this->params['breadcrumbs'][] = ['label' => 'Scorepsis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scorepsi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
