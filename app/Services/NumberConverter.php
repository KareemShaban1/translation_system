<?php

// app/Services/NumberConverter.php

namespace App\Services;

use App\Http\Traits\ConvertNumbersTrait;

class NumberConverter
{
    use ConvertNumbersTrait;

    public function toArabicWords($number)
    {
        return $this->numberToArabicWords($number);
    }
}