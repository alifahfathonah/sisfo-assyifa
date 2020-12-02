<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\JenisPendaftaran;

/**
 * JenisPendaftaranSearch represents the model behind the search form of `common\models\JenisPendaftaran`.
 */
class JenisPendaftaranSearch extends JenisPendaftaran
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id_jenis_daftar', 'nama_jenis_daftar', 'untuk_daftar_sekolah'], 'safe'],
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
        $query = JenisPendaftaran::find();

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

        $query->andFilterWhere(['like', 'id_jenis_daftar', $this->id_jenis_daftar])
            ->andFilterWhere(['like', 'nama_jenis_daftar', $this->nama_jenis_daftar])
            ->andFilterWhere(['like', 'untuk_daftar_sekolah', $this->untuk_daftar_sekolah]);

        return $dataProvider;
    }
}
