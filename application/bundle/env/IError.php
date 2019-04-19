<?php
  
  use common\Sessions;
  
  /**
   * Created by PhpStorm.
   * User: KEKEE
   * Date: 4/1/2019
   * Time: 2:53 PM
   */
  
  class IError
  {
    public static function wr ($err)
    {
      Sessions ::add('failed', $err);
    }
    
  }