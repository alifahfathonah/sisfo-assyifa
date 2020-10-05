<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\KuisJawaban;

/**
 * KuisJawabanSearch represents the model behind the search form of `common\models\KuisJawaban`.
 */
class KuisJawabanSearch extends KuisJawaban
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'kuis_id', 'materi_id', 'jawaban_id'], 'integer'],
            [['jawaban_konten', 'status'], 'safe'],
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
        $query = KuisJawaban::find();

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
            'kuis_id' => $this->kuis_id,
            'materi_id' => $this->materi_id,
            'jawaban_id' => $this->jawaban_id,
        ]);

        $query->andFilterWhere(['like', 'jawaban_konten', $this->jawaban_konten])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
