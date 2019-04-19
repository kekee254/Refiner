<?php
/**
 * Created by PhpStorm.
 * User: KEKEE
 * Date: 3/5/2019
 * Time: 9:59 PM
 */
  
  class NotFound_Controller extends RBC
{

    function __construct()
    {
        parent::__construct();
    }
    public  function  index()
    {
        echo "404 error page not found";
    }
}