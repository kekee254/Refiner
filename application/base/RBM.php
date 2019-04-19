<?php
  /**
   * Created by PhpStorm.
   * User: KEKEE
   * Date: 3/7/2019
   * Time: 7:33 PM
   */
  
  class RBM
  {
    
    public $configs;
    public $Session;
    public $db;
    public $url;
    
    function __construct ()
    {
      /*
   * Make App configs available inside models
   * */
      $this -> configs = Loader ::load() -> find('AppConfigurationFile');
      /*
       * Makes Sessions properties available
       * */
      $this -> Session = Loader ::load() -> find('\common\Sessions');
      
      /*
          * Set DEFAULT APPLICATION  URL
          * RESULT : http://yourdomain/
          * View documentation for more information*/
      $this -> url = Loader ::get_configs('R_URL');;
      
      
    }
  }