<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MahasiswaBaru;

/**
 * MahasiswaBaruSearch represents the model behind the search form of `common\models\MahasiswaBaru`.
 */
class MahasiswaBaruSearch extends MahasiswaBaru
{

    public $prodi;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id_prodi','prodi', 'nik', 'nisn', 'no_ujian', 'nama_mahasiswa', 'jenis_kelamin', 'tinggi_badan', 'berat_badan', 'tempat_lahir', 'tanggal_lahir', 'nama_ibu_kandung', 'id_wilayah', 'jalan', 'rt', 'rw', 'dusun', 'kelurahan', 'kode_pos', 'handphone', 'telepon', 'kewarganegaraan', 'id_agama', 'penerima_kps', 'no_kps', 'id_mahasiswa', 'nim', 'id_jenis_daftar', 'id_jalur_daftar', 'id_periode_masuk', 'tanggal_daftar', 'id_perguruan_tinggi', 'file_skl', 'file_skbb', 'file_izin_bekerja', 'file_pas_foto', 'file_ktp', 'file_kk'], 'safe'],
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
        $query = MahasiswaBaru::find();

        // add conditions that should always apply here
        $query->joinWith(['prodi']);

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

        $query->andFilterWhere(['like', 'mahasiswa_baru.id_prodi', $this->id_prodi])
            ->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'nisn', $this->nisn])
            ->andFilterWhere(['like', 'list_prodi.nama_program_studi', $this->prodi])
            ->andFilterWhere(['like', 'no_ujian', $this->no_ujian])
            ->andFilterWhere(['like', 'nama_mahasiswa', $this->nama_mahasiswa])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'tinggi_badan', $this->tinggi_badan])
            ->andFilterWhere(['like', 'berat_badan', $this->berat_badan])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'tanggal_lahir', $this->tanggal_lahir])
            ->andFilterWhere(['like', 'nama_ibu_kandung', $this->nama_ibu_kandung])
            ->andFilterWhere(['like', 'id_wilayah', $this->id_wilayah])
            ->andFilterWhere(['like', 'jalan', $this->jalan])
            ->andFilterWhere(['like', 'rt', $this->rt])
            ->andFilterWhere(['like', 'rw', $this->rw])
            ->andFilterWhere(['like', 'dusun', $this->dusun])
            ->andFilterWhere(['like', 'kelurahan', $this->kelurahan])
            ->andFilterWhere(['like', 'kode_pos', $this->kode_pos])
            ->andFilterWhere(['like', 'handphone', $this->handphone])
            ->andFilterWhere(['like', 'telepon', $this->telepon])
            ->andFilterWhere(['like', 'kewarganegaraan', $this->kewarganegaraan])
            ->andFilterWhere(['like', 'id_agama', $this->id_agama])
            ->andFilterWhere(['like', 'penerima_kps', $this->penerima_kps])
            ->andFilterWhere(['like', 'no_kps', $this->no_kps])
            ->andFilterWhere(['like', 'id_mahasiswa', $this->id_mahasiswa])
            ->andFilterWhere(['like', 'nim', $this->nim])
            ->andFilterWhere(['like', 'id_jenis_daftar', $this->id_jenis_daftar])
            ->andFilterWhere(['like', 'id_jalur_daftar', $this->id_jalur_daftar])
            ->andFilterWhere(['like', 'id_periode_masuk', $this->id_periode_masuk])
            ->andFilterWhere(['like', 'tanggal_daftar', $this->tanggal_daftar])
            ->andFilterWhere(['like', 'id_perguruan_tinggi', $this->id_perguruan_tinggi])
            ->andFilterWhere(['like', 'file_skl', $this->file_skl])
            ->andFilterWhere(['like', 'file_skbb', $this->file_skbb])
            ->andFilterWhere(['like', 'file_izin_bekerja', $this->file_izin_bekerja])
            ->andFilterWhere(['like', 'file_pas_foto', $this->file_pas_foto])
            ->andFilterWhere(['like', 'file_ktp', $this->file_ktp])
            ->andFilterWhere(['like', 'file_kk', $this->file_kk]);

        return $dataProvider;
    }
}
