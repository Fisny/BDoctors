<?php

namespace App\Rules;

use App\Sponsorship;
use Illuminate\Contracts\Validation\Rule;

class ValidProduct implements Rule
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

     //Verifica la presenza della sponsorizzazione
    public function passes($attribute, $value)
    {
        // $product = Sponsorship::find ($value)
        if(Sponsorship::find($value)){
            return true;
        }
        false;
        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'La sponsorizzazione non è disponibile';
    }
}
