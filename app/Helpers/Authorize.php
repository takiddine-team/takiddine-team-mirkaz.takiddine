<?php

namespace App\Helpers;


class Authorize{

    public static function can($key = false){
        return self::has_permission($key);
    }


    public static function permissions(){
        return json_decode(optional(auth()->user())->permissions ,TRUE ) ?? [];
    }

    public static function has_permission($key){
       return in_array($key,self::permissions());
    }



}
