<?php
/**
 * Created by PhpStorm.
 * User: KEKEE
 * Date: 3/5/2019
 * Time: 11:33 PM
 */
  
  class Test_Controller extends RBC
{
function __construct()
{
    parent::__construct();
}
public function  index()
{
  echo 'Test index';
}
    
    public function math ($id)
    {
      
      $c = DB ::hook();
      
      $db = $c -> getPdoInstance() -> prepare('SELECT * default_colors   ');
      $db -> execute(array());
  

  

}
}