<?php
	/**
	 * Project: Zest-Writer-Site
	 * zest-writer-site Copyright© 2016 Kevin Vuilleumier
	 */

	require_once __DIR__.'/../init.php';
	require_once __DIR__.'/../ApiError.class.php';

	ApiError::error($_GET['e']);