<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MahasiswaIpk;

/**
 * MahasiswaIpkSearch represents the model behind the search form of `common\models\MahasiswaIpk`.
 */
class MahasiswaIpkSearch extends MahasiswaIpk
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id_registrasi_mahasiswa', 'id_mahasiswa', 'id_semester', 'nama_semester', 'nim', 'nama_mahasiswa', 'angkatan', 'id_prodi', 'nama_program_studi', 'id_status_mahasiswa', 'nama_status_mahasiswa', 'ips', 'ipk', 'sks_semester', 'sks_total', 'biaya_kuliah_smt'], 'safe'],
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
        $query = MahasiswaIpk::find();

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
            ->andFilterWhere(['like', 'id_mahasiswa', $this->id_mahasiswa])
            ->andFilterWhere(['like', 'id_semester', $this->id_semester])
            ->andFilterWhere(['like', 'nama_semester', $this->nama_semester])
            ->andFilterWhere(['like', 'nim', $this->nim])
            ->andFilterWhere(['like', 'nama_mahasiswa', $this->nama_mahasiswa])
            ->andFilterWhere(['like', 'angkatan', $this->angkatan])
            ->andFilterWhere(['like', 'id_prodi', $this->id_prodi])
            ->andFilterWhere(['like', 'nama_program_studi', $this->nama_program_studi])
            ->andFilterWhere(['like', 'id_status_mahasiswa', $this->id_status_mahasiswa])
            ->andFilterWhere(['like', 'nama_status_mahasiswa', $this->nama_status_mahasiswa])
            ->andFilterWhere(['like', 'ips', $this->ips])
            ->andFilterWhere(['like', 'ipk', $this->ipk])
            ->andFilterWhere(['like', 'sks_semester', $this->sks_semester])
            ->andFilterWhere(['like', 'sks_total', $this->sks_total])
            ->andFilterWhere(['like', 'biaya_kuliah_smt', $this->biaya_kuliah_smt]);

        return $dataProvider;
    }
}
