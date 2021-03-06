<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MahasiswaKrs;

/**
 * MahasiswaKrsSearch represents the model behind the search form of `common\models\MahasiswaKrs`.
 */
class MahasiswaKrsSearch extends MahasiswaKrs
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id_registrasi_mahasiswa', 'id_periode', 'id_prodi', 'nama_program_studi', 'id_matkul', 'kode_mata_kuliah', 'nama_mata_kuliah', 'id_kelas', 'nama_kelas_kuliah', 'sks_mata_kuliah', 'nim', 'nama_mahasiswa', 'angkatan'], 'safe'],
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
        $query = MahasiswaKrs::find();

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

        $query->andFilterWhere(['like', 'id_registrasi_mahasiswa', $this->id_registrasi_mahasiswa])
            ->andFilterWhere(['like', 'id_periode', $this->id_periode])
            ->andFilterWhere(['like', 'id_prodi', $this->id_prodi])
            ->andFilterWhere(['like', 'nama_program_studi', $this->nama_program_studi])
            ->andFilterWhere(['like', 'id_matkul', $this->id_matkul])
            ->andFilterWhere(['like', 'kode_mata_kuliah', $this->kode_mata_kuliah])
            ->andFilterWhere(['like', 'nama_mata_kuliah', $this->nama_mata_kuliah])
            ->andFilterWhere(['like', 'id_kelas', $this->id_kelas])
            ->andFilterWhere(['like', 'nama_kelas_kuliah', $this->nama_kelas_kuliah])
            ->andFilterWhere(['like', 'sks_mata_kuliah', $this->sks_mata_kuliah])
            ->andFilterWhere(['like', 'nim', $this->nim])
            ->andFilterWhere(['like', 'nama_mahasiswa', $this->nama_mahasiswa])
            ->andFilterWhere(['like', 'angkatan', $this->angkatan]);

        return $dataProvider;
    }
}
