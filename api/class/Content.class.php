<?php
	/**
	 * Project: Zest-Writer-Site
	 * zest-writer-site Copyright© 2016 Kevin Vuilleumier
	 */

	require_once __DIR__.'/../../config.php';

	class Content{
		const Plugin = "plugins";
		const Theme = "themes";

		private $type;
		private $id;
		private $user;
		private $official;
		private $validate;
		private $name;
		private $url_id;
		private $description;
		private $version;
		private $downloads;
		private $removed;
		private $download_url;

		/**
		 * Content constructor.
		 */
		public function __construct(){
		}

		/**
		 * Content setter.
		 *
		 * @param $id
		 * @param $user
		 * @param $official
		 * @param $validate
		 * @param $name
		 * @param $url_id
		 * @param $description
		 * @param $version
		 * @param $downloads
		 * @param $removed
		 */
		public function setContent($id, $user, $official, $validate, $name, $url_id, $description, $version, $downloads, $removed){
			$this->id = $id;
			$this->user = $user;
			$this->official = $official;
			$this->validate = $validate;
			$this->name = $name;
			$this->url_id = $url_id;
			$this->description = $description;
			$this->version = $version;
			$this->downloads = $downloads;
			$this->removed = $removed;
			$this->download_url = PROTOCOL.$_SERVER['HTTP_HOST'].URI.'api/'.$this->getTypeSingular().'/download/'.$this->url_id;
		}

		/**
		 * @param $array
		 */
		public function setContentArray($array){
			$this->setContent(
				$array['id'],
				$array['user'],
				$array['official'],
				$array['validate'],
				$array['name'],
				$array['url_id'],
				$array['description'],
				$array['version'],
				$array['downloads'],
				$array['removed']
			);
		}

		/**
		 * @return array
		 */
		public function getArray(){
			return [
				'id' => filter_var($this->id, FILTER_VALIDATE_INT),
				'user' => filter_var($this->user, FILTER_VALIDATE_INT),
				'official' => filter_var($this->official, FILTER_VALIDATE_BOOLEAN),
				'validate' => filter_var($this->validate, FILTER_VALIDATE_BOOLEAN),
				'name' => $this->name,
				'url_id' => $this->url_id,
				'description' => $this->description,
				'version' => $this->version,
				'downloads' => filter_var($this->downloads, FILTER_VALIDATE_INT),
				'removed' => filter_var($this->removed, FILTER_VALIDATE_BOOLEAN),
				'download_url' => $this->download_url,
			];
		}

		/**
		 * @param $content
		 * @param $apiDatabase ApiDatabase
		 */
		public function increaseDownload($content, $apiDatabase){
			$apiDatabase->increaseDownload($content, $this->id);
		}

		/**
		 * @return mixed
		 */
		public function getTypePlural(){
			if($this->type == Content::Plugin)
				return "plugins";
			else if($this->type == Content::Theme)
				return "themes";
			else
				return null;
		}

		/**
		 * @return mixed
		 */
		public function getTypeSingular(){
			if($this->type == Content::Plugin)
				return "plugin";
			else if($this->type == Content::Theme)
				return "theme";
			else
				return null;
		}

		/**
		 * @param mixed $type
		 */
		public function setType($type){
			$this->type = $type;
			$this->download_url = PROTOCOL.$_SERVER['HTTP_HOST'].URI.'api/'.$this->getTypeSingular().'/download/'.$this->url_id;
		}

		/**
		 * @return mixed
		 */
		public function getId(){
			return filter_var($this->id, FILTER_VALIDATE_INT);
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
		public function getUser(){
			return filter_var($this->user, FILTER_VALIDATE_INT);
		}

		/**
		 * @param mixed $user
		 */
		public function setUser($user){
			$this->user = $user;
		}

		/**
		 * @return mixed
		 */
		public function getOfficial(){
			return filter_var($this->official, FILTER_VALIDATE_BOOLEAN);
		}

		/**
		 * @param mixed $official
		 */
		public function setOfficial($official){
			$this->official = $official;
		}

		/**
		 * @return mixed
		 */
		public function getValidate(){
			return filter_var($this->validate, FILTER_VALIDATE_BOOLEAN);
		}

		/**
		 * @param mixed $validate
		 */
		public function setValidate($validate){
			$this->validate = $validate;
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
		public function getUrlId(){
			return $this->url_id;
		}

		/**
		 * @param mixed $url_id
		 */
		public function setUrlId($url_id){
			$this->url_id = $url_id;
		}

		/**
		 * @return mixed
		 */
		public function getDescription(){
			return $this->description;
		}

		/**
		 * @param mixed $description
		 */
		public function setDescription($description){
			$this->description = $description;
		}

		/**
		 * @return mixed
		 */
		public function getVersion(){
			return $this->version;
		}

		/**
		 * @param mixed $version
		 */
		public function setVersion($version){
			$this->version = $version;
		}

		/**
		 * @return mixed
		 */
		public function getDownloads(){
			return filter_var($this->downloads, FILTER_VALIDATE_INT);
		}

		/**
		 * @param mixed $downloads
		 */
		public function setDownloads($downloads){
			$this->downloads = $downloads;
		}

		/**
		 * @return mixed
		 */
		public function getRemoved(){
			return filter_var($this->removed, FILTER_VALIDATE_BOOLEAN);
		}

		/**
		 * @param mixed $removed
		 */
		public function setRemoved($removed){
			$this->removed = $removed;
		}

		/**
		 * @return mixed
		 */
		public function getDownloadUrl()
		{
			return filter_var($this->download_url, FILTER_VALIDATE_URL);
		}

		/**
		 * @param mixed $download_url
		 */
		public function setDownloadUrl($download_url)
		{
			$this->download_url = $download_url;
		}
	}