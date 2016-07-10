<?php
	/**
	 * Project: Zest-Writer-Site
	 * zest-writer-site Copyright© 2016 Kevin Vuilleumier
	 */

	$return = [];

	if(isset($_GET['list'])){
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
				'url' => $data['url_id'],
			];
		}

		$return = empty($return) ? ['message' => 'No plugins founded'] : $return;
	}else{
		//Get one specific _plugins

		if(isset($_GET['id']) && !empty($_GET['id'])){
			$return = ['debug' => 'id'];
		}else{
			ApiError::error(404);
		}
	}

	echo json_encode($return);