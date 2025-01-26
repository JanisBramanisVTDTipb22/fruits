<?php

class Validator {
    //pure method tāpēc static
    public static function string($data, $min=0, $max = INF) {
        $data = trim($data);

        return is_string($data)
        && strlen($data) >= $min
        && strlen($data) <= $max;
    }   
    public static function number($data, $min=0, $max = INF) {
        $data = trim($data);

        return is_numeric($data)
        && strlen($data) >= $min
        && strlen($data) <= $max;
    }  

    public static function username($data) {
        return self::validateString($data, 2, 50);
    }

    public static function email($data) {
        return filter_var($data, FILTER_VALIDATE_EMAIL);
    }

    public static function phone($data) {
        return preg_match('/^\d{8,15}$/', $data);
    }

    public static function gender($data) {
        return in_array($data, ['male', 'Female'], true);
    }

    public static function birth($data) {
        return strtotime($data) !== false;
    }

    public static function age($data) {
        return is_numeric($data) && $data > 0;
    }

    public static function password($data) {
        return strlen($data) >= 20 && 
               preg_match('/[A-Z]/', $data) &&
               preg_match('/[a-z]/', $data) &&
               preg_match('/[0-9]/', $data) &&
               preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $data);
    }

    private static function validateString($data, $min, $max) {
        return is_string($data) && strlen($data) >= $min && strlen($data) <= $max;
    }
}
