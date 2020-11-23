<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\RiwayatPendidikanDosen;

/**
 * RiwayatPendidikanDosenSearch represents the model behind the search form of `common\models\RiwayatPendidikanDosen`.
 */
class RiwayatPendidikanDosenSearch extends RiwayatPendidikanDosen
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id_dosen', 'nidn', 'nama_dosen', 'id_bidang_studi', 'nama_bidang_studi', 'id_jenjang_pendidikan', 'nama_jenjang_pendidikan', 'id_gelar_akademik', 'nama_gelar_akademik', 'id_perguruan_tinggi', 'nama_perguruan_tinggi', 'fakultas', 'tahun_lulus', 'sks_lulus', 'ipk'], 'safe'],
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
        $query = RiwayatPendidikanDosen::find();

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
            ->andFilterWhere(['like', 'nidn', $this->nidn])
            ->andFilterWhere(['like', 'nama_dosen', $this->nama_dosen])
            ->andFilterWhere(['like', 'id_bidang_studi', $this->id_bidang_studi])
            ->andFilterWhere(['like', 'nama_bidang_studi', $this->nama_bidang_studi])
            ->andFilterWhere(['like', 'id_jenjang_pendidikan', $this->id_jenjang_pendidikan])
            ->andFilterWhere(['like', 'nama_jenjang_pendidikan', $this->nama_jenjang_pendidikan])
            ->andFilterWhere(['like', 'id_gelar_akademik', $this->id_gelar_akademik])
            ->andFilterWhere(['like', 'nama_gelar_akademik', $this->nama_gelar_akademik])
            ->andFilterWhere(['like', 'id_perguruan_tinggi', $this->id_perguruan_tinggi])
            ->andFilterWhere(['like', 'nama_perguruan_tinggi', $this->nama_perguruan_tinggi])
            ->andFilterWhere(['like', 'fakultas', $this->fakultas])
            ->andFilterWhere(['like', 'tahun_lulus', $this->tahun_lulus])
            ->andFilterWhere(['like', 'sks_lulus', $this->sks_lulus])
            ->andFilterWhere(['like', 'ipk', $this->ipk]);

        return $dataProvider;
    }
}
