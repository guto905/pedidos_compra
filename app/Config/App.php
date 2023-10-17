<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class App extends BaseConfig
{
	/*
	|--------------------------------------------------------------------------
	| Base Site URL
	|--------------------------------------------------------------------------
	|
	| URL to your CodeIgniter root. Typically this will be your base URL,
	| WITH a trailing slash:
	|
	|	http://example.com/
	|
	| If this is not set then CodeIgniter will guess the protocol, domain
	| and path to your installation.
	|
	*/
	public $baseURL = 'http://localhost:8080/';

	/*
	|--------------------------------------------------------------------------
	| Index File
	|--------------------------------------------------------------------------
	|
	| Typically this will be your index.php file, unless you've renamed it to
	| something else. If you are using mod_rewrite to remove the page set this
	| variable so that it is blank.
	|
	*/
	public $indexPage = '';

	/*
	|--------------------------------------------------------------------------
	| URI PROTOCOL
	|--------------------------------------------------------------------------
	|
	| This item determines which server global should be used to retrieve the
	| URI string.  The default setting of 'REQUEST_URI' works for most servers.
	| If your links do not seem to work, try one of the other delicious flavors:
	|
	| 'REQUEST_URI'    Uses $_SERVER['REQUEST_URI']
	| 'QUERY_STRING'   Uses $_SERVER['QUERY_STRING']
	| 'PATH_INFO'      Uses $_SERVER['PATH_INFO']
	|
	| WARNING: If you set this to 'PATH_INFO', URIs will always be URL-decoded!
	*/
	public $uriProtocol = 'REQUEST_URI';

	/*
	|--------------------------------------------------------------------------
	| Default Locale
	|--------------------------------------------------------------------------
	|
	| The Locale roughly represents the language and location that your visitor
	| is viewing the site from. It affects the language strings and other
	| strings (like currency markers, numbers, etc), that your program
	| should run under for this request.
	|
	| @see https://secure.php.net/manual/en/locale.constants.php
	|
	*/
	public $defaultLocale = 'en';

	/*
	|--------------------------------------------------------------------------
	| Negotiate Locale
	|--------------------------------------------------------------------------
	|
	| If true, the current Request object will automatically determine the
	| language to use based on the value of the Accept-Language header.
	|
	| If false, no automatic detection will be performed.
	|
	*/
	public $negotiateLocale = true;

	/*
	|--------------------------------------------------------------------------
	| Supported Locales
	|--------------------------------------------------------------------------
	|
	| If $negotiateLocale is true, this array lists the locales supported
	| by the application in descending order of priority. If no matches are
	| found, the first locale will be used.
	|
	| @see https://secure.php.net/manual/en/locale.constants.php
	|
	*/
	public $supportedLocales = ['en'];

	/*
	|--------------------------------------------------------------------------
	| Application Timezone
	|--------------------------------------------------------------------------
	|
	| The default timezone that will be used in your application to display
	| dates, times, and other things related to time.
	|
	*/
	public $appTimezone = 'UTC';

	/*
	|--------------------------------------------------------------------------
	| Framework Charset
	|--------------------------------------------------------------------------
	|
	| This is the character encoding used by the framework for all of its
	| output. It is advised that you change this value if you are not using
	| UTF-8 or ISO-8859-1.
	|
	*/
	public $charset = 'UTF-8';

	/*
	|--------------------------------------------------------------------------
	| Composer Autoload
	|--------------------------------------------------------------------------
	|
	| If you have a composer package that you'd like to autoload in your
	| application, you can include it here. This will add the package to
	| your autoloader and namespace it to `Config`.
	|
	| @var array<string, string>
	|
	*/
	public $composerAutoload = [];

	/*
	|--------------------------------------------------------------------------
	| Default Request Format
	|--------------------------------------------------------------------------
	|
	| If no content type is detected from the browser, assume this one.
	|
	*/
	public $defaultRequestFormat = 'html';

	/*
	|--------------------------------------------------------------------------
	| Default Locale
	|--------------------------------------------------------------------------
	|
	| The Locale roughly represents the language and location that your visitor
	| is viewing the site from. It affects the language strings and other
	| strings (like currency markers, numbers, etc), that your program
	| should run under for this request.
	|
	| @see https://secure.php.net/manual/en/locale.constants.php
	|
	*/
	//public $negotiateLocale = true;

	/*
	|--------------------------------------------------------------------------
	| Supported Locales
	|--------------------------------------------------------------------------
	|
	| If $negotiateLocale is true, this array lists the locales supported
	| by the application in descending order of priority. If no matches are
	| found, the first locale will be used.
	|
	| @see https://secure.php.net/manual/en/locale.constants.php
	|
	*/
	//public $supportedLocales = ['en'];

	/*
	|--------------------------------------------------------------------------
	| Application Timezone
	|--------------------------------------------------------------------------
	|
	| The default timezone that will be used in your application to display
	| dates, times, and other things related to time.
	|
	*/
	//public $appTimezone = 'UTC';

	/*
	|--------------------------------------------------------------------------
	| Framework Charset
	|--------------------------------------------------------------------------
	|
	| This is the character encoding used by the framework for all of its
	| output. It is advised that you change this value if you are not using
	| UTF-8 or ISO-8859-1.
	|
	*/
	//public $charset = 'UTF-8';

	/*
	|--------------------------------------------------------------------------
	| Composer Autoload
	|--------------------------------------------------------------------------
	|
	| If you have a composer package that you'd like to autoload in your
	| application, you can include it here. This will add the package to
	| your autoloader and namespace it to `Config`.
	|
	| @var array<string, string>
	|
	*/
	//public $composerAutoload = [];

	/*
	|--------------------------------------------------------------------------
	| Default Request Format
	|--------------------------------------------------------------------------
	|
	| If no content type is detected from the browser, assume this one.
	|
	*/
	//public $defaultRequestFormat = 'html';
}
