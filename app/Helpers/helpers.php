<?php

if (! function_exists('number_abbr_id')) {
    function number_abbr_id($number, $precision = 1)
    {
        if ($number >= 1_000_000_000) {
            return number_format($number / 1_000_000_000, $precision, ',', '.') . 'M';
        } elseif ($number >= 1_000_000) {
            return number_format($number / 1_000_000, $precision, ',', '.') . 'jt';
        } elseif ($number >= 1_000) {
            return number_format($number / 1_000, $precision, ',', '.') . 'rb';
        }

        return number_format($number, 0, ',', '.');
    }
}
