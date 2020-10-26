<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Mahasiswa;

/**
 * MahasiswaSearch represents the model behind the search form of `common\models\Mahasiswa`.
 */
class MahasiswaSearch extends Mahasiswa
{
    public $angkatan,$not_in_mahasiswa_id;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['angkatan','prodi_id','not_in_mahasiswa_id','NIM', 'nama', 'jenis_kelamin', 'status', 'created_at'], 'safe'],
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
        $query = Mahasiswa::find();

        // add conditions that should always apply here
        $query->joinWith(['angkatan']);

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
            'user_id' => $this->user_id,
            'prodi_id' => $this->prodi_id,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'NIM', $this->NIM])
            ->andFilterWhere(['like', 'angkatan.tahun', $this->angkatan])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'status', $this->status]);

        $query->andFilterWhere(['not in','mahasiswa.id',$this->not_in_mahasiswa_id]);

        return $dataProvider;
    }
}
