<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Recordscore;

/**
 * RecordscoreSearch represents the model behind the search form of `backend\models\Recordscore`.
 */
class RecordscoreSearch extends Recordscore
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_recordscore', 'id_exam', 'id_student', 'benar', 'salah', 'score'], 'integer'],
            [['rekomendasi'], 'string'],
            [['date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
    public function searchs($params)
    {
        $gStudent = User::find()->where(['id'=>Yii::$app->user->identity->id])->one();

        $query = Recordscore::find();

        // add conditions that should always apply here
        $query->where(['id_student'=>$gStudent['id']]);

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
            'id_recordscore' => $this->id_recordscore,
            'id_exam' => $this->id_exam,
            'id_student' => $this->id_student,
            'benar' => $this->benar,
            'salah' => $this->salah,
            'score' => $this->score,
            'date' => $this->date,
            'rekomendasi' => $this->rekomendasi,
        ]);

        return $dataProvider;
    }
    public function search($params)
    {
       $query = Recordscore::find();

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
            'id_recordscore' => $this->id_recordscore,
            'id_exam' => $this->id_exam,
            'id_student' => $this->id_student,
            'benar' => $this->benar,
            'salah' => $this->salah,
            'score' => $this->score,
            'date' => $this->date,
            'rekomendasi' => $this->rekomendasi,
        ]);

        return $dataProvider;
    }   
}


