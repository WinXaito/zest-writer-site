<?php
	/**
	 * Project: Zest-Writer-Site
	 * zest-writer-site Copyright© 2016 Kevin Vuilleumier
	 */

	require_once __DIR__.'/../init.php';
	require_once APIROOT.'/class/ApiDatabase.class.php';
	require_once APIROOT.'/class/Plugin.class.php';
	require_once APIROOT.'/class/ApiError.class.php';

	$db = new Database();
	$apiDatabase = new ApiDatabase($db);

	if(isset($_GET['id']) && isset($_GET['type']) && !empty($_GET['id'])){
		$plugin = $apiDatabase->getPlugin($_GET['id']);

		if(!$plugin)
			ApiError::error(404);

		if($_GET['type'] == 'content'){
			downloadFile( __DIR__.'/../../res/plugins/'.$plugin->getUrlId().'.content');
		}else if($_GET['type'] == 'data'){
			downloadFile( __DIR__.'/../../res/plugins/'.$plugin->getUrlId().'.data');
		}else{
			ApiError::error(400);
		}
	}else{
		ApiError::error(400);
	}

	function downloadFile($path){
		if(file_exists($path)){
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename="'.basename($path).'"');
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($path));
			readfile($path);
			exit;
		}else{
			ApiError::error(500);
		}
	}