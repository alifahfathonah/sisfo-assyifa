<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use yii\web\Controller;
use common\models\Dosen;
use yii\filters\VerbFilter;
use common\models\ListDosen;
use common\models\ImportFile;
use common\models\DosenSearch;
use yii\web\NotFoundHttpException;
use common\models\DetailBiodataDosen;
use common\models\ListPenugasanDosen;
use common\models\RiwayatPangkatDosen;
use common\models\DetailPenugasanDosen;
use common\models\AktivitasMengajarDosen;
use common\models\RiwayatFungsionalDosen;
use common\models\RiwayatPendidikanDosen;
use common\models\RiwayatPenelitianDosen;
use common\models\ListPenugasanSemuaDosen;
use common\models\RiwayatSertifikasiDosen;
use common\models\RiwayatPangkatDosenSearch;
use common\models\RiwayatFungsionalDosenSearch;
use common\models\RiwayatPendidikanDosenSearch;
use common\models\RiwayatPenelitianDosenSearch;
use common\models\RiwayatSertifikasiDosenSearch;

/**
 * DosenController implements the CRUD actions for Dosen model.
 */
class DosenController extends Controller
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
     * Lists all Dosen models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DosenSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Dosen model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $queryParams = Yii::$app->request->queryParams;
        $searchModelFungsional = new RiwayatFungsionalDosenSearch();
        $searchModelFungsional->nidn = $model->NIDN;
        $dataProviderFungsional = $searchModelFungsional->search($queryParams);

        $searchModelPangkat = new RiwayatPangkatDosenSearch();
        $searchModelPangkat->nidn = $model->NIDN;
        $dataProviderPangkat = $searchModelPangkat->search($queryParams);

        $searchModelPendidikan = new RiwayatPendidikanDosenSearch();
        $searchModelPendidikan->nidn = $model->NIDN;
        $dataProviderPendidikan = $searchModelPendidikan->search($queryParams);

        $searchModelSertifikasi = new RiwayatSertifikasiDosenSearch();
        $searchModelSertifikasi->nidn = $model->NIDN;
        $dataProviderSertifikasi = $searchModelSertifikasi->search($queryParams);

        $searchModelPenelitian = new RiwayatPenelitianDosenSearch();
        $searchModelPenelitian->nidn = $model->NIDN;
        $dataProviderPenelitian = $searchModelPenelitian->search($queryParams);

        return $this->render('view', [
            'model' => $model,

            'searchModelFungsional' => $searchModelFungsional,
            'dataProviderFungsional' => $dataProviderFungsional,

            'searchModelPangkat' => $searchModelPangkat,
            'dataProviderPangkat' => $dataProviderPangkat,

            'searchModelPendidikan' => $searchModelPendidikan,
            'dataProviderPendidikan' => $dataProviderPendidikan,

            'searchModelSertifikasi' => $searchModelSertifikasi,
            'dataProviderSertifikasi' => $dataProviderSertifikasi,

            'searchModelPenelitian' => $searchModelPenelitian,
            'dataProviderPenelitian' => $dataProviderPenelitian,
        ]);
    }

    /**
     * Creates a new Dosen model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Dosen();
        $user  = new User();

        if($user->load(Yii::$app->request->post()) && $model->load(Yii::$app->request->post()) && $user->save())
        {
            $model->user_id = $user->id;

            $auth = \Yii::$app->authManager;
            $authorRole = $auth->getRole('Dosen');
            $auth->assign($authorRole, $user->id);

            if ($model->save()) {   
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'user'  => $user
        ]);
    }

    public function actionImport()
    {
        $model = new ImportFile;
        $model->tipe = 'upload';
        $kelamin = [
            'L' => 'Laki-laki',
            'P' => 'Perempuan',
        ];

        if ($model->load(Yii::$app->request->post())) {
            $uploadedFile = \yii\web\UploadedFile::getInstance($model,'file');
            $contents = file_get_contents($uploadedFile->tempName);
            $contents = json_decode($contents,1);
            $transaction = \Yii::$app->db->beginTransaction();
            try {
                foreach($contents['ListDosen']['data'] as $list_dosen)
                {
                    $dosen = Dosen::find()->where(['NIDN'=>$list_dosen['nidn']])->one();
                    if(empty($dosen))
                    {
                        $password = str_replace('-','',$list_dosen['tanggal_lahir']);
                        $user = new User;
                        $user->setAttributes([
                            'username' => $list_dosen['nidn'],
                            'password_hash' => $password
                        ]);
                        $user->save(false);

                        $auth = \Yii::$app->authManager;
                        $authorRole = $auth->getRole('Dosen');
                        $auth->assign($authorRole, $user->id);

                        $dosen = new Dosen;
                        $dosen->setAttributes([
                            'NIDN' => $list_dosen['nidn'],
                            'nama' => $list_dosen['nama_dosen'],
                            'jenis_kelamin' => $kelamin[$list_dosen['jenis_kelamin']],
                            'status' => strtoupper($list_dosen['nama_status_aktif']),
                            'user_id' => $user->id,
                        ]);

                        $dosen->save();
                    }

                    $ListDosen = new ListDosen();
                    $ListDosen->setAttributes($list_dosen);
                    $ListDosen->save();
                }
                
                foreach($contents['DetailBiodataDosen']['data'] as $data)
                {
                    $DetailBiodataDosen = new DetailBiodataDosen();
                    $DetailBiodataDosen->setAttributes($data);
                    $DetailBiodataDosen->save();
                }

                foreach($contents['ListPenugasanDosen']['data'] as $data)
                {
                    $ListPenugasanDosen = new ListPenugasanDosen();
                    $ListPenugasanDosen->setAttributes($data);
                    $ListPenugasanDosen->save();
                }
                
                foreach($contents['AktivitasMengajarDosen']['data'] as $data)
                {
                    $AktivitasMengajarDosen = new AktivitasMengajarDosen();
                    $AktivitasMengajarDosen->setAttributes($data);
                    $AktivitasMengajarDosen->save();
                }
                
                foreach($contents['RiwayatFungsionalDosen']['data'] as $data)
                {
                    $RiwayatFungsionalDosen = new RiwayatFungsionalDosen();
                    $RiwayatFungsionalDosen->setAttributes($data);
                    $RiwayatFungsionalDosen->save();
                }
                
                foreach($contents['RiwayatPangkatDosen']['data'] as $data)
                {
                    $RiwayatPangkatDosen = new RiwayatPangkatDosen();
                    $RiwayatPangkatDosen->setAttributes($data);
                    $RiwayatPangkatDosen->save();
                }
                
                foreach($contents['RiwayatPendidikanDosen']['data'] as $data)
                {
                    $RiwayatPendidikanDosen = new RiwayatPendidikanDosen();
                    $RiwayatPendidikanDosen->setAttributes($data);
                    $RiwayatPendidikanDosen->save();
                }
                
                foreach($contents['RiwayatSertifikasiDosen']['data'] as $data)
                {
                    $RiwayatSertifikasiDosen = new RiwayatSertifikasiDosen();
                    $RiwayatSertifikasiDosen->setAttributes($data);
                    $RiwayatSertifikasiDosen->save();
                }
                
                foreach($contents['RiwayatPenelitianDosen']['data'] as $data)
                {
                    $RiwayatPenelitianDosen = new RiwayatPenelitianDosen();
                    $RiwayatPenelitianDosen->setAttributes($data);
                    $RiwayatPenelitianDosen->save();
                }
                
                foreach($contents['ListPenugasanSemuaDosen']['data'] as $data)
                {
                    $ListPenugasanSemuaDosen = new ListPenugasanSemuaDosen();
                    $ListPenugasanSemuaDosen->setAttributes($data);
                    $ListPenugasanSemuaDosen->save();
                }
                
                foreach($contents['DetailPenugasanDosen']['data'] as $data)
                {
                    $DetailPenugasanDosen = new DetailPenugasanDosen();
                    $DetailPenugasanDosen->setAttributes($data);
                    $DetailPenugasanDosen->save();
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
     * Updates an existing Dosen model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $user  = User::findOne($model->user_id);

        if($user->load(Yii::$app->request->post()) && $model->load(Yii::$app->request->post()) && $user->save() && $model->save())
        {
            $roles = Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId());
            $roles = array_keys($roles);
            if(!in_array('Dosen',$roles))
            {
                $auth = \Yii::$app->authManager;
                $auth->revokeAll($user->id);
                $authorRole = $auth->getRole('Dosen');
                $auth->assign($authorRole, $user->id);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'user' => $user,
        ]);
    }

    /**
     * Deletes an existing Dosen model.
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
        Yii::$app->db->createCommand()->truncateTable('list_dosen')->execute();
        Yii::$app->db->createCommand()->truncateTable('detail_biodata_dosen')->execute();
        Yii::$app->db->createCommand()->truncateTable('aktivitas_mengajar_dosen')->execute();
        Yii::$app->db->createCommand()->truncateTable('riwayat_fungsional_dosen')->execute();
        Yii::$app->db->createCommand()->truncateTable('riwayat_pangkat_dosen')->execute();
        Yii::$app->db->createCommand()->truncateTable('riwayat_pendidikan_dosen')->execute();
        Yii::$app->db->createCommand()->truncateTable('riwayat_sertifikasi_dosen')->execute();
        Yii::$app->db->createCommand()->truncateTable('list_penugasan_dosen')->execute();
        Yii::$app->db->createCommand()->truncateTable('list_penugasan_semua_dosen')->execute();
        Yii::$app->db->createCommand()->truncateTable('detail_penugasan_dosen')->execute();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Dosen model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Dosen the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Dosen::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
