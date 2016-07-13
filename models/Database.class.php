<?php
	/**
	 * Project: Zest-Writer-Site
	 * zest-writer-site Copyright© 2016 Kevin Vuilleumier
	 */

	require_once __DIR__.'/../database.php';

	class Database{
		private $host;
		private $name;
		private $username;
		private $password;

		private $db;

		public function __construct(){
			$this->host = DBHOST;
			$this->name = DBNAME;
			$this->username = DBUSERNAME;
			$this->password = DBPASSWORD;

			try{
				$this->db = new PDO('mysql:host='.$this->host.';dbname='.$this->name, $this->username, $this->password);
				$this->db->exec("SET CHARACTER SET utf8");
			}catch(Exception $e){
				die('Erreur : '.$e->getMessage());
			}
		}

		public function getDatabase(){
			return $this->db;
		}

		public function getHost()		{
			return $this->host;
		}

		public function getName(){
			return $this->name;
		}

		public function getUsername(){
			return $this->username;
		}

		public function getPassword(){
			return $this->password;
		}
	}