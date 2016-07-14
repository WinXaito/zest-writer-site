<?php
	/**
	 * Project: Zest-Writer-Site
	 * zest-writer-site Copyright© 2016 Kevin Vuilleumier
	 */

	require_once __DIR__.'/../init.php';
	require_once ROOT.'/models/Database.class.php';
	require_once __DIR__.'/Plugin.class.php';
	require_once __DIR__.'/User.class.php';

	class ApiDatabase{
		private $db;

		/**
		 * @param Database $db
		 */
		public function __construct(Database $db){
			$this->db = $db->getDatabase();
		}

		/**
		 * @param       $query
		 * @param array $data
		 *
		 * @return PDOStatement
		 */
		public function get($query, array $data){
			$req = $this->db->prepare($query);
			$req->execute($data);

			return $req;
		}

		/**
		 * @param $id
		 *
		 * @return bool|User
		 */
		public function getUser($id){
			$req = $this->get("SELECT * FROM users WHERE id = ?", [$id]);
			$userData = $req->fetch();

			if(!$userData)
				return false;

			$user = new User();
			$user->setUserArray($userData);

			return $user;
		}

		/**
		 * @param $url_id
		 *
		 * @return bool|Plugin
		 */
		public function getPlugin($url_id){
			$req = $this->get("SELECT * FROM plugins WHERE url_id = ?", [$url_id]);
			$pluginData = $req->fetch();

			if(!$pluginData)
				return false;

			$plugin = new Plugin();
			$plugin->setPluginArray($pluginData);
			return $plugin;
		}

		/**
		 * @param $table
		 * @param $id
		 */
		public function increaseDownload($table, $id){
			$req = $this->get("UPDATE $table SET downloads = downloads + 1 WHERE id = ?", [$id]);

			if(!$req){
				ApiError::error(500);
			}
		}
	}