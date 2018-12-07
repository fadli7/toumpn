<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "scorepsi".
 *
 * @property int $id_scorePsi
 * @property int $id_exam
 * @property int $id_student
 * @property int $benar
 * @property int $totalSoal
 * @property int $skala
 * @property string $description
 * @property string $date
 *
 * @property Exam $exam
 * @property User $student
 */
class Scorepsi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'scorepsi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_exam', 'id_student', 'benar', 'totalSoal', 'skala', 'description', 'date'], 'required'],
            [['id_exam', 'id_student', 'benar', 'totalSoal', 'skala'], 'integer'],
            [['date'], 'safe'],
            [['description'], 'string', 'max' => 255],
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
            'id_scorePsi' => 'Id Skor Psikotes',
            'id_exam' => 'Id Ujian',
            'id_student' => 'Id Siswa',
            'benar' => 'Benar',
            'totalSoal' => 'Total Jawab',
            'skala' => 'Skala',
            'description' => 'Deskripsi Skala',
            'date' => 'Waktu',
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
