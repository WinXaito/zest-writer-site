<?php
	/**
	 * Project: Zest-Writer-Site
	 * zest-writer-site Copyright© 2016 Kevin Vuilleumier
	 */

	require_once __DIR__.'/../../config.php';

	$return = [];
	if(isset($_GET['list'])){
		//Get list of all plugins
		$result = $apiDatabase->get('SELECT * FROM plugins WHERE removed = 0', []);

		while($data = $result->fetch()){
			$return[$data['id']] = [
				'name' => $data['name'],
				'user' => $data['user'],
				'official' => filter_var($data['official'], FILTER_VALIDATE_BOOLEAN),
				'validate' => filter_var($data['validate'], FILTER_VALIDATE_BOOLEAN),
				'description' => $data['description'],
				'version' => $data['version'],
				'downloads' => filter_var($data['downloads'], FILTER_VALIDATE_INT),
				'url_id' => $data['url_id'],
				'url' => PROTOCOL.$_SERVER['HTTP_HOST'].URI.'api/plugin/'.$data['url_id'],
			];
		}

		ShowApi::show(empty($return) ? ['message' => 'No plugins founded'] : $return);
	}else{
		//Get one specific _plugins
		if(isset($_GET['id']) && !empty($_GET['id'])){
			$plugin = $apiDatabase->getPlugin($_GET['id']);

			if(!$plugin)
				ApiError::error(404);

			ShowApi::show($plugin->getArray());
		}else{
			ApiError::error(400);
		}
	}