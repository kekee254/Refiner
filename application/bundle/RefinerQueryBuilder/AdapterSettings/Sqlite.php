<?php namespace RefinerQueryBuilder\AdapterSettings;

class Sqlite extends BaseAdapter
{
    /**
     * @param $config
     *
     * @return mixed
     */
    public function createConnection($config)
    {
        $connectionString = 'sqlite:' . $config['database'];
        return $this->container->build(
            '\PDO',
            array($connectionString, null, null, $config['options'])
        );
    }
}
