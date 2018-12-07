<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "recordscore".
 *
 * @property int $id_recordscore
 * @property int $id_exam
 * @property int $id_student
 * @property int $benar
 * @property int $salah
 * @property int $score
 * @property string $date
 *
 * @property Exam $exam
 * @property User $student
 */
class Recordscore extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'recordscore';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_exam', 'id_student', 'benar', 'salah', 'score', 'date', 'rekomendasi'], 'required'],
            [['id_exam', 'id_student', 'benar', 'salah', 'score'], 'integer'],
            [['rekomendasi'], 'string', 'max' => 255], 
            [['date'], 'safe'],
            [['id_exam'], 'exist', 'skipOnError' => true, 'targetClass' => Exam::className(), 'targetAttribute' => ['id_exam' => 'id_exam']],
            [['id_student'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_student' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_recordscore' => 'Id Nilai Tryout',
            'id_exam' => 'Id Ujian',
            'id_student' => 'Id Siswa',
            'benar' => 'Benar',
            'salah' => 'Salah',
            'score' => 'Skor',
            'date' => 'Tanggal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExam()
    {
        return $this->hasOne(Exam::className(), ['id_exam' => 'id_exam']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(User::className(), ['id' => 'id_student']);
    }
}
