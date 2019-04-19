<?php
  
  use EnvironmentException as E;
  
  class Config extends E
{
/*
 * this method gets a env values
 * */
    private $config;
    
    /**
     * @param $key
     * @return mixed
     */
    public function try_config ($key)
 {
     $this->config= new AppConfigurationFile();
    return $this->config->config[$key];
 }
}