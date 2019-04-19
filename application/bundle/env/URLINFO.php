<?php
  /**
   * Created by PhpStorm.
   * User: KEKEE
   * Date: 4/2/2019
   * Time: 1:42 AM
   */
  
  class URLINFO
  {
    public static function GET_ITEM_ID ()
    {
      $url = Method ::get('url');
      $url = explode('/', $url);
      // var_dump($url); [0] => controller, [1] => action , [2] => action parameter
      if (isset($url [2])) {
        return $url [2];
      } else {
        return 0;
      }
      
    }
    
    public static function getController ()
    {
      $url = Method ::get('url');
      $url = explode('/', $url);
      // var_dump($url); [0] => controller, [1] => action , [2] => action parameter
      if (isset($url [0])) {
        return $url [0];
      } else {
        return 0;
      }
    }
    
    public static function getAction ()
    {
      $url = Method ::get('url');
      $url = explode('/', $url);
      // var_dump($url); [0] => controller, [1] => action , [2] => action parameter
      if (isset($url [1])) {
        return $url [1];
      } else {
        return 0;
      }
    }
    
    public static function getURLactionParameterDefault ()
    {
      $url = Request ::get('url');
      $url = explode('/', $url);
      // var_dump($url); [0] => controller, [1] => action , [2] => action parameter
      
      if (isset($url [2])) {
        return $param = $url [2];
      }
      return false;
    }
  }