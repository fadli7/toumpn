<?php

namespace backend\controllers;

use Yii;
use backend\models\Answer;
use backend\models\AnswerSearch;
use backend\models\Exam;
use backend\models\User;
use backend\models\Recordscore;
use backend\models\Scorepsi;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;

/**
 * AnswerController implements the CRUD actions for Answer model.
 */
class AnswerController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Answer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AnswerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Answer model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Answer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Answer();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_answer]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function cariNilaiJawaban($array) 
    {
      $jml = count($array);
      for ($i=0; $i < $jml; $i++) { 
        if($array[$i]){
          return $array[$i];
        }
      }
    }

    public function actionJawab()
    {
        $model = new Answer();
        $query = new Query;

        $query->select('question,choice_1,choice_2,choice_3,choice_4,choice_5,question.id_question,chapter.id_exam')
        ->from('question, question_choice, chapter')
        ->where('question.id_question = question_choice.id_question AND chapter.id_chapter = question.id_chapter')
        ->orderBy('question.id_question');
        $command = $query->createCommand();
        $data = $command->queryAll();

        if ($model->load(Yii::$app->request->post())) {
            
            $jmlSoal      = count($model->answer) - 1;
            $nilaiJawabanBenar  = 0;
            $nilaiJawabanSalah  = 0;
            $allScore;
            //$nilaiJawabanKosong = abs(count($data) - $jmlSoal);
            for ($i=0; $i < $jmlSoal; $i++) { 
              $jawaban = $this->cariNilaiJawaban($model->answer[$i]);
              $qq1 = new Query;
              $qq1->select("id_qchoice, true_answer, id_question")->from("question_choice")
                ->where("true_answer = '".$jawaban."'");
              $cmdQq1 = $qq1->createCommand();
              $ddQq1  = $cmdQq1->queryAll();

              if(count($ddQq1) == 1){
                $nilaiJawabanBenar++;
              }
              else{
                $nilaiJawabanSalah++;
              }
            }

            //cari student
            $getStudet = User::findOne(['id' => Yii::$app->user->identity->id]);

            //echo count($model->answer);

            $recordScore = new Recordscore();
            $recordScore->id_exam     = $model->answer['id_exam'];
            $recordScore->id_student  = $getStudet["id"];
            $recordScore->benar       = $nilaiJawabanBenar;
            $recordScore->salah       = $nilaiJawabanSalah;
            $recordScore->score       = (($nilaiJawabanBenar * 4) - $nilaiJawabanSalah);
            $allScore = $recordScore->score;

            if($allScore < 181){
              $recordScore->rekomendasi = "belum memenuhi syarat nilai" ;
            }
            elseif ($allScore >= 181 && $allScore < 192) {
              $recordScore->rekomendasi = "D3 Multimedia Broadcasting" ;
            }
            elseif ($allScore >= 192 && $allScore < 199) {
              $recordScore->rekomendasi = "D3 Multimedia Broadcasting; D3 Teknik Telekomunikasi " ;
            }
            elseif ($allScore >= 199 && $allScore < 207) {
              $recordScore->rekomendasi = "D3 Multimedia Broadcasting; D3 Teknik Telekomunikasi; D3 Teknik Elektronika " ;
            }
            elseif ($allScore >= 207 && $allScore < 218) {
              $recordScore->rekomendasi = "D3 Multimedia Broadcasting; D3 Teknik Telekomunikasi; D3 Teknik Elektronika; D3 Teknik Elektro Industri; D4 SPE" ;
            }
            elseif ($allScore >= 218 && $allScore < 223) {
              $recordScore->rekomendasi = "D3 Multimedia Broadcasting; D3 Teknik Telekomunikasi; D3 Teknik Elektronika; D3 Teknik Elektro Industri; D4 SPE" ;
            }
            elseif ($allScore >= 223 && $allScore < 225) {
              $recordScore->rekomendasi = "D3 Multimedia Broadcasting; D3 Teknik Telekomunikasi; D3 Teknik Elektronika ; D3 Teknik Elektro Industri; D4 SPE; D3 Teknik Informatika" ;
            }
            elseif ($allScore >= 225 && $allScore < 227) {
              $recordScore->rekomendasi = "D3 Multimedia Broadcasting; D3 Teknik Telekomunikasi; D3 Teknik Elektronika; D3 Teknik Elektro Industri; D4 SPE; D3 Teknik Informatika; D4 Teknik Mekatronika" ;
            }
            elseif ($allScore >= 227 && $allScore < 230) {
              $recordScore->rekomendasi = "D3 Multimedia Broadcasting; D3 Teknik Telekomunikasi; D3 Teknik Elektronika; D3 Teknik Elektro Industri; D4 SPE; D3 Teknik Informatika; D4 Teknik Mekatronika; D4 Teknologi Game" ;
            }
            elseif ($allScore = 230) {
              $recordScore->rekomendasi = "D3 Multimedia Broadcasting; D3 Teknik Telekomunikasi; D3 Teknik Elektronika; D3 Teknik Elektro Industri; D4 SPE; D3 Teknik Informatika; D4 Teknik Mekatronika; D4 Teknologi Game; D4 Teknik Komputer" ;
            }
            elseif ($allScore >= 231 && $allScore < 247) {
              $recordScore->rekomendasi = "D3 Multimedia Broadcasting; D3 Teknik Telekomunikasi; D3 Teknik Elektronika; D3 Teknik Elektro Industri; D4 SPE; D3 Teknik Informatika; D4 Teknik Mekatronika; D4 Teknologi Game; D4 Teknik Komputer; D4 Teknik Telekomunikasi" ;
            }
            elseif ($allScore >= 247 && $allScore < 263) {
              $recordScore->rekomendasi = "D3 Multimedia Broadcasting; D3 Teknik Telekomunikasi; D3 Teknik Elektronika; D3 Teknik Elektro Industri; D4 SPE; D3 Teknik Informatika; D4 Teknik Mekatronika; D4 Teknologi Game; D4 Teknik Komputer; D4 Teknik Telekomunikasi" ;
            }
            elseif ($allScore >= 263 && $allScore < 276) {
              $recordScore->rekomendasi = "D3 Multimedia Broadcasting; D3 Teknik Telekomunikasi; D3 Teknik Elektronika; D3 Teknik Elektro Industri; D4 SPE; D3 Teknik Informatika; D4 Teknik Mekatronika; D4 Teknologi Game; D4 Teknik Komputer; D4 Teknik Telekomunikasi; D4 Teknik Elektronika" ;
            }
            elseif ($allScore >= 276) {
              $recordScore->rekomendasi = "D3 Multimedia Broadcasting; D3 Teknik Telekomunikasi; D3 Teknik Elektronika; D3 Teknik Elektro Industri; D4 SPE; D3 Teknik Informatika; D4 Teknik Mekatronika; D4 Teknologi Game; D4 Teknik Komputer; D4 Teknik Telekomunikasi; D4 Teknik Elektronika; D4 Teknik Informatika" ;
            }
            else{
              $recordScore->rekomendasi = "nilai error "; 
            }

            $recordScore->date        = date('Y-m-d');
            $recordScore->save();

            return $this->redirect(['recordscore/nilai']);
        }else{
            return $this->render('jawab', [
                'model' => $model,
                'data' => $data
            ]);
        }
    }


    public function actionHasil()
    {
        $model = new Answer();
        $query = new Query;

        $query->select('question,choice_1,choice_2,choice_3,choice_4,choice_5,question.id_question,chapter.id_exam')
        ->from('question, question_choice, chapter')
        ->where('question.id_question = question_choice.id_question AND chapter.id_chapter = question.id_chapter')
        ->orderBy('question.id_question');
        $command = $query->createCommand();
        $data = $command->queryAll();

        if ($model->load(Yii::$app->request->post())) {
            
            $jmlSoal      = count($model->answer) - 1;
            $nilaiJawabanBenar  = 0;
            $nilaiJawabanSalah  = 0;
            $allSkala;
            $tempSkala = 5;
            $interval   = 15 / $tempSkala;
            $examid;
          
            //$nilaiJawabanKosong = abs(count($data) - $jmlSoal);
            for ($i=0; $i < $jmlSoal; $i++) { 
              $jawaban = $this->cariNilaiJawaban($model->answer[$i]);
              $qq1 = new Query;
              $qq1->select("id_qchoice, true_answer, id_question")->from("question_choice")
                ->where("true_answer = '".$jawaban."'");
              $cmdQq1 = $qq1->createCommand();
              $ddQq1  = $cmdQq1->queryAll();

              if(count($ddQq1) == 1){
                $nilaiJawabanBenar++;
              }
              else{
                $nilaiJawabanSalah++;
              }
            }

            //cari student
            $getStudet = User::findOne(['id' => Yii::$app->user->identity->id]);

            // echo ($model->answer['id_exam']);

            $scorePsi = new Scorepsi();
            $scorePsi->id_exam     = $model->answer['id_exam'];
            $scorePsi->id_student  = $getStudet["id"];
            $scorePsi->benar       = $nilaiJawabanBenar;
            $scorePsi->totalSoal   = $jmlSoal;

            $examid = $model->answer['id_exam'];
            
            $allSkala = $scorePsi->benar;
            if ($examid == 4) {
                if($allSkala >= 0 && $allSkala <= $interval){
                  $scorePsi->skala       = 1;
                  $scorePsi->description = "Kemampuan belajar Anda sangat kurang." ;
                }
                if($allSkala > $interval && $allSkala <= $interval*2){
                  $scorePsi->skala       = 2;
                  $scorePsi->description = "Kemampuan belajar Anda kurang." ;
                }
                elseif ($allSkala > $interval*2 && $allSkala <= $interval*3 ) {
                  $scorePsi->skala       = 3;
                  $scorePsi->description = "Kemampuan belajar Anda cukup baik." ;
                }
                elseif ($allSkala > $interval*3 && $allSkala <= $interval*4 ) {
                  $scorePsi->skala       = 4;
                  $scorePsi->description = "Kemampuan belajar Anda baik." ;
                }
                elseif ($allSkala > $interval*4 && $allSkala <= $interval*5 ){
                  $scorePsi->skala       = 5;
                  $scorePsi->description = "Kemampuan belajar Anda sangat baik." ;
                }

                $scorePsi->date        = date('Y-m-d');
                $scorePsi->save();
            }

            elseif ($examid == 5) {
                if($allSkala >= 0 && $allSkala <= $interval){
                  $scorePsi->skala       = 1;
                  $scorePsi->description = "Kemampuan Anda sangat kurang dalam memahami informasi yang berasal dari luar." ;
                }
                if($allSkala > $interval && $allSkala <= $interval*2){
                  $scorePsi->skala       = 2;
                  $scorePsi->description = "Anda kurang dapat memahami informasi yang berasal dari luar." ;
                }
                elseif ($allSkala > $interval*2 && $allSkala <= $interval*3 ) {
                  $scorePsi->skala       = 3;
                  $scorePsi->description = "Anda cukup baik dalam memahami informasi yang berasal dari luar." ;
                }
                elseif ($allSkala > $interval*3 && $allSkala <= $interval*4 ) {
                  $scorePsi->skala       = 4;
                  $scorePsi->description = "Anda dapat memahami informasi yang berasal dari luar dengan baik." ;
                }
                elseif ($allSkala > $interval*4 && $allSkala <= $interval*5 ){
                  $scorePsi->skala       = 5;
                  $scorePsi->description = "Anda dapat memahami informasi yang berasal dari luar dengan sangat baik." ;
                }

                $scorePsi->date        = date('Y-m-d');
                $scorePsi->save();

            }

            elseif ($examid == 6) {
                if($allSkala >= 0 && $allSkala <= $interval){
                $scorePsi->skala       = 1;
                $scorePsi->description = "Anda juga sangat kurang mampu menalar suatu permasalahan." ;
                }
                if($allSkala > $interval && $allSkala <= $interval*2){
                  $scorePsi->skala       = 2;
                  $scorePsi->description = "Anda juga kurang mampu menalar suatu permasalahan." ;
                }
                elseif ($allSkala > $interval*2 && $allSkala <= $interval*3 ) {
                  $scorePsi->skala       = 3;
                  $scorePsi->description = "Anda juga cukup mampu menalar suatu permasalahan." ;
                }
                elseif ($allSkala > $interval*3 && $allSkala <= $interval*4 ) {
                  $scorePsi->skala       = 4;
                  $scorePsi->description = "Anda juga mampu menalar suatu permasalahan dengan baik." ;
                }
                elseif ($allSkala > $interval*4 && $allSkala <= $interval*5 ){
                  $scorePsi->skala       = 5;
                  $scorePsi->description = "Anda juga sangat baik mampu menalar suatu permasalahan." ;
                }

                $scorePsi->date        = date('Y-m-d');
                $scorePsi->save();
            }

            elseif ($examid == 7) {
                if($allSkala >= 0 && $allSkala <= $interval){
                $scorePsi->skala       = 1;
                $scorePsi->description = "Hanya saja, kemampuan angkawinya belum memadai." ;
                }
                if($allSkala > $interval && $allSkala <= $interval*2){
                  $scorePsi->skala       = 2;
                  $scorePsi->description = "Hanya saja, kemampuan angkawinya masih kurang." ;
                }
                elseif ($allSkala > $interval*2 && $allSkala <= $interval*3 ) {
                  $scorePsi->skala       = 3;
                  $scorePsi->description = "Serta, kemampuan angkawinya cukup memadai." ;
                }
                elseif ($allSkala > $interval*3 && $allSkala <= $interval*4 ) {
                  $scorePsi->skala       = 4;
                  $scorePsi->description = "Serta, kemampuan angkawinya sudah baik." ;
                }
                elseif ($allSkala > $interval*4 && $allSkala <= $interval*5 ){
                  $scorePsi->skala       = 5;
                  $scorePsi->description = "Serta, kemampuan angkawi Anda sangat baik." ;
                }

                $scorePsi->date        = date('Y-m-d');
                $scorePsi->save();
            }
            
            return $this->redirect(['scorepsi/nilai']);

        }else{
            return $this->render('hasil', [
                'model' => $model,
                'data' => $data
            ]);
        }
    }


    /**
     * Updates an existing Answer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_answer]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Answer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Answer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Answer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Answer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
