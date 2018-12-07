<?php

namespace backend\controllers;

use Yii;
use backend\models\Scorepsi;
use backend\models\ScorepsiForm;
use backend\models\ScorepsiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ScorepsiController implements the CRUD actions for Scorepsi model.
 */
class ScorepsiController extends Controller
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
     * Lists all Scorepsi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ScorepsiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionNilai()
    {
        $searchModel = new ScorepsiSearch();
        $dataProvider = $searchModel->searchs(Yii::$app->request->queryParams);

        return $this->render('nilai', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Scorepsi model.
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
     * Creates a new Scorepsi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modelTable = new Scorepsi();
        $modelForm = new ScorepsiForm();

        if ($modelForm->load(Yii::$app->request->post())) {
            $modelTable->id_exam = $modelForm->id_exam;
            $modelTable->id_student = $modelForm->id_student;
            $modelTable->benar = $modelForm->benar;
            $modelTable->totalSoal = $modelForm->totalSoal;
            $modelTable->skala = $modelForm->skala;
            $modelTable->description = $modelForm->description;
            $modelTable->date = $modelForm->date;
            $modelTable->save();
            
            $this->redirect(['score/index']);
        }
        else
        {
            return $this->render('create', [
                'model' => $modelForm,
            ]);
        }
    }

    /**
     * Updates an existing Scorepsi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_scorePsi]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Scorepsi model.
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
     * Finds the Scorepsi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Scorepsi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Scorepsi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
