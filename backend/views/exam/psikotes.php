<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ExamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tes Psikotes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exam-psikotes">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="body-content">

        <div class="row">
            
            <table class="table table-bordered">
            <?php foreach ($dExam as $key) { ?>
                <tr>
                    <td><?php echo $key['name'];?></td>
                    <td>
                        <?php echo Html::a('Tes Sekarang', ['exam/macam', 'id'=>$key['id_exam']], ['class'=>'btn btn-default']);?>
                    </td>
                </tr>
            <?php } ?>
            </table>

        </div>

    </div>

</div>
