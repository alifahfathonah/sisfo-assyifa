<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DetailPenugasanDosen;

/**
 * DetailPenugasanDosenSearch represents the model behind the search form of `common\models\DetailPenugasanDosen`.
 */
class DetailPenugasanDosenSearch extends DetailPenugasanDosen
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id_registrasi_dosen', 'id_tahun_ajaran', 'nama_tahun_ajaran', 'id_perguruan_tinggi', 'nama_perguruan_tinggi', 'nidn', 'id_dosen', 'nama_dosen', 'id_prodi', 'nama_program_studi', 'nomor_surat_tugas', 'tanggal_surat_tugas', 'mulai_surat_tugas'], 'safe'],
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
        $query = DetailPenugasanDosen::find();

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

        $query->andFilterWhere(['like', 'id_registrasi_dosen', $this->id_registrasi_dosen])
            ->andFilterWhere(['like', 'id_tahun_ajaran', $this->id_tahun_ajaran])
            ->andFilterWhere(['like', 'nama_tahun_ajaran', $this->nama_tahun_ajaran])
            ->andFilterWhere(['like', 'id_perguruan_tinggi', $this->id_perguruan_tinggi])
            ->andFilterWhere(['like', 'nama_perguruan_tinggi', $this->nama_perguruan_tinggi])
            ->andFilterWhere(['like', 'nidn', $this->nidn])
            ->andFilterWhere(['like', 'id_dosen', $this->id_dosen])
            ->andFilterWhere(['like', 'nama_dosen', $this->nama_dosen])
            ->andFilterWhere(['like', 'id_prodi', $this->id_prodi])
            ->andFilterWhere(['like', 'nama_program_studi', $this->nama_program_studi])
            ->andFilterWhere(['like', 'nomor_surat_tugas', $this->nomor_surat_tugas])
            ->andFilterWhere(['like', 'tanggal_surat_tugas', $this->tanggal_surat_tugas])
            ->andFilterWhere(['like', 'mulai_surat_tugas', $this->mulai_surat_tugas]);

        return $dataProvider;
    }
}
