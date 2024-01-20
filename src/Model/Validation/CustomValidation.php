<?php
namespace App\Model\Validation;
use Cake\Validation\Validation;

class CustomValidation extends Validation{
    public function isPhoneNumber($value)
    {
        if (empty($value)) {
            return false;
        }
        return preg_match('/^[1-9]{6}$/', $value);
    }
}
?>