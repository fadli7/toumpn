<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Scorepsi;

/**
 * ScorepsiSearch represents the model behind the search form of `backend\models\Scorepsi`.
 */
class ScorepsiSearch extends Scorepsi
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_scorePsi', 'id_exam', 'id_student', 'benar', 'totalSoal', 'skala'], 'integer'],
            [['description', 'date'], 'safe'],
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

        $query = Scorepsi::find();

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
            'id_scorePsi' => $this->id_scorePsi,
            'id_exam' => $this->id_exam,
            'id_student' => $this->id_student,
            'benar' => $this->benar,
            'totalSoal' => $this->totalSoal,
            'skala' => $this->skala,
            'date' => $this->date,
            'description', $this->description,
        ]);

        return $dataProvider;
    }

    public function search($params)
    {
        $query = Scorepsi::find();

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
            'id_scorePsi' => $this->id_scorePsi,
            'id_exam' => $this->id_exam,
            'id_student' => $this->id_student,
            'benar' => $this->benar,
            'totalSoal' => $this->totalSoal,
            'skala' => $this->skala,
            'date' => $this->date,
            'description', $this->description,
        ]);

        return $dataProvider;
    }
}
