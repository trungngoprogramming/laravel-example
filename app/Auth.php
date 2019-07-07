<?php

namespace App;

use Session;

class Auth
{
    public static function setUser($id)
    {
        Session::put('auth', $id);

        return true;
    }

    public static function user()
    {
        if (!static::check()) {
            return null;
        }

        $id = Session::get('auth');

        return User::find($id);
    }

    public static function check()
    {
        return Session::has('auth');
    }

    public static function logout()
    {
        Session::forget('auth');

        return true;
    }
}
