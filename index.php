<?php

define('APPPATH', 'Application/');
define('CONF_FILE_PATH', 'config.json');

$page = @$_GET['p'] ? $_GET['p'] : 'home';

require_once APPPATH. "Core/functions.php"; 
require_once APPPATH. "Core/controllers.php"; 
require_once APPPATH. "Database/database.php"; 

require_once APPPATH. "Core/core.php"; 

?>