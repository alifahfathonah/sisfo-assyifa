<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ListProdi;

/**
 * ListProdiSearch represents the model behind the search form of `common\models\ListProdi`.
 */
class ListProdiSearch extends ListProdi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id_prodi', 'kode_program_studi', 'nama_program_studi', 'status', 'id_jenjang_pendidikan', 'nama_jenjang_pendidikan'], 'safe'],
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
        $query = ListProdi::find();

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

        $query->andFilterWhere(['like', 'id_prodi', $this->id_prodi])
            ->andFilterWhere(['like', 'kode_program_studi', $this->kode_program_studi])
            ->andFilterWhere(['like', 'nama_program_studi', $this->nama_program_studi])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'id_jenjang_pendidikan', $this->id_jenjang_pendidikan])
            ->andFilterWhere(['like', 'nama_jenjang_pendidikan', $this->nama_jenjang_pendidikan]);

        return $dataProvider;
    }
}
