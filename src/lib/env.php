<?php
require_once dirname(__DIR__,2) . '/vendor/autoload.php';
$Dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2));
$Dotenv->load();
function env($key,$default=null) {
    if($_ENV[$key] === false){
        return $default;
    }
    else{
        return $_ENV[$key];
    }
}