<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\models\ImportFile;
use common\models\MahasiswaKhs;
use yii\web\NotFoundHttpException;
use common\models\MahasiswaKhsSearch;

/**
 * MahasiswaKhsController implements the CRUD actions for MahasiswaKhs model.
 */
class MahasiswaKhsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                    'delete-all' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all MahasiswaKhs models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MahasiswaKhsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MahasiswaKhs model.
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
     * Creates a new MahasiswaKhs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ImportFile;
        $model->tipe = 'upload';

        if ($model->load(Yii::$app->request->post())) {
            $uploadedFile = \yii\web\UploadedFile::getInstance($model,'file');
            $contents = file_get_contents($uploadedFile->tempName);
            $contents = json_decode($contents,1);
            foreach($contents['data'] as $data)
            {
                $MahasiswaKrs = new MahasiswaKhs();
                $MahasiswaKrs->setAttributes($data);
                $MahasiswaKrs->save();
            }
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MahasiswaKhs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MahasiswaKhs model.
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

    public function actionDeleteAll()
    {
        Yii::$app->db->createCommand()->truncateTable('mahasiswa_khs')->execute();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MahasiswaKhs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MahasiswaKhs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MahasiswaKhs::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
