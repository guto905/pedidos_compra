<?php

define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development');

if (defined('ENVIRONMENT'))
{
	switch (ENVIRONMENT)
	{
		case 'development':
		case 'testing':
			error_reporting(-1);
			ini_set('display_errors', 1);
		break;

		case 'production':
			ini_set('display_errors', 0);
			if (version_compare(PHP_VERSION, '7.0.0', '>='))
			{
				error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED & ~E_WARNING);
			}
			else
			{
				error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE & ~E_WARNING);
			}
		break;

		default:
			exit('The application environment is not set correctly.');
	}
}

// Define a constant to the path of index.php
define('FCPATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);

// Define a constant to the path of public folder
define('PUBLICPATH', FCPATH);

// Load Composer Autoloader
require FCPATH . 'vendor/autoload.php';

// Load CodeIgniter
require FCPATH . 'system/bootstrap.php';
