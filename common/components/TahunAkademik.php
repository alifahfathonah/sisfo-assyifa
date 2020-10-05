<?php
namespace common\components;

use common\models\TahunAkademik as TA;
use yii\base\Component;

class TahunAkademik extends Component{
	
    public function init(){
        parent::init();
    }
	
    public function get()
    {
        return TA::find()->where(['status'=>'AKTIF'])->one();
    }
}