<?php
/**
 * Created by PhpStorm.
 * User: KEKEE
 * Date: 4/3/2019
 * Time: 11:44 AM
 */

class Redirect
{
    public static function to($path)
    {
        header("location:" . Loader::get_configs('R_URL') . $path);
    }
    public static function external($path)
    {
        header('location:'.$path);
    }
}