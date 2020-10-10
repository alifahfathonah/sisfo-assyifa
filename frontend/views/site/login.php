<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login container-fluid">
    <div class="row">
        <div class="col-sm-12 col-md-7">
            <div class="login-content-container">
            <h2>Silahkan Login.</h2>
            <p>
                Jika kamu belum memiliki akun sistem informasi, <br>
                silahkan hubungi <b>operator</b> kampus.</p>
            </div>
        </div>
        <div class="col-sm-12 col-md-5">
            <div class="login-form-container">
                <div class="login-form-content">
                    <div class="brand">
                        <img src="<?=Yii::$app->params['backend_url'] ?>/images/logo.png" alt="">
                        <br>
                        <h3>STIKES AS-SYIFA</h3>
                    </div>
                    <div class="clearfix"></div>
                    
                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                        <?= $form->field($model, 'username')->textInput(['autofocus' => true,'placeholder'=>'Nama Pengguna / NIM / NIDN'])->label(false) ?>

                        <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'Kata Sandi'])->label(false) ?>

                        <?= $form->field($model, 'rememberMe')->checkbox() ?>

                        <div class="form-group">
                            <?= Html::submitButton('<i class="fa fa-sign-in"></i> Login', ['class' => 'btn btn-success btn-block', 'name' => 'login-button']) ?>
                        </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
