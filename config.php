<?php
	/**
	 * Project: Zest-Writer-Site
	 * zest-writer-site Copyright© 2016 Kevin Vuilleumier
	 */

	$protocol = isset($_SERVER['HTTPS']) ? "https://" : "http://";
	define('PROTOCOL', $protocol);

	define('ROOT', __DIR__);
	define('URI', '/zest-writer-site/');