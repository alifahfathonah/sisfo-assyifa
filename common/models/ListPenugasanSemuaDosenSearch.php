<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ListPenugasanSemuaDosen;

/**
 * ListPenugasanSemuaDosenSearch represents the model behind the search form of `common\models\ListPenugasanSemuaDosen`.
 */
class ListPenugasanSemuaDosenSearch extends ListPenugasanSemuaDosen
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id_registrasi_dosen', 'id_dosen', 'nama_dosen', 'nidn', 'jenis_kelamin', 'id_tahun_ajaran', 'id_prodi', 'program_studi', 'nomor_surat_tugas', 'tanggal_surat_tugas', 'apakah_homebase'], 'safe'],
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
        $query = ListPenugasanSemuaDosen::find();

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
            ->andFilterWhere(['like', 'id_dosen', $this->id_dosen])
            ->andFilterWhere(['like', 'nama_dosen', $this->nama_dosen])
            ->andFilterWhere(['like', 'nidn', $this->nidn])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'id_tahun_ajaran', $this->id_tahun_ajaran])
            ->andFilterWhere(['like', 'id_prodi', $this->id_prodi])
            ->andFilterWhere(['like', 'program_studi', $this->program_studi])
            ->andFilterWhere(['like', 'nomor_surat_tugas', $this->nomor_surat_tugas])
            ->andFilterWhere(['like', 'tanggal_surat_tugas', $this->tanggal_surat_tugas])
            ->andFilterWhere(['like', 'apakah_homebase', $this->apakah_homebase]);

        return $dataProvider;
    }
}
