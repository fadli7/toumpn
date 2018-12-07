<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "chapter".
 *
 * @property int $id_chapter
 * @property string $name
 * @property string $description
 * @property int $id_subject
 * @property int $id_exam
 *
 * @property Subject $subject
 * @property Question[] $questions
 */
class Chapter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chapter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'id_subject', 'id_exam'], 'required'],
            [['description'], 'string'],
            [['id_subject', 'id_exam'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['id_subject'], 'exist', 'skipOnError' => true, 'targetClass' => Subject::className(), 'targetAttribute' => ['id_subject' => 'id_subject']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_chapter' => 'Id Paket Soal',
            'name' => 'Nama',
            'description' => 'Deskripsi',
            'id_subject' => 'Nama Mapel',
            'id_exam' => 'Nama Ujian',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubject()
    {
        return $this->hasOne(Subject::className(), ['id_subject' => 'id_subject']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getQuestions()
    {
        return $this->hasMany(Question::className(), ['id_chapter' => 'id_chapter']);
    }

    public function getExams()
    {
        return $this->hasMany(Exam::className(), ['id_exam' => 'id_exam']);
    }
}
