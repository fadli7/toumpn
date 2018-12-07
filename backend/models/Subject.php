<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "subject".
 *
 * @property int $id_subject
 * @property string $name
 * @property string $shortname
 *
 * @property Chapter[] $chapters
 */
class Subject extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subject';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'shortname'], 'required'],
            [['name'], 'string', 'max' => 100],
            [['shortname'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_subject' => 'Id Mata Pelajaran',
            'name' => 'Nama Mata Pelajaran',
            'shortname' => 'Nama Pendek Mapel',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChapters()
    {
        return $this->hasMany(Chapter::className(), ['id_subject' => 'id_subject']);
    }
}
