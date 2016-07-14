<?php
	/**
	 * Project: Zest-Writer-Site
	 * zest-writer-site Copyright© 2016 Kevin Vuilleumier
	 */

	require_once __DIR__.'/init.php';
	require_once APIROOT.'/class/ApiDatabase.class.php';
	require_once APIROOT.'/class/Content.class.php';
	require_once APIROOT.'/class/ApiError.class.php';
	require_once APIROOT.'/class/Download.class.php';

	$db = new Database();
	$apiDatabase = new ApiDatabase($db);

	if(isset($_GET['id']) && isset($_GET['type']) && !empty($_GET['id'])){
		$content = $obj = null;
		if($_GET['obj'] == 'plugin'){
			$obj = Content::Plugin;
		}else if($_GET['obj'] == 'theme'){
			$obj = Content::Theme;
		}else{
			ApiError::error(400);
		}

		$content = $apiDatabase->getContent($obj, $_GET['id']);

		if(!$content)
			ApiError::error(404);

		if($_GET['type'] == 'content'){
			$content->increaseDownload($obj, $apiDatabase);
			Download::downloadFile(ROOT.'/res/'.$obj.'/'.$content->getUrlId().'.content');
		}else if($_GET['type'] == 'data'){
			Download::downloadFile(ROOT.'/res/'.$obj.'/'.$content->getUrlId().'.data');
		}else{
			ApiError::error(400);
		}
	}else{
		ApiError::error(400);
	}