<?php

namespace backend\controllers;

use app\models\UploadForm;
use Yii;
use app\models\Car;
use app\models\CarSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CarController implements the CRUD actions for Car model.
 */
class CarController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class'   => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'matchCallback' => function ($rule, $action){

                            if(Yii::$app->user->isGuest)
                                return false;

                            return Yii::$app->user->identity->username === 'admin';
                        }
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Car models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Car model.
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
     * Creates a new Car model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Car();
        $model->user_id = Yii::$app->getUser()->id;

        $modelUpload = new UploadForm();

        if (Yii::$app->request->isPost) {
            $modelUpload->imageFile = UploadedFile::getInstance($modelUpload, 'imageFile');
            $resultUpload = $modelUpload->upload();
            $modelUpload->thumbnail();
            if ($resultUpload) {
                $model->image_name = $resultUpload['image_name'];
                $model->image_path = $resultUpload['image_path'];
            }
        }

        if ($model->load(Yii::$app->request->post()) && $modelUpload->getErrors() == null && $model->save()) {

            return $this->redirect(['view', 'id' => $model->id]);
        } else {

            return $this->render('create', [
                'model'       => $model,
                'modelUpload' => $modelUpload,
            ]);
        }
    }

    /**
     * Updates an existing Car model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $modelUpload = new UploadForm();

        if (Yii::$app->request->isPost) {
            $modelUpload->imageFile = UploadedFile::getInstance($modelUpload, 'imageFile');
            $resultUpload = $modelUpload->upload();
            $modelUpload->thumbnail();
            if ($resultUpload) {
                $model->image_name = $resultUpload['image_name'];
                $model->image_path = $resultUpload['image_path'];
            }
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model'       => $model,
                'modelUpload' => $modelUpload,
            ]);
        }
    }

    /**
     * Deletes an existing Car model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Car model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Car the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Car::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
