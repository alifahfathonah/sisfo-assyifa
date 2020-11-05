<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Praktek;

/**
 * PraktekSearch represents the model behind the search form of `common\models\Praktek`.
 */
class PraktekSearch extends Praktek
{
    public $tahun_akademik;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tahun_akademik','id', 'tahun_akademik_id', 'tahun'], 'integer'],
            [['instansi', 'bulan', 'tanggal'], 'safe'],
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
        $query = Praktek::find();

        // add conditions that should always apply here
        $query->joinWith(['tahunAkademik']);

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
            'tahun_akademik_id' => $this->tahun_akademik_id,
            'tahun_akademik.tahun' => $this->tahun_akademik,
            'tahun' => $this->tahun,
            'tanggal' => $this->tanggal,
        ]);

        $query->andFilterWhere(['like', 'instansi', $this->instansi])
            ->andFilterWhere(['like', 'bulan', $this->bulan]);

        return $dataProvider;
    }
}
