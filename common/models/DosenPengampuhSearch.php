<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DosenPengampuh;

/**
 * DosenPengampuhSearch represents the model behind the search form of `common\models\DosenPengampuh`.
 */
class DosenPengampuhSearch extends DosenPengampuh
{
    public $dosen, $mata_kuliah;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'dosen_id', 'mata_kuliah_prodi_id', 'kelas_id'], 'integer'],
            [['dosen','mata_kuliah','created_at'], 'safe'],
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
        $query = DosenPengampuh::find();

        // add conditions that should always apply here
        $query->joinWith(['dosen','mataKuliah']);

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
            'dosen_id' => $this->dosen_id,
            'mata_kuliah_prodi_id' => $this->mata_kuliah_prodi_id,
            'kelas_id' => $this->kelas_id,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like','dosen.nama',$this->dosen]);
        $query->andFilterWhere(['like','mata_kuliah.nama',$this->mata_kuliah]);

        return $dataProvider;
    }
}
