<?php
  
  /*
   * Refiner Database Connection Class
   * Quickly create database connections
   *
   * To create a database connection simply call the hook method statically
   * DB::hook();
   *
   * To close the connection pass the DB::hook instance as a parameter of the DB close static method
   *
   * $pdo_instance = DB::hook();
   * DB::close($pdo_instance)
   * */
  
  use RefinerQueryBuilder\Connection;
  
  class DB
  {
    /**
     * create database connection
     * default database is mysql
     * to change this head over to AppConfiguration file located in the env folder
     * @return \RefinerQueryBuilder\Connection
     */
    public static function hook ()
    {
      $config = Loader ::get_configs('R_DB');
      $driver = $config['db_type'];
      
      return new Connection($driver, $config);
    }
  
    /**
     * @param $pdo_instance
     */
    public static function close ($connection_instance, $pdo_instance)
    {
      if ($connection_instance instanceof Connection) {
        unset($pdo_instance);
        sleep(30);
      }
    }
  }