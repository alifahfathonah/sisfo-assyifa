<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PengajuanSkripsi;

/**
 * PengajuanSkripsiSearch represents the model behind the search form of `common\models\PengajuanSkripsi`.
 */
class PengajuanSkripsiSearch extends PengajuanSkripsi
{
    public $nim, $mahasiswa;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nim','id', 'mahasiswa_id'], 'integer'],
            [['mahasiswa','judul', 'konten', 'status', 'file_url'], 'safe'],
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
        $query = PengajuanSkripsi::find();

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
            'nim' => $this->nim,
            'mahasiswa_id' => $this->mahasiswa_id,
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'konten', $this->konten])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'nama', $this->mahasiswa])
            ->andFilterWhere(['like', 'file_url', $this->file_url]);

        return $dataProvider;
    }
}
