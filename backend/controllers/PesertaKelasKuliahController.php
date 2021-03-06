<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use common\models\ImportFile;
use yii\web\NotFoundHttpException;
use common\models\PesertaKelasKuliah;
use common\models\PesertaKelasKuliahSearch;

/**
 * PesertaKelasKuliahController implements the CRUD actions for PesertaKelasKuliah model.
 */
class PesertaKelasKuliahController extends Controller
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
                    'delete-feeder' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all PesertaKelasKuliah models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PesertaKelasKuliahSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PesertaKelasKuliah model.
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

    public function actionImport()
    {        
        $model = new ImportFile;
        $model->tipe = 'upload';
        
        if ($model->load(Yii::$app->request->post())) {
            $uploadedFile = \yii\web\UploadedFile::getInstance($model,'file');
            $contents = file_get_contents($uploadedFile->tempName);
            $contents = json_decode($contents,1);
            $transaction = \Yii::$app->db->beginTransaction();
            try {
                foreach($contents['data'] as $data)
                {
                    $m = new PesertaKelasKuliah();
                    $m->setAttributes($data);
                    $m->save();
                }
                $transaction->commit();
            } catch (\Throwable $th) {
                throw $th;
                $transaction->rollback();
            }
            return $this->redirect(['index']);
        }

        return $this->render('import', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new PesertaKelasKuliah model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PesertaKelasKuliah();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing PesertaKelasKuliah model.
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
     * Deletes an existing PesertaKelasKuliah model.
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

    public function actionDeleteFeeder()
    {
        Yii::$app->db->createCommand()->truncateTable('peserta_kelas_kuliah')->execute();
        
        return $this->redirect(['index']);
    }

    /**
     * Finds the PesertaKelasKuliah model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PesertaKelasKuliah the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PesertaKelasKuliah::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
