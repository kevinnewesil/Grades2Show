<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../../framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

// Firebug function
function fbtrace($var, $name = ''){
  if($name != NULL) {
  	Yii::trace(CVarDumper::dumpAsString($name . ' : ' . $var),'vardump');
  } else {
  	Yii::trace(CVarDumper::dumpAsString($var),'vardump');
  }
}

require_once($yii);

Yii::createWebApplication($config)->run();