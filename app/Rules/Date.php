<?php

namespace App\Rules;

use Carbon\Carbon;
use DateTime;
use Illuminate\Contracts\Validation\Rule;

class Date implements Rule
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
        $now = Carbon::now();
        $last = Carbon::createFromDate(1960-01-01);
        return $value < $now && $value > $last;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Invalide date, hors de la tranche d'âge! ";
    }
}
