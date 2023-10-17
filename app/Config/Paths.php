<?php namespace Config;

class Paths
{
	/**
	 * The path to the application directory.
	 */
	public $appDirectory = APPPATH;

	/**
	 * The path to the writable directory.
	 *
	 * This directory should be writable by the web server.
	 */
	public $writableDirectory = WRITEPATH;

	/**
	 * The path to the tests directory.
	 */
	public $testsDirectory = ROOTPATH.'tests/';

	/**
	 * The path to the system directory.
	 */
	public $systemDirectory = BASEPATH;

	/**
	 * The path to the writable directory.
	 *
	 * This directory should be writable by the web server.
	 */
	public $tempDirectory;

	/**
	 * Constructor.
	 *
	 * @param App $config
	 */
	public function __construct($config)
	{
		$this->tempDirectory = $config->tempDirectory;
	}
}
