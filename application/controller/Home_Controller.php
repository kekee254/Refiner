<?php
/**
 * Created by PhpStorm.
 * User: KEKEE
 * Date: 3/5/2019
 * Time: 8:16 PM
 */
  
  class Home_Controller extends RBC
  {
    function __construct ()
    {
      parent ::__construct();
    }
    
    public function index ()
    {
      
      $this -> RView -> view('home');
    }
    
    public function welcome ($id = null)
    {
      echo "welcome {$id}";
      
      
    }
}