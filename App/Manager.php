<?php

// include the Config 
require_once 'config/config.php';

/*
 * AUTO LOADER
 * LOAD THE CORE LIBERIES
*/

spl_autoload_register(function ($classname) {
    include_once "libraries/" . $classname . ".php";
});
