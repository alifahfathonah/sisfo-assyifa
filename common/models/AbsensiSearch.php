<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Absensi;

/**
 * AbsensiSearch represents the model behind the search form of `common\models\Absensi`.
 */
class AbsensiSearch extends Absensi
{
    public $jadwal,$in_jadwal;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'jadwal_id', 'pertemuan'], 'integer'],
            [['in_jadwal','jadwal','tanggal', 'created_at'], 'safe'],
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
        $query = Absensi::find();

        // add conditions that should always apply here
        $query->joinWith(['jadwal']);

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
            'jadwal_id' => $this->jadwal_id,
            'pertemuan' => $this->pertemuan,
            'tanggal' => $this->tanggal,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like','jadwal.hari',$this->jadwal]);
        $query->andFilterWhere(['in','jadwal_id',$this->in_jadwal]);

        return $dataProvider;
    }
}
