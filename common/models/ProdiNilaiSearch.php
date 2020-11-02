<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProdiNilai;

/**
 * ProdiNilaiSearch represents the model behind the search form of `common\models\ProdiNilai`.
 */
class ProdiNilaiSearch extends ProdiNilai
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'prodi_id'], 'integer'],
            [['nilai_huruf', 'tanggal_mulai', 'tanggal_akhir'], 'safe'],
            [['nilai_index', 'bobot_min', 'bobot_max'], 'number'],
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
        $query = ProdiNilai::find();

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
            'prodi_id' => $this->prodi_id,
            'nilai_index' => $this->nilai_index,
            'bobot_min' => $this->bobot_min,
            'bobot_max' => $this->bobot_max,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_akhir' => $this->tanggal_akhir,
        ]);

        $query->andFilterWhere(['like', 'nilai_huruf', $this->nilai_huruf]);

        return $dataProvider;
    }
}
