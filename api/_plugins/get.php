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
			$plugin = new Plugin();
			$plugin->setPluginArray($data);

			$return[$plugin->getId()] = [
				'name' => $plugin->getName(),
				'user' => $plugin->getUser(),
				'official' => $plugin->getOfficial(),
				'validate' => $plugin->getOfficial(),
				'description' => $plugin->getDescription(),
				'version' => $plugin->getVersion(),
				'downloads' => $plugin->getDownloads(),
				'url_id' => $plugin->getUrlId(),
				'plugin_url' => PROTOCOL.$_SERVER['HTTP_HOST'].URI.'api/plugin/'.$data['url_id'],
				'download_url' => $plugin->getDownloadUrl(),
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