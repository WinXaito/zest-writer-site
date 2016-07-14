<?php
	/**
	 * Project: Zest-Writer-Site
	 * zest-writer-site Copyright© 2016 Kevin Vuilleumier
	 */

	header('Content-Type: application/json');

	define('APIROOT', __DIR__);

	require_once __DIR__.'/../config.php';
	require_once ROOT.'/models/Database.class.php';
	require_once APIROOT.'/class/ShowApi.class.php';
	require_once APIROOT.'/class/ApiDatabase.class.php';
	require_once APIROOT.'/class/ApiError.class.php';