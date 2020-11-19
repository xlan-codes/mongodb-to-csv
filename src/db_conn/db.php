<?php

//require '../../vendor/leroy-merlin-br/mongolid/bootstrap/bootstrap.php';

use Mongolid\Manager;
use Mongolid\Connection\Connection;

$connection = new Connection('mongodb://admin:password@34.89.185.123:27017/blebricks?authSource=admin&readPreference=primary&appname=MongoDB%20Compass&ssl=false');
$manager = new Manager();
$manager->addConnection($connection);
