<?php
  
  use common\Sessions;
  
  /**
   * Created by PhpStorm.
   * User: KEKEE
   * Date: 3/5/2019
   * Time: 8:20 PM
   */
  class RBV
  {
    
    public $loader;
    public $Session;
    
    public function view ($view_name, $data = null)
    {
      
      /*
       * extract data*/
      if ($data):
        foreach ($data as $key => $value) {
          $this ->{$key} = $value;
        }
      endif;
      
      /*
       * Path of the view directory
       *
       * */
      $path_view = Loader ::get_configs('view_path');
      /*
       * $view_name is a php file located in the views folder
       * .i.e  ../view/{$view_name}.php
       *check if the file exists then require if
       *  */
      if (file_exists($path_view) . $view_name . '.php'):
        require $path_view . '/_include/header.php';
        require $path_view . $view_name . '.php';
        require $path_view . '/_include/footer.php';
      
      else:
        /*Load the not found error page*/
        require Loader ::get_configs('controller_path') . 'NotFound_Controller' . '.php';
        $_404 = new NotFound_Controller();
        $_404 -> index();
      endif;
      
    }
    
    public function feed ()
    {
      
      require Loader ::get_configs('view_path') . '_includes/feedback.php';
      Sessions ::set('passed', null);
      Sessions ::set('failed', null);
    }
    
  }