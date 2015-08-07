<?php

namespace backend\controllers;

use app\models\UploadFileForm;
use Yii;
use app\models\Repair;
use app\models\RepairSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * RepairController implements the CRUD actions for Repair model.
 */
class RepairController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs'  => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow'         => true,
                        'matchCallback' => function ($rule, $action) {

                            if (Yii::$app->user->isGuest)
                                return false;

                            return Yii::$app->user->identity->username === 'admin';
                        }
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Repair models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RepairSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Repair model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Repair model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Repair();

        $modelFile = new UploadFileForm();

        if (Yii::$app->request->isPost) {

            $model->load(Yii::$app->request->post());

            $model->user_id = Yii::$app->user->getId();

            $modelFile->file = UploadedFile::getInstance($modelFile, 'file');;

            $model->validate();

            $modelFile->validate();

            if ($model->getErrors() == null and $modelFile->getErrors() == null) {

                $response = $modelFile->upload();

                if ($response != false) {
                    $model->file = $response['file_path'];
                    $model->file_name = $response['file_name'];
                }

                if ($model->save()) {

                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        }

        return $this->render('create', [
            'model'     => $model,
            'modelFile' => $modelFile,
        ]);
    }

    /**
     * Updates an existing Repair model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        return Yii::$app->response->sendFile($model->file);

        $modelFile = new UploadFileForm();

        if (Yii::$app->request->isPost) {
            $modelFile->file = UploadedFile::getInstance($modelFile, 'file');
            $resultUpload = $modelFile->upload();
            if ($resultUpload) {
                if (file_exists($model->file) and unlink($model->file)) {
                    $model->file = $resultUpload['file_path'];
                    $model->file_name = $resultUpload['file_name'];
                }
            }
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model'     => $model,
            'modelFile' => $modelFile,
        ]);
    }

    /**
     * Deletes an existing Repair model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if (file_exists($model->file))
            unlink($model->file);

        $model->delete();

        return $this->redirect(['index']);
    }

    public function actionDownloadFile($id)
    {
        $model = $this->findModel($id);

        return Yii::$app->response->sendFile($model->file, $model->file_name);
    }

    /**
     * Finds the Repair model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Repair the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Repair::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
