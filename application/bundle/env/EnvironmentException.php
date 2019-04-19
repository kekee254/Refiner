<?php
  
  class EnvironmentException extends Exception
  {
    
    
    public function notFoundClass ($class_name)
    {
      return R10 . '  R10' . ' <pre>-></pre> ' . $class_name . '  @' . $_SERVER['SCRIPT_NAME'];
    }
    
    
    
    
  }