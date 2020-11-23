<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\AktivitasMengajarDosen;

/**
 * AktivitasMengajarDosenSearch represents the model behind the search form of `common\models\AktivitasMengajarDosen`.
 */
class AktivitasMengajarDosenSearch extends AktivitasMengajarDosen
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id_registrasi_dosen', 'id_dosen', 'nama_dosen', 'id_periode', 'nama_periode', 'id_prodi', 'nama_program_studi', 'id_matkul', 'nama_mata_kuliah', 'id_kelas', 'nama_kelas_kuliah', 'rencana_minggu_pertemuan', 'realisasi_minggu_pertemuan'], 'safe'],
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
        $query = AktivitasMengajarDosen::find();

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
            ->andFilterWhere(['like', 'id_periode', $this->id_periode])
            ->andFilterWhere(['like', 'nama_periode', $this->nama_periode])
            ->andFilterWhere(['like', 'id_prodi', $this->id_prodi])
            ->andFilterWhere(['like', 'nama_program_studi', $this->nama_program_studi])
            ->andFilterWhere(['like', 'id_matkul', $this->id_matkul])
            ->andFilterWhere(['like', 'nama_mata_kuliah', $this->nama_mata_kuliah])
            ->andFilterWhere(['like', 'id_kelas', $this->id_kelas])
            ->andFilterWhere(['like', 'nama_kelas_kuliah', $this->nama_kelas_kuliah])
            ->andFilterWhere(['like', 'rencana_minggu_pertemuan', $this->rencana_minggu_pertemuan])
            ->andFilterWhere(['like', 'realisasi_minggu_pertemuan', $this->realisasi_minggu_pertemuan]);

        return $dataProvider;
    }
}
