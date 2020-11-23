<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\RiwayatFungsionalDosen;

/**
 * RiwayatFungsionalDosenSearch represents the model behind the search form of `common\models\RiwayatFungsionalDosen`.
 */
class RiwayatFungsionalDosenSearch extends RiwayatFungsionalDosen
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id_dosen', 'nidn', 'nama_dosen', 'id_jabatan_fungsional', 'nama_jabatan_fungsional', 'sk_jabatan_fungsional', 'mulai_sk_jabatan'], 'safe'],
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
        $query = RiwayatFungsionalDosen::find();

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

        $query->andFilterWhere(['like', 'id_dosen', $this->id_dosen])
            ->andFilterWhere(['like', 'nidn', $this->nidn])
            ->andFilterWhere(['like', 'nama_dosen', $this->nama_dosen])
            ->andFilterWhere(['like', 'id_jabatan_fungsional', $this->id_jabatan_fungsional])
            ->andFilterWhere(['like', 'nama_jabatan_fungsional', $this->nama_jabatan_fungsional])
            ->andFilterWhere(['like', 'sk_jabatan_fungsional', $this->sk_jabatan_fungsional])
            ->andFilterWhere(['like', 'mulai_sk_jabatan', $this->mulai_sk_jabatan]);

        return $dataProvider;
    }
}
