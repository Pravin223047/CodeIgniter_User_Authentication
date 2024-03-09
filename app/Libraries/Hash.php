<?php
namespace App\Libraries;

class hash
{
    public static function make($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
    public static function check($enteredpassword, $db_password)
    {
        if (password_verify($enteredpassword, $db_password)) {
            return true;
        } else {
            return false;
        }

    }
}