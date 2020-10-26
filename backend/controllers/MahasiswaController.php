<?php

namespace backend\controllers;

use Yii;
use common\models\Mahasiswa;
use common\models\Angkatan;
use common\models\MahasiswaAngkatan;
use common\models\MahasiswaSearch;
use common\models\Prodi;
use common\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

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
