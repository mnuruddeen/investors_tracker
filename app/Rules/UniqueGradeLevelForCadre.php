<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Cadre;
use App\Models\Rank;

class UniqueGradeLevelForCadre implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $cadreId;

    public function __construct($cadreId)
    {
        $this->cadreId = $cadreId;
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
        // Check if the grade_level is unique for the given cadre_id
        return Rank::where('cadre_id', $this->cadreId)
                        ->where('grade_level', $value)
                        ->doesntExist();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute for this cadre is already taken.';
    }
}
