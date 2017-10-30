<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class NodeModel extends Model
{
    public $A;
    public $b1;
    public $b2;
    public $mu;
    public $F;
    public $error;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['A', 'b1', 'b2', 'mu','F', 'error'], 'required'],
            [['A', 'b1', 'b2', 'mu', 'F', 'error'], 'double'],
        ];
    }

}
