<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use yii\web\Controller;
use common\models\Prodi;
use common\models\Angkatan;
use yii\filters\VerbFilter;
use common\models\Mahasiswa;
use yii\helpers\ArrayHelper;
use common\models\ImportFile;
use common\models\ListMahasiswa;
use common\models\MahasiswaSearch;
use yii\web\NotFoundHttpException;
use common\models\MahasiswaAngkatan;

/**
 * MahasiswaController implements the CRUD actions for Mahasiswa model.
 */
class MahasiswaController extends Controller
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
     * Lists all Mahasiswa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MahasiswaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Mahasiswa model.
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
                foreach($contents['data'] as $data)
                {
                    $check_mahasiswa = Mahasiswa::findOne(['NIM'=>$data['nim']]);
                    if(!$check_mahasiswa)
                    {
                        // check user 
                        $user = User::findOne(['username'=>$data['nim']]);
                        if(!$user)
                        {
                            $password = str_replace('-','',$data['tanggal_lahir']);
                            $user = new User;
                            $user->setAttributes([
                                'username' => $data['nim'],
                                'password_hash' => $password
                            ]);
                            $user->save();
                        }

                        $auth = \Yii::$app->authManager;
                        $authorRole = $auth->getRole('Mahasiswa');
                        $auth->assign($authorRole, $user->id);
                        
                        $mahasiswa = new Mahasiswa();
                        $mahasiswa_attribute = [
                            'NIM' => $data['nim'],
                            'nama' => $data['nama_mahasiswa'],
                            'jenis_kelamin' => $kelamin[$data['jenis_kelamin']],
                            'status' => $data['nama_status_mahasiswa'],
                            'user_id' => $user->id
                        ];

                        $prodi = Prodi::findOne(['nama'=>$data['nama_program_studi']]);
                        if(!$prodi){
                            $new_prodi = new Prodi;
                            $new_prodi->setAttributes([
                                'nama' => $data['nama_program_studi']
                            ]);
                            $new_prodi->save();
                            $mahasiswa_attribute['prodi_id'] = $new_prodi->id;
                        }
                        else
                            $mahasiswa_attribute['prodi_id'] = $prodi->id;

                        $mahasiswa->setAttributes($mahasiswa_attribute);
                        $mahasiswa->save();

                        $periode_masuk = explode(' ',$data['nama_periode_masuk']);
                        $check_angkatan = Angkatan::findOne(['tahun'=>$periode_masuk[0]]);
                        $angkatan_id = 0;
                        if(!$check_angkatan)
                        {
                            $new_angkatan = new Angkatan;
                            $new_angkatan->setAttributes([
                                'tahun' => $periode_masuk[0]
                            ]);
                            $new_angkatan->save();
                            $angkatan_id = $new_angkatan->id;
                        }else
                            $angkatan_id = $check_angkatan->id;
                        $model_angkatan  = new MahasiswaAngkatan();
                        $model_angkatan->angkatan_id = $angkatan_id;
                        $model_angkatan->mahasiswa_id = $mahasiswa->id;
                        $model_angkatan->save();

                        $MahasiswaKrs = new ListMahasiswa();
                        $MahasiswaKrs->setAttributes($data);
                        $MahasiswaKrs->save();
                    }
                    else
                    {
                        $check_mahasiswa->status = $data['nama_status_mahasiswa'];
                        $check_mahasiswa->save();

                        $check_mahasiswa_list = ListMahasiswa::findOne(['nim'=>$data['nim']]);

                        if(!$check_mahasiswa_list)
                            $MahasiswaKrs = new ListMahasiswa();
                        else 
                            $MahasiswaKrs = ListMahasiswa::findOne(['nim'=>$data['nim']]);

                        $MahasiswaKrs->setAttributes($data);
                        $MahasiswaKrs->save();
                    }
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
     * Creates a new Mahasiswa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Mahasiswa();
        $user  = new User();
        $model_angkatan  = new MahasiswaAngkatan();
        $angkatan  = Angkatan::find()->all();
        $angkatan  = ArrayHelper::map($angkatan,'id','tahun');
        $prodi = Prodi::find()->all();
        $prodi = ArrayHelper::map($prodi,'id','nama');

        if($user->load(Yii::$app->request->post()) && $model_angkatan->load(Yii::$app->request->post()) && $model->load(Yii::$app->request->post()) && $user->save())
        {
            $model->user_id = $user->id;

            $auth = \Yii::$app->authManager;
            $authorRole = $auth->getRole('Mahasiswa');
            $auth->assign($authorRole, $user->id);

            $model_angkatan->mahasiswa_id = $model->id;
            
            if ($model->save() && $model_angkatan->save()) {   
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'user' => $user,
            'prodi' => $prodi,
            'angkatan' => $angkatan,
            'model_angkatan' => $model_angkatan,
        ]);
    }

    /**
     * Updates an existing Mahasiswa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $user = User::findOne($model->user_id);
        $model_angkatan  = MahasiswaAngkatan::findOne(['mahasiswa_id'=>$id]);
        if(empty($model_angkatan))
        {
            $model_angkatan = new MahasiswaAngkatan;
            $model_angkatan->mahasiswa_id = $id;
        }
        $angkatan  = Angkatan::find()->all();
        $angkatan  = ArrayHelper::map($angkatan,'id','tahun');
        $prodi = Prodi::find()->all();
        $prodi = ArrayHelper::map($prodi,'id','nama');

        if($user->load(Yii::$app->request->post()) && $model_angkatan->load(Yii::$app->request->post()) && $model->load(Yii::$app->request->post()) && $user->save() && $model->save() && $model_angkatan->save())
        {
            $roles = Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId());
            $roles = array_keys($roles);
            if(!in_array('Mahasiswa',$roles))
            {
                $auth = \Yii::$app->authManager;
                $auth->revokeAll($user->id);
                $authorRole = $auth->getRole('Mahasiswa');
                $auth->assign($authorRole, $user->id);
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'user' => $user,
            'prodi' => $prodi,
            'angkatan' => $angkatan,
            'model_angkatan' => $model_angkatan,
        ]);
    }

    /**
     * Deletes an existing Mahasiswa model.
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
        Yii::$app->db->createCommand()->truncateTable('list_mahasiswa')->execute();
        
        return $this->redirect(['index']);
    }

    /**
     * Finds the Mahasiswa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Mahasiswa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mahasiswa::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
