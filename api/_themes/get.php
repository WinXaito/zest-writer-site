<?php
	/**
	 * Project: Zest-Writer-Site
	 * zest-writer-site Copyright© 2016 Kevin Vuilleumier
	 */

	$return = [];

	if(isset($_GET['list'])){
		$return = ['debug' => 'list themes'];
	}else{
		//Get one specific _themes

		if(isset($_GET['id']) && !empty($_GET['id'])){
			$return = ['debug' => 'theme'];
		}else{
			ApiError::error(404);
		}
	}

	echo json_encode($return);