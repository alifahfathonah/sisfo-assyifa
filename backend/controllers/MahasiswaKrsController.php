<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\models\ImportFile;
use common\models\MahasiswaKrs;
use yii\web\NotFoundHttpException;
use common\models\MahasiswaKrsSearch;

/**
 * MahasiswaKrsController implements the CRUD actions for MahasiswaKrs model.
 */
class MahasiswaKrsController extends Controller
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
     * Lists all MahasiswaKrs models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MahasiswaKrsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MahasiswaKrs model.
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
     * Creates a new MahasiswaKrs model.
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
                $MahasiswaKrs = new MahasiswaKrs();
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
     * Updates an existing MahasiswaKrs model.
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
     * Deletes an existing MahasiswaKrs model.
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
        Yii::$app->db->createCommand()->truncateTable('mahasiswa_krs')->execute();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MahasiswaKrs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MahasiswaKrs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MahasiswaKrs::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
