<?php

	/**
	* Main Model
	*/
	class DModel {
		
		protected $db = array();

		public function __construct() {
			$dsn 	= 'mysql:dbname=exam; host=localhost';
			$user 	= "root";
			$pass 	= "";
			//$db 	= "db_mvc";
			$this->db = new Database($dsn, $user, $pass);
		}
	}

?>