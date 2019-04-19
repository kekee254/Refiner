<?php namespace RefinerDI;

/**
 * This class gives the ability to access non-static methods statically
 *
 * Class AliasFacade
 *
 * @package RefinerDI
 */
class AliasFacade {

    /**
     * @var Pack
     */
    protected static $refiner_di_instance;

    /**
     * @param $method
     * @param $args
     *
     * @return mixed
     */
    public static function __callStatic($method, $args)
    {
        if(!static::$refiner_di_instance) {
            static::$refiner_di_instance = new Pack();
        }

        return call_user_func_array(array(static::$refiner_di_instance, $method), $args);
    }

    /**
     * @param Pack $instance
     */
    public static function setRefinerdiInstance(Pack $instance)
    {
        static::$refiner_di_instance = $instance;
    }

    /**
     * @return \RefinerDI\Pack $instance
     */
    public static function getRefinerdiInstance()
    {
        return static::$refiner_di_instance;
    }
}