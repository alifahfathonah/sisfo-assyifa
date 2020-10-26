<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SkripsiMahasiswa;

/**
 * SkripsiMahasiswaSearch represents the model behind the search form of `common\models\SkripsiMahasiswa`.
 */
class SkripsiMahasiswaSearch extends SkripsiMahasiswa
{
    public $nim, $mahasiswa, $dosen_pembimbing;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'skripsi_id', 'mahasiswa_id'], 'integer'],
            [['nim', 'mahasiswa','dosen_pembimbing'], 'safe'],
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
        $query = SkripsiMahasiswa::find();

        // add conditions that should always apply here
        $query->joinWith(['mahasiswa']);

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
            'skripsi_id' => $this->skripsi_id,
            'mahasiswa_id' => $this->mahasiswa_id,
        ]);

        $query->andFilterWhere(['LIKE','mahasiswa.nim',$this->nim]);
        $query->andFilterWhere(['LIKE','mahasiswa.nama',$this->mahasiswa]);
        $query->andFilterWhere(['LIKE','dosen.nama',$this->dosen_pembimbing]);

        return $dataProvider;
    }
}
