<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "exam".
 *
 * @property int $id_exam
 * @property string $name
 * @property string $datetime
 * @property string $status
 *
 * @property Answer[] $answers
 * @property Recordscore[] $recordscores
 */
class Exam extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'exam';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'status'], 'required'],
            [['datetime'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['status'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_exam' => 'Id Ujian',
            'name' => 'Nama Ujian',
            'datetime' => 'Waktu',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnswers()
    {
        return $this->hasMany(Answer::className(), ['id_exam' => 'id_exam']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecordscores()
    {
        return $this->hasMany(Recordscore::className(), ['id_exam' => 'id_exam']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getScorepsis()
    {
        return $this->hasMany(Scorepsi::className(), ['id_exam' => 'id_exam']);
    }
}
