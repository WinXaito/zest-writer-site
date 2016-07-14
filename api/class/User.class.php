<?php
	/**
	 * Project: Zest-Writer-Site
	 * zest-writer-site Copyright© 2016 Kevin Vuilleumier
	 */

	class User{
		private $id;
		private $name;
		private $password;
		private $email;
		private $firstName;
		private $lastName;
		private $registrationDate;
		private $registrationIp;
		private $connectionDate;
		private $connectionIp;

		/**
		 * User constructor.
		 */
		public function __construct(){
		}

		public function setUser($id, $name, $password, $email, $firstName, $lastName, $registrationDate, $registrationIp, $connectionDate, $connectionIp){
			$this->id = $id;
			$this->name = $name;
			$this->password = $password;
			$this->email = $email;
			$this->firstName = $firstName;
			$this->lastName = $lastName;
			$this->registrationDate = $registrationDate;
			$this->registrationIp = $registrationIp;
			$this->connectionDate = $connectionDate;
			$this->connectionIp = $connectionIp;
		}

		public function setUserArray($array){
			$this->setUser(
				$array['id'],
				$array['name'],
				$array['password'],
				$array['email'],
				$array['firstName'],
				$array['lastName'],
				$array['registrationDate'],
				$array['registrationIp'],
				$array['connectionDate'],
				$array['connectionIp']
			);
		}

		/**
		 * @return mixed
		 */
		public function getId(){
			return $this->id;
		}

		/**
		 * @param mixed $id
		 */
		public function setId($id){
			$this->id = $id;
		}

		/**
		 * @return mixed
		 */
		public function getName(){
			return $this->name;
		}

		/**
		 * @param mixed $name
		 */
		public function setName($name){
			$this->name = $name;
		}

		/**
		 * @return mixed
		 */
		public function getPassword(){
			return $this->password;
		}

		/**
		 * @param mixed $password
		 */
		public function setPassword($password){
			$this->password = $password;
		}

		/**
		 * @return mixed
		 */
		public function getEmail(){
			return $this->email;
		}

		/**
		 * @param mixed $email
		 */
		public function setEmail($email){
			$this->email = $email;
		}

		/**
		 * @return mixed
		 */
		public function getFirstName(){
			return $this->firstName;
		}

		/**
		 * @param mixed $firstName
		 */
		public function setFirstName($firstName){
			$this->firstName = $firstName;
		}

		/**
		 * @return mixed
		 */
		public function getLastName(){
			return $this->lastName;
		}

		/**
		 * @param mixed $lastName
		 */
		public function setLastName($lastName){
			$this->lastName = $lastName;
		}

		/**
		 * @return mixed
		 */
		public function getRegistrationDate(){
			return $this->registrationDate;
		}

		/**
		 * @param mixed $registrationDate
		 */
		public function setRegistrationDate($registrationDate){
			$this->registrationDate = $registrationDate;
		}

		/**
		 * @return mixed
		 */
		public function getRegistrationIp(){
			return $this->registrationIp;
		}

		/**
		 * @param mixed $registrationIp
		 */
		public function setRegistrationIp($registrationIp){
			$this->registrationIp = $registrationIp;
		}

		/**
		 * @return mixed
		 */
		public function getConnectionDate(){
			return $this->connectionDate;
		}

		/**
		 * @param mixed $connectionDate
		 */
		public function setConnectionDate($connectionDate){
			$this->connectionDate = $connectionDate;
		}

		/**
		 * @return mixed
		 */
		public function getConnectionIp(){
			return $this->connectionIp;
		}

		/**
		 * @param mixed $connectionIp
		 */
		public function setConnectionIp($connectionIp){
			$this->connectionIp = $connectionIp;
		}
	}