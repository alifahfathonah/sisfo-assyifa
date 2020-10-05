<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Kelas;

/**
 * KelasSearch represents the model behind the search form of `common\models\Kelas`.
 */
class KelasSearch extends Kelas
{
    public $tahun_akademik,$program_studi;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tahun_akademik', 'tahun_akademik_id', 'prodi_id', 'semester'], 'integer'],
            [['kode', 'nama', 'program_studi', 'created_at'], 'safe'],
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
        $query = Kelas::find();

        // add conditions that should always apply here
        $query->joinWith(['tahunAkademik','prodi']);

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
            'tahun_akademik_id' => $this->tahun_akademik_id,
            'prodi_id' => $this->prodi_id,
            'semester' => $this->semester,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'kode', $this->kode])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'prodi.nama', $this->program_studi])
            ->andFilterWhere(['like', 'tahun_akademik.tahun', $this->tahun_akademik]);

        return $dataProvider;
    }
}
