<?php
  /**
   * Created by PhpStorm.
   * User: KEKEE
   * Date: 3/7/2019
   * Time: 5:09 PM
   */
  
  namespace common;
  
  use DB_Model;
  use PDO;

  class Sessions
  {
    public static function set ($key, $value)
    {
      $_SESSION[$key] = $value;
    }
    
    public static function concurrentSession ()
    {
      $session_id = session_id();
      $userId = self ::get('user_id');
      
      if (isset($userId) && isset($session_id)) {
        
        $db = DB_Model ::isPdo();
        $query = $db -> query('select session_id from rms_users where user_id=:user_id', array(':user_id' => $userId)) -> setFetchMode(PDO::FETCH_ASSOC);
        $result = $query -> get();
        $userSessionId = !empty($result) ? $result[0]['session_id'] : null;
        return $session_id !== $userSessionId;
      }
      
      return false;
    }
    
    public static function get ($key)
    {
      if (isset($_SESSION[$key])) {
        $value = $_SESSION[$key];
        
        // filter the value for XSS vulnerabilities
        return Security ::Filter($value);
      }
    }
    
    public static function add ($key, $value)
    {
      
      $_SESSION[$key][] = $value;
      
    }
    
    public function deleteSessionVar ($session_var)
    {
    
    }
    
    
  }