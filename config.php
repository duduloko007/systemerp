<?php
require 'environment.php';

global $config;
global $db;
$config = array();
if(ENVIRONMENT == 'development') {


define ("BASE_URL", "http://localhost/systemerp/"); 
define("BASE_URL_CSS", "http://localhost/systemerp/assets/css/");
define ("BASE_URL_IMAGES","http://localhost/systemerp/assets/images/");
define ("BASE_URL_BOWER","http://localhost/systemerp/libraries/");
define ("BASE_URL_DIST","http://localhost/systemerp/assets/dist/");
define ("BASE_URL_CKEDITOR","http://localhost/systemerp/libraries/ckeditor/");

	$config['dbname'] = 'sistema_erp';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
} else {

define ("BASE_URL", "http://localhost/systemerp/"); 
define("BASE_URL_CSS", "http://localhost/systemerp/assets/css/");
define ("BASE_URL_IMAGES","http://localhost/systemerp/assets/images/");
define ("BASE_URL_BOWER","http://localhost/systemerp/libraries/");
define ("BASE_URL_DIST","http://localhost/systemerp/assets/dist/");
define ("BASE_URL_CKEDITOR","http://localhost/systemerp/libraries/ckeditor/");

	$config['dbname'] = 'sistema_erp';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';

}

	?>