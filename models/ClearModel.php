<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ClearModel extends Model
{
    public $W;
    public $alpha;
    public $Wb;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['W', 'alpha', 'Wb'], 'required'],
            [['W', 'alpha', 'Wb'], 'double'],
        ];
    }

}
