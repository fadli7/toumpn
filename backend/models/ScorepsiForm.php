<?php
namespace backend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class RecordscoreForm extends Model
{
    public $id_scorePsi;
    public $id_exam;
    public $id_student;
    public $benar;
    public $totalSoal;
    public $skala;
    public $description;
    public $date;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_scorePsi','id_exam','id_student','benar','totalSoal','skala','description', 'date'], 'required']
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */

}
