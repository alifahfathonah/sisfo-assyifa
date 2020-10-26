<?php
namespace frontend\controllers;

use common\models\Application;
use common\models\User;
use common\models\Penyimpanan;
use common\models\PenyimpananSearch;
use common\models\ImportFile;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                    'hapus-penyimpanan' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $roles = Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId());
        $roles = array_keys($roles);
        $applications = Application::find()->where([
            'in','role',$roles
        ])->all();

        return $this->render('index',[
            'applications' => $applications
        ]);
    }

    public function actionChangePassword()
    {
        $model = User::findOne(Yii::$app->user->identity->id);
        if($model->load(Yii::$app->request->post()) && $model->save())
        {
            Yii::$app->session->addFlash("success", "Update Password Berhasil");
            return $this->redirect(['index']);
        }

        return $this->render('change-password',[
            'model' => $model
        ]);
    }

    public function actionChangeEmail()
    {
        $model = User::findOne(Yii::$app->user->identity->id);
        if($model->load(Yii::$app->request->post()) && $model->save())
        {
            Yii::$app->session->addFlash("success", "Update Email Berhasil");
            return $this->redirect(['index']);
        }

        return $this->render('change-email',[
            'model' => $model
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $this->layout = "main-login";
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionLogoutFromApp()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionPenyimpanan()
    {
        $model = new ImportFile;
        $searchModel = new PenyimpananSearch();
        $queryParams = Yii::$app->request->queryParams;
        $queryParams['PenyimpananSearch']['user_id'] = Yii::$app->user->identity->id;
        $dataProvider = $searchModel->search($queryParams);

        if ($model->load(Yii::$app->request->post())){
            $uploadedFiles = \yii\web\UploadedFile::getInstances($model,'file');
            foreach($uploadedFiles as $file)
            {
                $filename = strtotime(date('Y-m-d H:i:s')).'.'. $file->extension;
                $file->saveAs('uploads/' . $filename);
                $penyimpanan = new Penyimpanan;
                $penyimpanan->user_id = Yii::$app->user->identity->id;
                $penyimpanan->nama = $file->baseName;
                $penyimpanan->berkas = $filename;
                $penyimpanan->save();
            }
            Yii::$app->session->setFlash('success', "Berkas Berhasil di Upload!");
            return $this->redirect(['site/penyimpanan']);
        }

        return $this->render('penyimpanan',[
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
        ]);
    }

    public function actionHapusPenyimpanan($id)
    {
        $penyimpanan = Penyimpanan::findOne(['id'=>$id,'user_id'=>Yii::$app->user->identity->id]);
        if(empty($penyimpanan))
            Yii::$app->session->setFlash('error', "Anda tidak berhak menghapus berkas ini!");
        else
        {
            $penyimpanan->delete();
            Yii::$app->session->setFlash('success', "Berkas Berhasil di hapus");
        }
        return $this->redirect(['site/penyimpanan']);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
}
