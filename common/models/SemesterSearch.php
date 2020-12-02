<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Semester;

/**
 * SemesterSearch represents the model behind the search form of `common\models\Semester`.
 */
class SemesterSearch extends Semester
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id_semester', 'id_tahun_ajaran', 'nama_semester', 'semester', 'a_periode_aktif', 'tanggal_mulai', 'tanggal_selesai'], 'safe'],
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
        $query = Semester::find();

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

        $query->andFilterWhere(['like', 'id_semester', $this->id_semester])
            ->andFilterWhere(['like', 'id_tahun_ajaran', $this->id_tahun_ajaran])
            ->andFilterWhere(['like', 'nama_semester', $this->nama_semester])
            ->andFilterWhere(['like', 'semester', $this->semester])
            ->andFilterWhere(['like', 'a_periode_aktif', $this->a_periode_aktif])
            ->andFilterWhere(['like', 'tanggal_mulai', $this->tanggal_mulai])
            ->andFilterWhere(['like', 'tanggal_selesai', $this->tanggal_selesai]);

        return $dataProvider;
    }
}
