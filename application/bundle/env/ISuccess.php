<?php
  
  use common\Sessions;
  
  /**
   * Created by PhpStorm.
   * User: KEKEE
   * Date: 4/1/2019
   * Time: 2:56 PM
   */
  
  class ISuccess
  {
    public static function wr ($msg)
    {
      Sessions ::add('passed', $msg);
    }
  }