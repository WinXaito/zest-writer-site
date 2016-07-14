<?php
	/**
	 * Project: Zest-Writer-Site
	 * zest-writer-site Copyright© 2016 Kevin Vuilleumier
	 */

	require_once __DIR__.'/../init.php';
	require_once ROOT.'/models/Database.class.php';
	require_once __DIR__.'/Content.class.php';
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
		public function query($query, array $data){
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
			$req = $this->query("SELECT * FROM users WHERE id = ?", [$id]);
			$userData = $req->fetch();

			if(!$userData)
				return false;

			$user = new User();
			$user->setUserArray($userData);

			return $user;
		}

		/**
		 * @param $content
		 * @param $url_id
		 *
		 * @return bool|Content
		 */
		public function getContent($content, $url_id){
			$req = $this->query("SELECT * FROM $content WHERE url_id = ?", [$url_id]);
			$contentData = $req->fetch();

			if(!$contentData)
				return false;

			$content = new Content();
			$content->setContentArray($contentData);
			return $content;
		}

		/**
		 * @param $table
		 * @param $id
		 */
		public function increaseDownload($table, $id){
			$req = $this->query("UPDATE $table SET downloads = downloads + 1 WHERE id = ?", [$id]);

			if(!$req){
				ApiError::error(500);
			}
		}
	}