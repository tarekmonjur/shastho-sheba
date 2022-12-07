<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class LessThen implements Rule
{
    protected $param1;


    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($param1)
    {
        $this->param1 = $param1;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return ($this->param1 > $value)?true:false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be less then '.$this->param1;
    }
}
