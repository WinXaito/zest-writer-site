<?php
	/**
	 * Project: Zest-Writer-Site
	 * zest-writer-site Copyright© 2016 Kevin Vuilleumier
	 */

	require_once __DIR__.'/../models/Database.class.php';

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
	}