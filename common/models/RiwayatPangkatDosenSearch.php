<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\RiwayatPangkatDosen;

/**
 * RiwayatPangkatDosenSearch represents the model behind the search form of `common\models\RiwayatPangkatDosen`.
 */
class RiwayatPangkatDosenSearch extends RiwayatPangkatDosen
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id_dosen', 'nidn', 'nama_dosen', 'id_pangkat_golongan', 'nama_pangkat_golongan', 'sk_pangkat', 'tanggal_sk_pangkat', 'mulai_sk_pangkat', 'masa_kerja_dalam_tahun', 'masa_kerja_dalam_bulan'], 'safe'],
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
        $query = RiwayatPangkatDosen::find();

        // add conditions that should always apply here

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
        ]);

        $query->andFilterWhere(['like', 'id_dosen', $this->id_dosen])
            ->andFilterWhere(['like', 'nidn', $this->nidn])
            ->andFilterWhere(['like', 'nama_dosen', $this->nama_dosen])
            ->andFilterWhere(['like', 'id_pangkat_golongan', $this->id_pangkat_golongan])
            ->andFilterWhere(['like', 'nama_pangkat_golongan', $this->nama_pangkat_golongan])
            ->andFilterWhere(['like', 'sk_pangkat', $this->sk_pangkat])
            ->andFilterWhere(['like', 'tanggal_sk_pangkat', $this->tanggal_sk_pangkat])
            ->andFilterWhere(['like', 'mulai_sk_pangkat', $this->mulai_sk_pangkat])
            ->andFilterWhere(['like', 'masa_kerja_dalam_tahun', $this->masa_kerja_dalam_tahun])
            ->andFilterWhere(['like', 'masa_kerja_dalam_bulan', $this->masa_kerja_dalam_bulan]);

        return $dataProvider;
    }
}
