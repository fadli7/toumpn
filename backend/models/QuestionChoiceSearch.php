<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\QuestionChoice;

/**
 * QuestionChoiceSearch represents the model behind the search form of `backend\models\QuestionChoice`.
 */
class QuestionChoiceSearch extends QuestionChoice
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_qchoice', 'id_question'], 'integer'],
            [['choice_1', 'choice_2', 'choice_3', 'choice_4', 'choice_5', 'true_answer'], 'safe'],
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
    public function search($params)
    {
        $query = QuestionChoice::find();

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
            'id_qchoice' => $this->id_qchoice,
            'id_question' => $this->id_question,
        ]);

        $query->andFilterWhere(['like', 'choice_1', $this->choice_1])
            ->andFilterWhere(['like', 'choice_2', $this->choice_2])
            ->andFilterWhere(['like', 'choice_3', $this->choice_3])
            ->andFilterWhere(['like', 'choice_4', $this->choice_4])
            ->andFilterWhere(['like', 'choice_5', $this->choice_5])
            ->andFilterWhere(['like', 'true_answer', $this->true_answer]);

        return $dataProvider;
    }
}
