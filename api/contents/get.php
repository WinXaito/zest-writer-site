<?php
	/**
	 * Project: Zest-Writer-Site
	 * zest-writer-site Copyright© 2016 Kevin Vuilleumier
	 */

	require_once __DIR__.'/../init.php';

	const Plugin = Content::Plugin;
	const Theme = Content::Theme;


	if(!isset($_GET['content']))
		ApiError::error(400);

	$return = $obj = null;
	if($_GET['content'] == "plugin")
		$obj = Plugin;
	else if($_GET['content'] == "theme"){
		$obj = Theme;
	}else{
		ApiError::error(400);
	}

	if(isset($_GET['list']) && $_GET['list']){
		//Get list of all content
		$result = $apiDatabase->query("SELECT * FROM $obj WHERE removed = 0", []);

		while($data = $result->fetch()){
			$content = new Content();
			$content->setContentArray($data);
			$content->setType($obj);

			$user = $apiDatabase->getUser($content->getUser());


			if(!$user)
				$user = $apiDatabase->getUser(1);
			if(!$user)
				ApiError::error(500);

			$return[] =[
				'id' => $content->getId(),
				'name' => $content->getName(),
				'user' => [
					'id' => $user->getId(),
					'name' => $user->getName()
				],
				'official' => $content->getOfficial(),
				'validate' => $content->getOfficial(),
				'description' => $content->getDescription(),
				'version' => $content->getVersion(),
				'downloads' => $content->getDownloads(),
				'url_id' => $content->getUrlId(),
				'plugin_url' => PROTOCOL.$_SERVER['HTTP_HOST'].URI.'api/'.$content->getTypeSingular().'/'.$data['url_id'],
				'download_url' => $content->getDownloadUrl(),
			];
		}

		ShowApi::show(empty($return) ? ['message' => 'No content founded'] : [$obj => $return]);
	}else{
		//Get one specific contents
		if(isset($_GET['id']) && !empty($_GET['id'])){
			$content = $apiDatabase->getContent($obj, $_GET['id']);

			if(!$content)
				ApiError::error(404);

			$content->setType($obj);
			$user = $apiDatabase->getUser($content->getUser());

			ShowApi::show(
				[
					'id' => $content->getId(),
					'name' => $content->getName(),
					'user' => [
						'id' => $user->getId(),
						'name' => $user->getName()
					],
					'official' => $content->getOfficial(),
					'validate' => $content->getOfficial(),
					'description' => $content->getDescription(),
					'version' => $content->getVersion(),
					'downloads' => $content->getDownloads(),
					'url_id' => $content->getUrlId(),
					'download_url' => $content->getDownloadUrl(),
				]
			);
		}else{
			ApiError::error(400);
		}
	}