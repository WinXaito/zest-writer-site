<?php
	/**
	 * Project: Zest-Writer-Site
	 * zest-writer-site Copyright© 2016 Kevin Vuilleumier
	 */

	class Download{
		public static function downloadFile($path){
			if(file_exists($path)){
				header('Content-Description: File Transfer');
				header('Content-Type: application/octet-stream');
				header('Content-Disposition: attachment; filename="'.basename($path).'"');
				header('Expires: 0');
				header('Cache-Control: must-revalidate');
				header('Pragma: public');
				header('Content-Length: ' . filesize($path));
				readfile($path);
				exit;
			}else{
				ApiError::error(404);
			}
		}
	}