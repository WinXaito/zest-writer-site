<?php
	/**
	 * Project: Zest-Writer-Site
	 * zest-writer-site Copyright© 2016 Kevin Vuilleumier
	 */

	class ShowApi{
		/**
		 * @param $text
		 */
		public static function debug($text){
			ShowApi::text('debug', $text);
		}

		/**
		 * @param $key
		 * @param $value
		 */
		public static function text($key, $value){
			ShowApi::show([$key => $value]);
		}

		/**
		 * @param $array
		 */
		public static function show($array){
			echo json_encode($array);
			exit();
		}
	}