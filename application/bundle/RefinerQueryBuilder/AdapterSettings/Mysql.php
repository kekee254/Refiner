<?php namespace RefinerQueryBuilder\AdapterSettings;

class Mysql extends BaseAdapter
{
    /**
     * @param $config
     *
     * @return mixed
     */
    protected function createConnection($config)
    {
      $connectionString = "mysql:dbname={$config['db_name']}";
  
      if (isset($config['host'])) {
        $connectionString .= ";host={$config['db_host']}";
      }
  
      if (isset($config['port'])) {
        $connectionString .= ";port={$config['db_port']}";
      }
  
      if (isset($config['unix_socket'])) {
        $connectionString .= ";unix_socket={$config['unix_socket']}";
      }
  
      $connection = $this -> container -> build(
          '\PDO',
          array($connectionString, $config['db_account']['username'], $config['db_account']['password'], $config['pdo_driver_options'])
      );
  
      if (isset($config['charset'])) {
        $connection -> prepare("SET NAMES '{$config['db_charset']}'") -> execute();
      }
  
      return $connection;
    }
}
