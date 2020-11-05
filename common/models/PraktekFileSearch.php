<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PraktekFile;

/**
 * PraktekFileSearch represents the model behind the search form of `common\models\PraktekFile`.
 */
class PraktekFileSearch extends PraktekFile
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'praktek_id', 'mahasiswa_id', 'dosen_id'], 'integer'],
            [['file_url', 'file_koreksi_url', 'keterangan'], 'safe'],
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
        $query = PraktekFile::find();

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
            'praktek_id' => $this->praktek_id,
            'mahasiswa_id' => $this->mahasiswa_id,
            'dosen_id' => $this->dosen_id,
        ]);

        $query->andFilterWhere(['like', 'file_url', $this->file_url])
            ->andFilterWhere(['like', 'file_koreksi_url', $this->file_koreksi_url])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
