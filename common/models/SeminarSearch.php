<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Seminar;

/**
 * SeminarSearch represents the model behind the search form of `common\models\Seminar`.
 */
class SeminarSearch extends Seminar
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'mahasiswa_id'], 'integer'],
            [['judul', 'nilai_harapan', 'nilai_didapat'], 'safe'],
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
        $query = Seminar::find();

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
            'mahasiswa_id' => $this->mahasiswa_id,
        ]);

        $query->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'nilai_harapan', $this->nilai_harapan])
            ->andFilterWhere(['like', 'nilai_didapat', $this->nilai_didapat]);

        return $dataProvider;
    }
}
