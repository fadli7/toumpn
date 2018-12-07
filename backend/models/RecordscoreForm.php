<?php
namespace backend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class RecordscoreForm extends Model
{
    public $id_recordscore;
    public $id_exam;
    public $id_student;
    public $benar;
    public $salah;
    public $score;
    public $date;
    public $rekomendasi;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_recordscore','id_exam','id_student','benar','salah','score','date', 'rekomendasi'], 'required']
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */

}
