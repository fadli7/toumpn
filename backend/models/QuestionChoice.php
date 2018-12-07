<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "question_choice".
 *
 * @property int $id_qchoice
 * @property string $choice_1
 * @property string $choice_2
 * @property string $choice_3
 * @property string $choice_4
 * @property string $choice_5
 * @property string $answer
 * @property int $id_question
 *
 * @property Question $question
 */
class QuestionChoice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question_choice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['choice_1', 'choice_2', 'choice_3', 'choice_4', 'choice_5', 'true_answer', 'id_question'], 'required'],
            [['id_question'], 'integer'],
            [['choice_1', 'choice_2', 'choice_3', 'choice_4', 'choice_5', 'true_answer'], 'string', 'max' => 250],
            [['id_question'], 'exist', 'skipOnError' => true, 'targetClass' => Question::className(), 'targetAttribute' => ['id_question' => 'id_question']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_qchoice' => 'Id Pilihan Ganda',
            'choice_1' => 'Pilihan A',
            'choice_2' => 'Pilihan B',
            'choice_3' => 'Pilihan C',
            'choice_4' => 'Pilihan D',
            'choice_5' => 'Pilihan E',
            'true_answer' => 'Jawaban Benar',
            'id_question' => 'Nama Soal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestion()
    {
        return $this->hasOne(Question::className(), ['id_question' => 'id_question']);
    }
}
