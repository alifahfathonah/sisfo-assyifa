<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Materi;

/**
 * MateriSearch represents the model behind the search form of `common\models\Materi`.
 */
class MateriSearch extends Materi
{
    public $dosen, $mata_kuliah, $kelas, $dosen_id;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'dosen_id','dosen_pengampuh_id', 'no_urut'], 'integer'],
            [['dosen','tipe','mata_kuliah','kelas','judul', 'konten', 'status', 'created_at', 'updated_at'], 'safe'],
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
        $query = Materi::find();

        // add conditions that should always apply here
        $query->joinWith(['dosen']);

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
            'dosen.id' => $this->dosen_id,
            'dosen_pengampuh_id' => $this->dosen_pengampuh_id,
            'no_urut' => $this->no_urut,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'konten', $this->konten])
            ->andFilterWhere(['like', 'tipe', $this->tipe])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
