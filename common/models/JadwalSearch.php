<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Jadwal;

/**
 * JadwalSearch represents the model behind the search form of `common\models\Jadwal`.
 */
class JadwalSearch extends Jadwal
{
    public $dosen, $dosen_id, $mata_kuliah, $kelas, $kelas_id;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'dosen_id','kelas_id', 'dosen_pengampuh_id'], 'integer'],
            [['dosen','mata_kuliah','kelas','hari', 'waktu_mulai', 'waktu_selesai', 'created_at'], 'safe'],
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
        $query = Jadwal::find();

        // add conditions that should always apply here
        $query->joinWith(['dosen']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        if(is_array($this->dosen_pengampuh_id))
        {
            $query->andFilterWhere([
                'id' => $this->id,
                'dosen.id' => $this->dosen_id,
                'waktu_mulai' => $this->waktu_mulai,
                'waktu_selesai' => $this->waktu_selesai,
                'created_at' => $this->created_at,
            ]);
    
            $query->andFilterWhere(['in', 'dosen_pengampuh_id', $this->dosen_pengampuh_id]);
            $query->andFilterWhere(['like', 'hari', $this->hari]);
            $query->andFilterWhere(['like', 'dosen.nama', $this->dosen]);
    
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'dosen.id' => $this->dosen_id,
            'dosen_pengampuh_id' => $this->dosen_pengampuh_id,
            'waktu_mulai' => $this->waktu_mulai,
            'waktu_selesai' => $this->waktu_selesai,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'hari', $this->hari]);
        $query->andFilterWhere(['like', 'dosen.nama', $this->dosen]);

        return $dataProvider;
    }
}
