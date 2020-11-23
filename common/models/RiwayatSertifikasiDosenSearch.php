<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\RiwayatSertifikasiDosen;

/**
 * RiwayatSertifikasiDosenSearch represents the model behind the search form of `common\models\RiwayatSertifikasiDosen`.
 */
class RiwayatSertifikasiDosenSearch extends RiwayatSertifikasiDosen
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id_dosen', 'nidn', 'nama_dosen', 'nomor_peserta', 'id_bidang_studi', 'nama_bidang_studi', 'id_jenis_sertifikasi', 'nama_jenis_sertifikasi', 'tahun_sertifikasi', 'sk_sertifikasi'], 'safe'],
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
        $query = RiwayatSertifikasiDosen::find();

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
            ->andFilterWhere(['like', 'nomor_peserta', $this->nomor_peserta])
            ->andFilterWhere(['like', 'id_bidang_studi', $this->id_bidang_studi])
            ->andFilterWhere(['like', 'nama_bidang_studi', $this->nama_bidang_studi])
            ->andFilterWhere(['like', 'id_jenis_sertifikasi', $this->id_jenis_sertifikasi])
            ->andFilterWhere(['like', 'nama_jenis_sertifikasi', $this->nama_jenis_sertifikasi])
            ->andFilterWhere(['like', 'tahun_sertifikasi', $this->tahun_sertifikasi])
            ->andFilterWhere(['like', 'sk_sertifikasi', $this->sk_sertifikasi]);

        return $dataProvider;
    }
}
