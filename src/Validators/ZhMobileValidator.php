<?php

namespace Zbxin\Sms\Validators;

use Zbxin\Contracts\Validator;

class ZhMobileValidator extends Validator
{
    public function validator($attribute, $value, $parameters, $validator)
    {
        return preg_match('/^(\+?0?86\-?)?((13\d|14[57]|15[^4,\D]|17[5678]|18\d|16\d|19\d)\d{8}|170[059]\d{7})$/', $value);
    }
}
