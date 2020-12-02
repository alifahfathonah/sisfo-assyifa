<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Dosen;
use common\models\Prodi;
use yii\filters\VerbFilter;
use common\models\ListProdi;
use yii\helpers\ArrayHelper;
use common\models\ImportFile;
use common\models\ProdiSearch;
use yii\web\NotFoundHttpException;

/**
 * ProdiController implements the CRUD actions for Prodi model.
 */
class ProdiController extends Controller
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
                ],
            ],
        ];
    }

    /**
     * Lists all Prodi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProdiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
                    $check_prodi = Prodi::findOne(['kode'=>$data['kode_program_studi']]);
                    if(!$check_prodi)
                    {
                        $prodi = new Prodi;
                        $prodi->setAttributes([
                            'kode' => $data['kode_program_studi'],
                            'nama' => $data['nama_program_studi'],
                            'jenjang' => $data['nama_jenjang_pendidikan'],
                        ]);
                        $prodi->save();
                    }
                    $importModel = new ListProdi;
                    $importModel->setAttributes($data);
                    $importModel->save();
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
     * Displays a single Prodi model.
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
     * Creates a new Prodi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Prodi();
        $list_dosen = Dosen::find()->all();
        $list_dosen = ArrayHelper::map($list_dosen,'id','nama');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'list_dosen' => $list_dosen,
        ]);
    }

    /**
     * Updates an existing Prodi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $list_dosen = Dosen::find()->all();
        $list_dosen = ArrayHelper::map($list_dosen,'id','nama');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'list_dosen' => $list_dosen,
        ]);
    }

    /**
     * Deletes an existing Prodi model.
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
     * Finds the Prodi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Prodi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Prodi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
