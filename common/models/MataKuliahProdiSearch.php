<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MataKuliahProdi;

/**
 * MataKuliahProdiSearch represents the model behind the search form of `common\models\MataKuliahProdi`.
 */
class MataKuliahProdiSearch extends MataKuliahProdi
{
    public $tahun_akademik,$mata_kuliah,$prodi;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'mata_kuliah_id', 'prodi_id', 'semester', 'bobot_sks', 'tahun_akademik_id'], 'integer'],
            [['status','tahun_akademik','mata_kuliah','prodi', 'created_at'], 'safe'],
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
        $query = MataKuliahProdi::find();

        // add conditions that should always apply here
        $query->joinWith(['tahunAkademik','mataKuliah','prodi']);

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
            'mata_kuliah_id' => $this->mata_kuliah_id,
            'prodi_id' => $this->prodi_id,
            'semester' => $this->semester,
            'bobot_sks' => $this->bobot_sks,
            'tahun_akademik_id' => $this->tahun_akademik_id,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status]);
        $query->andFilterWhere(['like', 'tahun_akademik.tahun', $this->tahun_akademik]);
        $query->andFilterWhere(['like', 'mata_kuliah.nama', $this->mata_kuliah]);
        $query->andFilterWhere(['like', 'prodi.nama', $this->prodi]);

        return $dataProvider;
    }
}
