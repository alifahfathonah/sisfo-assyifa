<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\models\ImportFile;
use common\models\MahasiswaIpk;
use yii\web\NotFoundHttpException;
use common\models\MahasiswaIpkSearch;

/**
 * MahasiswaIpkController implements the CRUD actions for MahasiswaIpk model.
 */
class MahasiswaIpkController extends Controller
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
     * Lists all MahasiswaIpk models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MahasiswaIpkSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MahasiswaIpk model.
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
     * Creates a new MahasiswaIpk model.
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
                $MahasiswaKrs = new MahasiswaIpk();
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
     * Updates an existing MahasiswaIpk model.
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
     * Deletes an existing MahasiswaIpk model.
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
        Yii::$app->db->createCommand()->truncateTable('mahasiswa_ipk')->execute();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MahasiswaIpk model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MahasiswaIpk the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MahasiswaIpk::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
