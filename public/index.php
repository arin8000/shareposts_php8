<?php

use App\Helpers\Helpers;
use App\Libs\Core;




require_once realpath(dirname(__DIR__)) . '/app/Config/config_dev.php';
require __DIR__.'/../vendor/autoload.php';
Helpers::sessionStart();

// inti core lib
$init = new Core;