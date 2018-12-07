<?php

namespace backend\controllers;

use Yii;
use backend\models\Chapter;
use backend\models\Question;
use backend\models\Exam;
use backend\models\ExamSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ExamController implements the CRUD actions for Exam model.
 */
class ExamController extends Controller
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
     * Lists all Exam models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ExamSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUjian()
    {
        return $this->render('ujian');
    }

    public function actionUmpn()
    {
        $dExam = Exam::find()->where(['status'=>'Y'])
                    ->andWhere(['LIKE', 'name', 'Tryout'])->all();

        return $this->render('umpn', [
            'dExam' => $dExam
        ]);
    }

    public function actionPsikotes()
    {
        $dExam = Exam::find()->where(['status'=>'Y'])
                    ->andWhere(['NOT LIKE', 'name', 'Tryout'])->all();

        return $this->render('psikotes', [
            'dExam' => $dExam
        ]);
    }      

    public function actionJenis($id)
    {
        $dChapter = Chapter::find()->where(['id_exam'=>$id])->all();
        $tempSoal = [];
        foreach ($dChapter as $key) {
            $dQuestion = Question::find()->where(['id_chapter'=>$key['id_chapter']])->all();
            array_push($tempSoal, ['soal'=>$dQuestion, 'id_chapter'=>$key['id_chapter'], 'name_chapter'=>$key['name']]);
        }

        return $this->render('jenis', [
            'allQuestion'=>$tempSoal,
            'id_exam' => $id
        ]);
    }

    public function actionMacam($id)
    {
        $dChapter = Chapter::find()->where(['id_exam'=>$id])->all();
        $tempSoal = [];
        foreach ($dChapter as $key) {
            $dQuestion = Question::find()->where(['id_chapter'=>$key['id_chapter']])->all();
            array_push($tempSoal, ['soal'=>$dQuestion, 'id_chapter'=>$key['id_chapter'], 'name_chapter'=>$key['name']]);
        }

        return $this->render('macam', [
            'allQuestion'=>$tempSoal,
            'id_exam' => $id
        ]);
    }
    /**
     * Displays a single Exam model.
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
     * Creates a new Exam model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Exam();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_exam]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Exam model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_exam]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Exam model.
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
     * Finds the Exam model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Exam the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Exam::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
