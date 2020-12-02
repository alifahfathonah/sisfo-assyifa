<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\KelasPerkuliahan;

/**
 * KelasPerkuliahanSearch represents the model behind the search form of `common\models\KelasPerkuliahan`.
 */
class KelasPerkuliahanSearch extends KelasPerkuliahan
{
    public $nidn;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nidn','id_kelas_kuliah', 'id_prodi', 'nama_program_studi', 'id_semester', 'nama_semester', 'id_matkul', 'kode_mata_kuliah', 'nama_mata_kuliah', 'nama_kelas_kuliah', 'sks', 'id_dosen', 'nama_dosen', 'jumlah_mahasiswa', 'apa_untuk_pditt'], 'safe'],
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
        $query = KelasPerkuliahan::find();

        // add conditions that should always apply here
        $query->joinWith(['dosenPengajar']);

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
            ->andFilterWhere(['like', 'id_prodi', $this->id_prodi])
            ->andFilterWhere(['like', 'nama_program_studi', $this->nama_program_studi])
            ->andFilterWhere(['like', 'nidn', $this->nidn])
            ->andFilterWhere(['like', 'nama_semester', $this->nama_semester])
            ->andFilterWhere(['like', 'id_matkul', $this->id_matkul])
            ->andFilterWhere(['like', 'kode_mata_kuliah', $this->kode_mata_kuliah])
            ->andFilterWhere(['like', 'nama_mata_kuliah', $this->nama_mata_kuliah])
            ->andFilterWhere(['like', 'nama_kelas_kuliah', $this->nama_kelas_kuliah])
            ->andFilterWhere(['like', 'sks', $this->sks])
            ->andFilterWhere(['like', 'id_dosen', $this->id_dosen])
            ->andFilterWhere(['like', 'kelas_perkuliahan.nama_dosen', $this->nama_dosen])
            ->andFilterWhere(['like', 'jumlah_mahasiswa', $this->jumlah_mahasiswa])
            ->andFilterWhere(['like', 'apa_untuk_pditt', $this->apa_untuk_pditt]);

        return $dataProvider;
    }
}
