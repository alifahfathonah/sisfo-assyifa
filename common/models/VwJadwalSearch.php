<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\VwJadwal;

/**
 * JadwalSearch represents the model behind the search form of `common\models\Jadwal`.
 */
class VwJadwalSearch extends VwJadwal
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kelas_id', 'mata_kuliah_prodi_id','mata_kuliah_id','tahun_akademik_id'], 'integer'],
            [['dosen_id','nama_dosen','nama_mata_kuliah','hari', 'waktu_mulai', 'waktu_selesai'], 'safe'],
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
        $query = VwJadwal::find();

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

        if(is_array($this->dosen_id))
        {
            $query->andFilterWhere([
                'tahun_akademik_id' => $this->tahun_akademik_id,
                'kelas_id' => $this->kelas_id,
                'waktu_mulai' => $this->waktu_mulai,
                'waktu_selesai' => $this->waktu_selesai,
            ]);
    
            $query->andFilterWhere(['in', 'dosen_id', $this->dosen_id]);
            $query->andFilterWhere(['like', 'hari', $this->hari]);
            $query->andFilterWhere(['like', 'nama_dosen', $this->nama_dosen]);
    
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'tahun_akademik_id' => $this->tahun_akademik_id,
            'kelas_id' => $this->kelas_id,
            'dosen_id' => $this->dosen_id,
            'waktu_mulai' => $this->waktu_mulai,
            'waktu_selesai' => $this->waktu_selesai,
        ]);

        $query->andFilterWhere(['like', 'hari', $this->hari]);
        $query->andFilterWhere(['like', 'nama_dosen', $this->nama_dosen]);

        return $dataProvider;
    }
}
