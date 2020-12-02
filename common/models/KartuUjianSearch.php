<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\KartuUjian;

/**
 * KartuUjianSearch represents the model behind the search form of `common\models\KartuUjian`.
 */
class KartuUjianSearch extends KartuUjian
{

    public $mahasiswa, $nim;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id_semester', 'id_mahasiswa', 'mahasiswa', 'nim', 'status'], 'safe'],
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
        $query = KartuUjian::find();

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
        ]);

        $query->andFilterWhere(['like', 'id_semester', $this->id_semester])
            ->andFilterWhere(['like', 'id_mahasiswa', $this->id_mahasiswa])
            ->andFilterWhere(['like', 'nim', $this->nim])
            ->andFilterWhere(['like', 'nama', $this->mahasiswa])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
