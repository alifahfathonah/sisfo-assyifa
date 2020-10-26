<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class ImportFile extends Model
{
    public $file;
    public $tipe;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['file','tipe'], 'required'],
        ];
    }
}
