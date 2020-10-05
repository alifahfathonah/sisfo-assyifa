<?php

namespace backend\controllers;

use Yii;
use common\models\Installation;
use common\models\InstallationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * InstallationController implements the CRUD actions for Installation model.
 */
class InstallationController extends Controller
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
     * Lists all Installation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InstallationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Installation model.
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
     * Creates a new Installation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Installation();

        if ($model->load(Yii::$app->request->post())){
            $logo = UploadedFile::getInstance($model, 'logo');
            if($model->validate()){
                $model->save();
                if (!empty($logo)) {
                    $filename = strtotime(date('Y-m-d H:i:s')).'.'.$logo->extension;
                    $logo->saveAs(Yii::getAlias('@backend/web/uploads/') . $filename);
                    $model->logo = $filename;
                    $model->save(FALSE);
                }
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Installation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $old_logo = $model->logo;
        if ($model->load(Yii::$app->request->post())) {
            $logo = UploadedFile::getInstance($model, 'logo');
            if(isset($logo->extension))
            {
                if($model->validate()){
                    $model->save();
                    if (!empty($logo)) {
                        $filename = strtotime(date('Y-m-d H:i:s')).'.'.$logo->extension;
                        $logo->saveAs(Yii::getAlias('@backend/web/uploads/') . $filename);
                        $model->logo = $filename;
                        $model->save(FALSE);
                    }
                }
            }
            else
                $model->logo = $old_logo;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Installation model.
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
     * Finds the Installation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Installation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Installation::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
