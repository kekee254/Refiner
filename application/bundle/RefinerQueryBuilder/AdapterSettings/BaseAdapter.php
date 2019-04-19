<?php namespace RefinerQueryBuilder\AdapterSettings;

use RefinerDI\Pack;

abstract class BaseAdapter
{
    /**
     * @var \RefinerDI\Pack
     */
    protected $container;

    /**
     * @param \RefinerDI\Pack $container
     */
    public function __construct(Pack $container)
    {
        $this->container = $container;
    }

    /**
     * @param $config
     *
     * @return \PDO
     */
    public function connect($config)
    {
        if (!isset($config['options'])) {
            $config['options'] = array();
        }
        return $this->createConnection($config);
    }

    /**
     * @param $config
     *
     * @return mixed
     */
    abstract protected function createConnection($config);
}
