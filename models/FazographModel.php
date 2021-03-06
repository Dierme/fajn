<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class FazographModel extends Model{
    public $par;
    public $W;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['par', 'W'], 'required'],
            [['W', 'par'], 'double'],
        ];
    }

}
