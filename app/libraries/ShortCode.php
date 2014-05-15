<?php

class ShortCode {
    protected static $short_code_func = array();


    static function add($shortcode,$user_func)  {
        self::$short_code_func[$shortcode] = $user_func;
    }

    static function has($shortcode) {
        return array_key_exists($shortcode,self::$short_code_func);
    }

    static function funcExists($shortcode) {
        if (self::has($shortcode)) {
            return function_exists(self::$short_code_func[$shortcode]);
        }

        return false;
    }

    static function getFunc($shortcode) {
        if (self::has($shortcode)) {
            return self::$short_code_func[$shortcode];
        }
    }
}