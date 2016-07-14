<?php
	/**
	 * Project: Zest-Writer-Site
	 * zest-writer-site Copyright© 2016 Kevin Vuilleumier
	 */

	class ApiError{
		/**
		 * @param $error
		 */
		public static function error($error){
			switch($error){
				case 301:
					$mess = "Moved Permanently";
					break;
				case 302:
					$mess = "Moved Temporarily";
					break;
				case 400:
					$mess = "Bad Request";
					break;
				case 401:
					$mess = "Unauthorized";
					break;
				case 403:
					$mess = "Forbidden";
					break;
				case 404:
					$mess = "Not Found";
					break;
				case 500:
					$mess = "Internal Server Error";
					break;
				default:
					$mess = "An unknown error occured";
			}

			$return = [
				"code" => filter_var($error, FILTER_VALIDATE_INT),
				"message" => $mess,
			];

			echo json_encode($return);
			exit();
		}
	}