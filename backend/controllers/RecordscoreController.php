<?php

namespace backend\controllers;

use Yii;
use backend\models\Recordscore;
use backend\models\RecordscoreForm;
use backend\models\RecordscoreSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RecordscoreController implements the CRUD actions for Recordscore model.
 */
class RecordscoreController extends Controller
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
     * Lists all Recordscore models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RecordscoreSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionNilai()
    {
        $searchModel = new RecordscoreSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('nilai', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single Recordscore model.
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
     * Creates a new Recordscore model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelTable = new Recordscore();
        $modelForm = new RecordscoreForm();

        if ($modelForm->load(Yii::$app->request->post())) {
            $modelTable->id_exam = $modelForm->id_exam;
            $modelTable->id_student = $modelForm->id_student;
            $modelTable->benar = $modelForm->benar;
            $modelTable->salah = $modelForm->salah;
            $modelTable->kosong = $modelForm->kosong;
            $modelTable->score = $modelForm->score;
            $modelTable->date = $modelForm->date;
            $modelTable->save();
            
            $this->redirect(['recordscore/index']);
        }
        else
        {
            return $this->render('create', [
                'model' => $modelForm,
            ]);
        }
    }
    /**
     * Updates an existing Recordscore model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_recordscore]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Recordscore model.
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
     * Finds the Recordscore model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Recordscore the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Recordscore::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
