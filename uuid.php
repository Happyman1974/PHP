#!/usr/bin/php -q
<?php
set_time_limit(10);
ob_implicit_flush(false); // Turn off output buffering
error_reporting(E_ALL ^ E_NOTICE);
include_once('phpagi/phpagi.php');.
$agi=new AGI();

if (function_exists('com_create_guid')){
$uuid=com_create_guid();
}
else{
  mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
$charid = strtoupper(md5(uniqid(rand(), true)));
$hyphen = chr(45);// "-"
$uuid = substr($charid, 0, 8).$hyphen
.substr($charid, 8, 4).$hyphen
.substr($charid,12, 4).$hyphen
.substr($charid,16, 4).$hyphen
.substr($charid,20,12);
}

$agi->set_variable("CallUUID",$uuid);
exit;
