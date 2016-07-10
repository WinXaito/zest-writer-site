<?php
	/**
	 * Project: Zest-Writer-Site
	 * zest-writer-site Copyright© 2016 Kevin Vuilleumier
	 */

	require_once __DIR__.'/init.php';

	$protocol = isset($_SERVER['HTTPS']) ? "https://" : "http://";

	$return = [
		'name' => 'Zest Writer API',
		'version' => "0.0.0",
		'urls' => [
			'plugins' => [
				'list_get' => $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'plugins',
				'detail_get' => $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'plugin/{ID}',
				'detail_post' => $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'plugin/{ID}',
				'detail_put' => $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'plugin/{ID}',
				'detail_delete' => $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'plugin/{ID}',
			],
			'themes' => [
				'list_get' => $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'themes',
				'detail_get' => $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'theme/{ID}',
				'detail_post' => $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'theme/{ID}',
				'detail_put' => $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'theme/{ID}',
				'detail_delete' => $protocol.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'theme/{ID}',
			],
		]
	];

	echo json_encode($return);