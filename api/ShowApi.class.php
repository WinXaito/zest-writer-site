<?php
	/**
	 * Project: Zest-Writer-Site
	 * zest-writer-site Copyright© 2016 Kevin Vuilleumier
	 */

	class ShowApi{
		public static function debug($text){
			ShowApi::text('debug', $text);
		}

		public static function text($key, $value){
			ShowApi::show([$key => $value]);
		}

		public static function show($array){
			echo json_encode($array);
			exit();
		}
	}