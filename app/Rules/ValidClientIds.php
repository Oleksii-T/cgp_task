<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Client;

class ValidClientIds implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        foreach (array_unique(explode(', ', $value)) as $c) {
            if ( !Client::find($c) ) {
                return false;
            }
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Clients ids are not valid';
    }
}
