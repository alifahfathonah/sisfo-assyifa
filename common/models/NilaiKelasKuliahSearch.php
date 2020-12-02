<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\NilaiKelasKuliah;

/**
 * NilaiKelasKuliahSearch represents the model behind the search form of `common\models\NilaiKelasKuliah`.
 */
class NilaiKelasKuliahSearch extends NilaiKelasKuliah
{
    public $nim, $mahasiswa, $mata_kuliah, $kelas;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nim','mahasiswa','mata_kuliah','kelas','id_registrasi_mahasiswa', 'id_kelas_kuliah', 'nilai_angka', 'nilai_indeks', 'nilai_huruf'], 'safe'],
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
        $query = NilaiKelasKuliah::find();

        // add conditions that should always apply here
        $query->joinWith(['kelasKuliah','mahasiswa']);

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

        $query->andFilterWhere(['like', 'id_registrasi_mahasiswa', $this->id_registrasi_mahasiswa])
            ->andFilterWhere(['like', 'id_kelas_kuliah', $this->id_kelas_kuliah])
            ->andFilterWhere(['like', 'list_mahasiswa.nim', $this->nim])
            ->andFilterWhere(['like', 'list_mahasiswa.nama_mahasiswa', $this->mahasiswa])
            ->andFilterWhere(['like', 'kelas_perkuliahan.nama_kelas_kuliah', $this->kelas])
            ->andFilterWhere(['like', 'kelas_perkuliahan.nama_mata_kuliah', $this->mata_kuliah])
            ->andFilterWhere(['like', 'nilai_angka', $this->nilai_angka])
            ->andFilterWhere(['like', 'nilai_indeks', $this->nilai_indeks])
            ->andFilterWhere(['like', 'nilai_huruf', $this->nilai_huruf]);

        return $dataProvider;
    }
}
