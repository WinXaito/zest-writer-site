<?php
	/**
	 * Project: Zest-Writer-Site
	 * zest-writer-site Copyright© 2016 Kevin Vuilleumier
	 */

	require_once __DIR__.'/../init.php';
	require_once ROOT.'/models/Database.class.php';
	require_once 'Plugin.class.php';
	require_once 'User.class.php';

	class ApiDatabase{
		private $db;

		public function __construct(Database $db){
			$this->db = $db->getDatabase();
		}

		public function get($query, array $data){
			$req = $this->db->prepare($query);
			$req->execute($data);

			return $req;
		}

		public function getUser($id){
			$req = $this->get("SELECT * FROM users WHERE id = ?", [$id]);
			$result = $req->fetch();

			if(!$result)
				return false;

			$user = new User();
			$user->setUserArray($result);

			return $user;
		}

		public function getPlugin($url_id){
			$req = $this->get("SELECT * FROM plugins WHERE url_id = ?", [$url_id]);
			$result = $req->fetch();

			if(!$result)
				return false;

			$plugin = new Plugin();
			$plugin->setPlugin(
				$result['id'],
				$result['user'],
				$result['official'],
				$result['validate'],
				$result['name'],
				$result['url_id'],
				$result['description'],
				$result['version'],
				$result['downloads'],
				$result['removed']
			);
			return $plugin;
		}
	}