<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PembimbingAkademis;

/**
 * PembimbingAkademisSearch represents the model behind the search form of `common\models\PembimbingAkademis`.
 */
class PembimbingAkademisSearch extends PembimbingAkademis
{
    public $mahasiswa;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'dosen_id', 'mahasiswa_id'], 'integer'],
            [['mahasiswa'], 'safe'],
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
        $query = PembimbingAkademis::find();

        // add conditions that should always apply here
        $query->joinWith(['mahasiswa']);

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
            'dosen_id' => $this->dosen_id,
            'mahasiswa_id' => $this->mahasiswa_id,
        ]);

        $query->andFilterWhere(['like','mahasiswa.nama',$this->mahasiswa]);

        return $dataProvider;
    }
}
