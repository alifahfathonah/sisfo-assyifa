<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PraktekDosen;

/**
 * PraktekDosenSearch represents the model behind the search form of `common\models\PraktekDosen`.
 */
class PraktekDosenSearch extends PraktekDosen
{

    public $NIDN, $dosen, $tahun_akademik;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id','tahun_akademik','NIDN', 'praktek_id', 'dosen_id'], 'integer'],
            [['dosen'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = PraktekDosen::find();

        // add conditions that should always apply here
        $query->joinWith(['dosen','praktek']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'NIDN' => $this->NIDN,
            'praktek.tahun_akademik_id' => $this->tahun_akademik,
            'praktek_id' => $this->praktek_id,
            'dosen_id' => $this->dosen_id,
        ]);
        
        $query->andFilterWhere(['like','nama',$this->dosen]);

        return $dataProvider;
    }
}
