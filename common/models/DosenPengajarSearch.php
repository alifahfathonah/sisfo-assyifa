<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DosenPengajar;

/**
 * DosenPengajarSearch represents the model behind the search form of `common\models\DosenPengajar`.
 */
class DosenPengajarSearch extends DosenPengajar
{

    public $mata_kuliah;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['mata_kuliah','id_aktivitas_mengajar', 'id_registrasi_dosen', 'id_dosen', 'nidn', 'nama_dosen', 'id_kelas_kuliah', 'nama_kelas_kuliah', 'id_subtansi', 'sks_subtansi_total', 'rencana_minggu_pertemuan', 'realisasi_minggu_pertemuan', 'id_jenis_evaluasi', 'nama_jenis_evaluasi'], 'safe'],
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
        $query = DosenPengajar::find();

        // add conditions that should always apply here
        $query->joinWith(['kelasKuliah']);

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

        $query->andFilterWhere(['like', 'id_aktivitas_mengajar', $this->id_aktivitas_mengajar])
            ->andFilterWhere(['like', 'id_registrasi_dosen', $this->id_registrasi_dosen])
            ->andFilterWhere(['like', 'id_dosen', $this->id_dosen])
            ->andFilterWhere(['like', 'nidn', $this->nidn])
            ->andFilterWhere(['like', 'dosen_pengajar.nama_dosen', $this->nama_dosen])
            ->andFilterWhere(['like', 'id_kelas_kuliah', $this->id_kelas_kuliah])
            ->andFilterWhere(['like', 'nama_kelas_kuliah', $this->nama_kelas_kuliah])
            ->andFilterWhere(['like', 'kelas_perkuliahan.nama_mata_kuliah', $this->mata_kuliah])
            ->andFilterWhere(['like', 'id_subtansi', $this->id_subtansi])
            ->andFilterWhere(['like', 'sks_subtansi_total', $this->sks_subtansi_total])
            ->andFilterWhere(['like', 'rencana_minggu_pertemuan', $this->rencana_minggu_pertemuan])
            ->andFilterWhere(['like', 'realisasi_minggu_pertemuan', $this->realisasi_minggu_pertemuan])
            ->andFilterWhere(['like', 'id_jenis_evaluasi', $this->id_jenis_evaluasi])
            ->andFilterWhere(['like', 'nama_jenis_evaluasi', $this->nama_jenis_evaluasi]);

        return $dataProvider;
    }
}
