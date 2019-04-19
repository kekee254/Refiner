<?php
  
  class Application
  {
    public $loader;
    public $config;
    private $controller_name;
    private $action_name;
    private $parameters;
    private $default_controller;
    
    /**
     * Application constructor.
     */
    function __construct ()
    {
      new Defined();
      ini_set('session.cookie_httponly', 1);
      $this -> loader = new  Loader();
      $this -> config = $this -> loader -> find('Config');
      
      /*
       * set URL parts
       * Controller, action  and parameter*/
      $this -> userURL();
      
      /*
       * Rename according to refiner naming convention of controllers
       *eg.  Name_Controller
       * */
      $this -> conform();
      /*
       *check if the controller file exists
       * */
      if (file_exists($this -> config -> try_config('controller_path') . $this -> controller_name . '.php')):
        /*
         * load this controller*/
        require $this -> config -> try_config('controller_path') . $this -> controller_name . '.php';
        /*
         * Start  Session*/
        if (session_status() == PHP_SESSION_NONE):
          $this -> startSession();
        endif;
        /*
         * Use this controller*/
        $this -> controller_name = new $this -> controller_name;
        /*
         * call the requested method and pass the arguments if present
         * if requested method do not exist instead of throwing an error call the default method
         * */
        $this -> controller_name ->{method_exists($this -> controller_name, $this -> action_name) ? $this -> action_name : $this -> setDefaultMethod()}(isset($this -> parameters) ? $this -> parameters : null);
      else:
        /*Load the not found error page*/
        require $this -> config -> try_config('controller_path') . 'NotFound_Controller' . '.php';
        $_404 = new NotFound_Controller();
        $_404 -> index();
      endif;
    }
    
    /*
     * set the default  controller
     * you can change the default controller in the env file
     * location: ../idea/env/AppConfigurationFile.php*/
    public function userURL ()
    {
      if (!is_null(Method ::get('url'))):
        $URL = trim(Method ::get('url'), '/');
        $URL = filter_var($URL, FILTER_SANITIZE_URL);
        $URL = explode('/', $URL);
      endif;
      /*
       * Set the controller name , action and parameters
       * index [0] for controller , [1]= action  , [3] = parameters
       * */
      $this -> controller_name = isset($URL[0]) ? $URL[0] : $this -> setDefaultController();
      $this -> action_name = isset($URL[1]) ? $URL[1] : $this -> setDefaultMethod();
      $this -> parameters = isset($URL[2]) ? $URL[2] : null;
      /*
       * unload  url items
       * */
      if (isset($URL)):
        unset($URL[0], $URL[1]);
      endif;
    }
    
    /*
     * set the default method of controllers
     * you can change the default action name in the env file
     * location: ../idea/env/AppConfigurationFile.php
     *
     * @return mixed
     */
    private function setDefaultController ()
    {
      
      $this -> default_controller = $this -> config -> try_config('default_controller');
      return $this -> default_controller;
    }
    
    /**
     * @return mixed
     */
    private function setDefaultMethod ()
    {
      $this -> action_name = $this -> config -> try_config('default_action');
      return $this -> action_name;
    }
    
    /*
     * All controllers should conform to this naming pattern
     * ControllerName_Controller.php
     * but your not restricted you can use your naming convention
     * and change things here
     * */
    
    private function conform ()
    {
      if (isset($this -> controller_name)):
        $this -> controller_name = ucfirst($this -> controller_name) . '_' . 'Controller';
      endif;
    }
    
    /*
     * Start the application session*/
    private function startSession ()
    {
      // if no session exist, start the session
      if (session_id() == '') {
        session_start();
      }
    }
    
  }