<?php
  
  use EnvironmentException as E;
  
  class Loader extends E
{
    private static $loader;
    
    /**
     * @return \Loader
     */
    public static function load ()
    {
        if (!self::$loader) {
            self::$loader = new Loader();
        }
        return self::$loader;
    }
    
    /**
     * @param $key
     * @return mixed
     */
    public static function get_configs ($key)
    {
        $config = self::load();
        $config= $config->find('Config');
        return $config->try_config($key);
    }
    
    
    /**
     * @param $classname
     * @return mixed
     */
    public function find ($classname)
    {
    if(isset($classname) && class_exists($classname)):
        $_obj_ =new $classname;
    return $_obj_;
    else:
  
      echo "<div style='background:rgba(125%,208%,208%,0.6); color: black; width:40%; padding: 16px' ><pre>" . $this -> notFoundClass($classname) . "</pre></div><br>";
      return null;
        endif;
    }
    
    
  }