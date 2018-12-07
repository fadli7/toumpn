<?php

use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ExamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
use backend\models\QuestionChoice;

$this->title = 'Tryout UMPN';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="exam-umpn">
    <div class="body-content">
        <div><h2 text-align: center;>Waktu Ujian <span id="time">00:00</span> menit</h2></div>
        <div class="row">
            <form method="post" action="/answer/jawab" name="formujian" id="formujian">
                <input type="hidden" name="<?php echo Yii::$app->request->csrfParam;?>" 
                    value="<?php echo Yii::$app->request->csrfToken;?>">
                <input type="hidden" name="Answer[answer][id_exam]" value="<?php echo $id_exam;?>">

                <?php $i=0; foreach ($allQuestion as $key1) { ?>
                    <h2><?= $key1['name_chapter'];?></h2>
                    <ol>
                    <?php foreach ($key1['soal'] as $key2) { ?>
                        <li>
                            <?php echo $key2['question'];?>
                            <!-- jawaban disini -->
                            <?php $answer = QuestionChoice::find()->where(['id_question'=>$key2['id_question']])->one(); ?>
                            <ol type="a">
                                <li>
                                    <input type="radio" name="Answer[answer][<?= $i;?>][]" value="<?php echo $answer['choice_1'];?>">
                                    <?php echo $answer['choice_1'];?>
                                </li>
                                <li>
                                    <input type="radio" name="Answer[answer][<?= $i;?>][]" value="<?php echo $answer['choice_2'];?>">
                                    <?php echo $answer['choice_2'];?>
                                </li>
                                <li>
                                    <input type="radio" name="Answer[answer][<?= $i;?>][]" value="<?php echo $answer['choice_3'];?>">
                                    <?php echo $answer['choice_3'];?>
                                </li>
                                <li>
                                    <input type="radio" name="Answer[answer][<?= $i;?>][]" value="<?php echo $answer['choice_4'];?>">
                                    <?php echo $answer['choice_4'];?>
                                </li>
                                <li>
                                    <input type="radio" name="Answer[answer][<?= $i;?>][]" value="<?php echo $answer['choice_5'];?>">
                                    <?php echo $answer['choice_5'];?>
                                </li>
                            </ol>
                        </li>
                    <?php $i++; } ?>
                    </ol>
                    <hr>
                <?php } ?>

                <input type="submit" value="Submit" class = "btn btn-primary">
            </form>
        </div>
    </div>

</div>
<script type="text/javascript">
    function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    var interval = setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            clearInterval(interval);
            var konfirmasi = confirm("Waktu Habis! Submit Ujian Anda");  
            if(konfirmasi){
                document.getElementById('formujian').submit();
            }          
        }
    }, 1000);
}
//60 * (2*60)
window.onload = function () {
    var fiveMinutes = 60 * (2*60) ,
        display = document.querySelector('#time');
    setTimeout(startTimer(fiveMinutes, display),1000);
};
</script>
