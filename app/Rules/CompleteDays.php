<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CompleteDays implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $value = explode(',', $value);
        
        return sizeof($value) === 7;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute should have seven (7) values separated with commas (,).';
    }
}
