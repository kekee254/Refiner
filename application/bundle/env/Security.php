<?php
  /**
   * Created by PhpStorm.
   * User: KEKEE
   * Date: 3/7/2019
   * Time: 6:10 PM
   */
  
  namespace common;
  
  use Login_Model;
  use Redirect;

  class Security
  {
    /*
     *XXS Filtering
     *  Filter string */
    
    public static function Filter (&$value)
    {
      // if argument is a string, filters that string
      if (is_string($value)) {
        $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        
        // if argument is an array or an object,
        // recursively filters its content
      } else if (is_array($value) || is_object($value)) {
        
        /**
         * Make sure the element is passed by reference,
         * In PHP 7, foreach does not use the internal array pointer.
         * In order to be able to directly modify array elements within the loop
         * precede $value with &. In that case the value will be assigned by reference.
         * @see http://php.net/manual/en/control-structures.foreach.php
         */
        foreach ($value as &$valueInValue) {
          self ::Filter($valueInValue);
        }
      }
      
      // other types are untouched
      return $value;
    }
    
    public static function checkSessionConcurrency ()
    {
      if (Sessions ::get('login_status')) {
        if (Sessions ::concurrentSession()) {
          Login_Model ::logout();
          /*start app*/
          Redirect ::to('home');
          exit;
        }
      }
    }
    
    public static function checkAuth ()
    {
      if (Sessions ::get('login_status')) {
        return true;
      } else {
        Sessions ::add('failed', 'You\'ve been logged out! login to resume activity');
        Redirect ::to('login/');
      }
    }
  }