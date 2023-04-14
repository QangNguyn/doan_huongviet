<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DifferentFrom implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */protected $otherField;

    public function __construct($otherField)
    {
        $this->otherField = $otherField;
    }

    public function passes($attribute, $value)
    {
        return $value !== request($this->otherField);
    }

    public function message()
    {
        return ':attribute không được trùng với danh mục hiện tại';
    }
}
