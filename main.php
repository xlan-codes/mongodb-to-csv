<?php

require 'vendor/autoload.php';
require 'vendor/leroy-merlin-br/mongolid/bootstrap/bootstrap.php';

use Mongolid\Manager;
use Mongolid\Connection\Connection;

$connection = new Connection('mongodb://admin:password@127.0.0.1:27017/test?authSource=admin&readPreference=primary&appname=MongoDB%20Compass&ssl=false');
$manager = new Manager();
$manager->addConnection($connection);

require './src/contollers/SyncController.php';
$logger = new Katzgrau\KLogger\Logger(__DIR__.'/logs');
global $logger;

define('DEAD_STATE', 'DEAD');
//define('CSV_FILE_PATH', '/var/www/bleb/public');
define('CSV_FILE_PATH', 'test.csv');
define('LOGGER_FOLDER', './logs');

$csv_properties = [
    'id_name_sensor',
    'last_date_time',
    'value',
    'last_position',
    'battery_level'
];

$syncController = new SyncController();
$syncController->export_info_to_csv();

