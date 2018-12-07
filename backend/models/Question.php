<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "question".
 *
 * @property int $id_question
 * @property string $question
 * @property string $status
 * @property int $id_chapter
 *
 * @property Chapter $chapter
 * @property QuestionChoice[] $questionChoices
 */
class Question extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question', 'status', 'id_chapter'], 'required'],
            [['question'], 'string'],
            [['id_chapter'], 'integer'],
            [['status'], 'string', 'max' => 1],
            [['id_chapter'], 'exist', 'skipOnError' => true, 'targetClass' => Chapter::className(), 'targetAttribute' => ['id_chapter' => 'id_chapter']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_question' => 'Id Soal',
            'question' => 'Soal',
            'status' => 'Status',
            'id_chapter' => 'Nama Paket Soal',
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamQuestions()
    {
        return $this->hasMany(ExamQuestion::className(), ['id_question' => 'id_question']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChapter()
    {
        return $this->hasOne(Chapter::className(), ['id_chapter' => 'id_chapter']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestionChoices()
    {
        return $this->hasMany(QuestionChoice::className(), ['id_question' => 'id_question']);
    }
}
