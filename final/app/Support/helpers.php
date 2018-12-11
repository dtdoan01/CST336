<?php

if (! function_exists('clamp')) {
    function clamp($current, $min, $max) {
        return max($min, min($max, $current));
    }
}

if (! function_exists('currency')) {
    function currency($amount, $zero = 'Free', $prefix = '$') {
        return $amount > 0 ? $prefix . number_format((float) $amount, 2, '.', '')
            : $zero;
    }
}

if (! function_exists('checked')) {
    function checked($expected, $value, $type = 'checked') {
        $values = collect($value);
        $values = $values->map(function ($v) {
            return $v instanceof \Illuminate\Database\Eloquent\Model ? $v->id : $v;
        });

        return $values->contains($expected) ? ' '.$type : '';
    }
}

if (! function_exists('selected')) {
    function selected($expected, $value) {
        return checked($expected, $value, 'selected');
    }
}

if (! function_exists('valid')) {
    function valid($key) {
        if (! session('errors'))
            return null;

        return ! session('errors')->getBag('default')->has($key) ? 'is-valid' : 'is-invalid';
    }
}

if (! function_exists('object')) {
    function object($value) {
        if (is_null($value) || is_object($value))
            return $value;

        return (object) array_wrap($value);
    }
}
