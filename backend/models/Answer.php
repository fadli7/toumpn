<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "answer".
 *
 * @property int $id_answer
 * @property string $answer
 * @property int $id_exam
 *
 * @property Exam $exam
 */
class Answer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'answer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['answer', 'id_exam'], 'required'],
            [['id_exam'], 'integer'],
            [['answer'], 'string', 'max' => 250],
            [['id_exam'], 'exist', 'skipOnError' => true, 'targetClass' => Exam::className(), 'targetAttribute' => ['id_exam' => 'id_exam']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_answer' => 'Id Answer',
            'answer' => 'Answer',
            'id_exam' => 'Id Exam',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExam()
    {
        return $this->hasOne(Exam::className(), ['id_exam' => 'id_exam']);
    }
}
