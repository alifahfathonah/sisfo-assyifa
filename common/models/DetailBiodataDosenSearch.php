<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DetailBiodataDosen;

/**
 * DetailBiodataDosenSearch represents the model behind the search form of `common\models\DetailBiodataDosen`.
 */
class DetailBiodataDosenSearch extends DetailBiodataDosen
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id_dosen', 'nama_dosen', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'id_agama', 'nama_agama', 'id_status_aktif', 'nama_status_aktif', 'nidn', 'nama_ibu', 'nik', 'nip', 'npwp', 'id_jenis_sdm', 'no_sk_cpns', 'tanggal_sk_cpns', 'no_sk_pengangkatan', 'mulai_sk_pengangkatan', 'id_lembaga_pengangkatan', 'nama_lembaga_pengangkatan', 'id_pangkat_golongan', 'nama_pangkat_golongan', 'id_sumber_gaji', 'jalan', 'dusun', 'rt', 'rw', 'ds_kel', 'kode_pos', 'id_wilayah', 'nama_wilayah', 'telepon', 'handphone', 'email', 'status_pernikahan', 'nama_suami_istri', 'nip_suami_istri', 'tanggal_mulai_pns', 'id_pekerjaan_suami_istri', 'nama_pekerjaan_suami_istri'], 'safe'],
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
        $query = DetailBiodataDosen::find();

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
            ->andFilterWhere(['like', 'nama_dosen', $this->nama_dosen])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'tanggal_lahir', $this->tanggal_lahir])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'id_agama', $this->id_agama])
            ->andFilterWhere(['like', 'nama_agama', $this->nama_agama])
            ->andFilterWhere(['like', 'id_status_aktif', $this->id_status_aktif])
            ->andFilterWhere(['like', 'nama_status_aktif', $this->nama_status_aktif])
            ->andFilterWhere(['like', 'nidn', $this->nidn])
            ->andFilterWhere(['like', 'nama_ibu', $this->nama_ibu])
            ->andFilterWhere(['like', 'nik', $this->nik])
            ->andFilterWhere(['like', 'nip', $this->nip])
            ->andFilterWhere(['like', 'npwp', $this->npwp])
            ->andFilterWhere(['like', 'id_jenis_sdm', $this->id_jenis_sdm])
            ->andFilterWhere(['like', 'no_sk_cpns', $this->no_sk_cpns])
            ->andFilterWhere(['like', 'tanggal_sk_cpns', $this->tanggal_sk_cpns])
            ->andFilterWhere(['like', 'no_sk_pengangkatan', $this->no_sk_pengangkatan])
            ->andFilterWhere(['like', 'mulai_sk_pengangkatan', $this->mulai_sk_pengangkatan])
            ->andFilterWhere(['like', 'id_lembaga_pengangkatan', $this->id_lembaga_pengangkatan])
            ->andFilterWhere(['like', 'nama_lembaga_pengangkatan', $this->nama_lembaga_pengangkatan])
            ->andFilterWhere(['like', 'id_pangkat_golongan', $this->id_pangkat_golongan])
            ->andFilterWhere(['like', 'nama_pangkat_golongan', $this->nama_pangkat_golongan])
            ->andFilterWhere(['like', 'id_sumber_gaji', $this->id_sumber_gaji])
            ->andFilterWhere(['like', 'jalan', $this->jalan])
            ->andFilterWhere(['like', 'dusun', $this->dusun])
            ->andFilterWhere(['like', 'rt', $this->rt])
            ->andFilterWhere(['like', 'rw', $this->rw])
            ->andFilterWhere(['like', 'ds_kel', $this->ds_kel])
            ->andFilterWhere(['like', 'kode_pos', $this->kode_pos])
            ->andFilterWhere(['like', 'id_wilayah', $this->id_wilayah])
            ->andFilterWhere(['like', 'nama_wilayah', $this->nama_wilayah])
            ->andFilterWhere(['like', 'telepon', $this->telepon])
            ->andFilterWhere(['like', 'handphone', $this->handphone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'status_pernikahan', $this->status_pernikahan])
            ->andFilterWhere(['like', 'nama_suami_istri', $this->nama_suami_istri])
            ->andFilterWhere(['like', 'nip_suami_istri', $this->nip_suami_istri])
            ->andFilterWhere(['like', 'tanggal_mulai_pns', $this->tanggal_mulai_pns])
            ->andFilterWhere(['like', 'id_pekerjaan_suami_istri', $this->id_pekerjaan_suami_istri])
            ->andFilterWhere(['like', 'nama_pekerjaan_suami_istri', $this->nama_pekerjaan_suami_istri]);

        return $dataProvider;
    }
}
