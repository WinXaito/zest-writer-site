<?php
	/**
	 * Project: Zest-Writer-Site
	 * zest-writer-site Copyright© 2016 Kevin Vuilleumier
	 */

	require_once __DIR__.'/../init.php';

	$db = new Database();
	$apiDatabase = new ApiDatabase($db);

	if($_SERVER['REQUEST_METHOD'] == "GET"){
		require_once __DIR__.'/get.php';
	}else if($_SERVER['REQUEST_METHOD'] == "POST"){
		require_once __DIR__.'/post.php';
	}else if($_SERVER['REQUEST_METHOD'] == "PUT"){
		require_once __DIR__.'/put.php';
	}else if($_SERVER['REQUEST_METHOD'] == "DELETE"){
		require_once __DIR__.'/delete.php';
	}