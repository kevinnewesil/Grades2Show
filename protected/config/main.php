<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// Twitter bootstrap
$preload = array('bootstrap');

// Don't load it for AJAX requests
if (isset($_POST['isAjaxRequest']) && $_POST['isAjaxRequest'] == '1')
{
	$preload = array();
}

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
	'name' => 'FastGrade',

	//multi-language settings
	'sourceLanguage' => '00',
	'language' => 'en',

	// preloading 'log' component
	'preload' => array_merge(array('log'), $preload),

	// autoloading model and component classes
	'import' => array(
		'application.models.*',
		'application.components.*',
		'application.extensions.phpass.PasswordHash', // Password hashing
	),

	'modules' => array('gii' => array(
			'class' => 'system.gii.GiiModule',
			'password' => 'cijfers',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters' => array(
				'127.0.0.1',
				'::1'
			),
			//'generatorPaths' => array('bootstrap.gii'),
		), ),

	// application components
	'components' => array(
		'user' => array(
			// enable cookie-based authentication
			'allowAutoLogin' => FALSE, ),

		'urlManager' => array(
			'urlFormat' => 'path',
			'rules' => array(
				'<controller:\w+>/<id:\d+>' => '<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
				'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
			),
		),

		'db' => array(
			'connectionString' => 'mysql:host=localhost;dbname=fastgrade',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => 'tessa',
			'charset' => 'utf8',
			'enableParamLogging' => TRUE, // show query parameters
		),

		'errorHandler' => array(
			// use 'site/error' action to display errors
			'errorAction' => 'site/error', ),
		'log' => array(
			'class' => 'CLogRouter',
			'routes' => array(
				array(
					'class' => 'CFileLogRoute',
					'levels' => 'error, warning',
				),
				// uncomment the following to show log messages on web pages

				array(
					'class' => 'CWebLogRoute',
					'levels' => 'trace, error, warning',
					'categories' => 'vardump,application.*',
					'showInFireBug' => TRUE,
				),
			),
		),
		'bootstrap' => array(
			'class' => 'ext.bootstrap.components.Bootstrap',
			'responsiveCss' => TRUE
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params' => array(
		// this is used in contact page
		'adminEmail' => 'tessa@tessabakker.com',
		'phpass' => array(
			'iteration_count_log2' => 8,
			'portable_hashes' => FALSE,
		),
	),
);
