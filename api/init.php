<?php
	/**
	 * Project: Zest-Writer-Site
	 * zest-writer-site Copyright© 2016 Kevin Vuilleumier
	 */

	header('Content-Type: application/json');

	require_once __DIR__.'/ShowApi.class.php';
	require_once __DIR__.'/../models/Database.class.php';
	require_once __DIR__.'/ApiDatabase.class.php';
	require_once __DIR__.'/ApiError.php';