<?php
	/**
	 * Project: Zest-Writer-Site
	 * zest-writer-site Copyright© 2016 Kevin Vuilleumier
	 */

	require_once __DIR__.'/../init.php';

	$return = [];
	if(isset($_GET['list'])){
		//Get list of all plugins
		$result = $apiDatabase->get('SELECT * FROM users', []);

		while($data = $result->fetch()){
			$user = new User();
			$user->setUserArray($data);

			$return[$user->getId()] = [
				'id' => $user->getId(),
				'name' => $user->getName(),
			];
		}

		ShowApi::show(empty($return) ? ['message' => 'No users founded'] : $return);
	}else{
		ApiError::error(404);
	}