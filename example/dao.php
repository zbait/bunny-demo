<?php

// template use autoload
require_once __DIR__.'/../vendor/autoload.php';

// example logic

use Example\Dao\UserDao;
use Example\Dao\User;

//$dao = new UserDao();

//$dao->find('id0');

$user = new User('a', 'b', 'c');
var_dump($user);
