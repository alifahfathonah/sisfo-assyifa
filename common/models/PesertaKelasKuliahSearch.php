<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PesertaKelasKuliah;

/**
 * PesertaKelasKuliahSearch represents the model behind the search form of `common\models\PesertaKelasKuliah`.
 */
class PesertaKelasKuliahSearch extends PesertaKelasKuliah
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id_kelas_kuliah', 'id_registrasi_mahasiswa', 'id_mahasiswa', 'nim', 'nama_mahasiswa', 'id_matkul', 'kode_mata_kuliah', 'nama_mata_kuliah', 'id_prodi', 'nama_program_studi', 'angkatan'], 'safe'],
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
        $query = PesertaKelasKuliah::find();

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

        $query->andFilterWhere(['like', 'id_kelas_kuliah', $this->id_kelas_kuliah])
            ->andFilterWhere(['like', 'id_registrasi_mahasiswa', $this->id_registrasi_mahasiswa])
            ->andFilterWhere(['like', 'id_mahasiswa', $this->id_mahasiswa])
            ->andFilterWhere(['like', 'nim', $this->nim])
            ->andFilterWhere(['like', 'nama_mahasiswa', $this->nama_mahasiswa])
            ->andFilterWhere(['like', 'id_matkul', $this->id_matkul])
            ->andFilterWhere(['like', 'kode_mata_kuliah', $this->kode_mata_kuliah])
            ->andFilterWhere(['like', 'nama_mata_kuliah', $this->nama_mata_kuliah])
            ->andFilterWhere(['like', 'id_prodi', $this->id_prodi])
            ->andFilterWhere(['like', 'nama_program_studi', $this->nama_program_studi])
            ->andFilterWhere(['like', 'angkatan', $this->angkatan]);

        return $dataProvider;
    }
}
