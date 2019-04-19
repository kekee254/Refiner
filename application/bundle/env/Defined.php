<?php
  
  class Defined
  {
    function __construct ()
    {
      define('R10', 'CLASS NOT FOUND');
      define('RDB40', 'DATABASE CONNECTION ERROR');
      define('R11', 'PROPERTY NOT DEFINED');
      define('R12', 'FILE NOT FOUND');
      define('RAPP10', 'APPLICATION ERROR');
      define('RLOGIN10', 'WRONG USER CREDENTIALS');
    }
  }