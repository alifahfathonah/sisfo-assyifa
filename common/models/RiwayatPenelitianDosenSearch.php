<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\RiwayatPenelitianDosen;

/**
 * RiwayatPenelitianDosenSearch represents the model behind the search form of `common\models\RiwayatPenelitianDosen`.
 */
class RiwayatPenelitianDosenSearch extends RiwayatPenelitianDosen
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id_dosen', 'nidn', 'nama_dosen', 'id_penelitian', 'judul_penelitian', 'id_kelompok_bidang', 'kode_kelompok_bidang', 'nama_kelompok_bidang', 'id_lembaga_iptek', 'nama_lembaga_iptek', 'tahun_kegiatan'], 'safe'],
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
        $query = RiwayatPenelitianDosen::find();

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
            ->andFilterWhere(['like', 'id_penelitian', $this->id_penelitian])
            ->andFilterWhere(['like', 'judul_penelitian', $this->judul_penelitian])
            ->andFilterWhere(['like', 'id_kelompok_bidang', $this->id_kelompok_bidang])
            ->andFilterWhere(['like', 'kode_kelompok_bidang', $this->kode_kelompok_bidang])
            ->andFilterWhere(['like', 'nama_kelompok_bidang', $this->nama_kelompok_bidang])
            ->andFilterWhere(['like', 'id_lembaga_iptek', $this->id_lembaga_iptek])
            ->andFilterWhere(['like', 'nama_lembaga_iptek', $this->nama_lembaga_iptek])
            ->andFilterWhere(['like', 'tahun_kegiatan', $this->tahun_kegiatan]);

        return $dataProvider;
    }
}
