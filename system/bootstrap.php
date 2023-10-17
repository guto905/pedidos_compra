<?php

// Autoloader
require FCPATH . 'vendor/autoload.php';

use CodeIgniter\Config\Services;
use Config\App;
use Config\Autoload;
use Config\Modules;
use Config\Services as BaseServices;

// Resolve composer binary path based on OS
if (is_file(FCPATH . 'vendor/bin/CodeIgniter')) {
	$composer = 'php ' . FCPATH . 'vendor/bin/CodeIgniter';
} else {
	$composer = realpath(FCPATH . 'vendor/codeigniter4/framework/system/..') . '/composer';
}

// Define application constants
$composerPath = FCPATH . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

if (! is_file($composerPath)) {
	$composerPath = dirname(BASEPATH, 2) . DIRECTORY_SEPARATOR . 'autoload.php';
}

// Let's test out Composer
if (! is_file($composerPath)) {
	echo 'Whoops! We\'re missing a vendor/autoload.php file. Please run: ' . $composer . ' install';
	exit(1);
}

require $composerPath;

// Instantiate Core
//$app = new App();

// Initialize Autoloader
$autoloader = Autoload::init($composer);

// Initialize Services
Services::autoloader($autoloader);

// Initialize Modules
if (ENVIRONMENT !== 'production') {
	$modules = new Modules();
	$modules->initialize();
}

// Load environment settings from .env files
if (is_readable(ROOTPATH . '.env')) {
	$dotenv = Dotenv\Dotenv::createImmutable(ROOTPATH);
	$dotenv->load();
}

// Ensure ENVIRONMENT is defined
if (! isset($_SERVER['CI_ENVIRONMENT'])) {
	if (isset($_ENV['CI_ENVIRONMENT'])) {
		define('ENVIRONMENT', $_ENV['CI_ENVIRONMENT']);
	} else {
		define('ENVIRONMENT', $_SERVER['CI_ENVIRONMENT'] ?? 'development');
	}
}

if (file_exists(COMPOSER_PATH . 'autoload.php')) {
    require_once COMPOSER_PATH . 'autoload.php';
}

// Initialize error handling
Services::error()->initialize();

// Set Timezone
date_default_timezone_set($app->appTimezone);

// Initialize the application
$app->initialize();

// Run the application
$app->run();
