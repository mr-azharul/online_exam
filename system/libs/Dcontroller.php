<?php

	/**
	*  Dcontroller
	*/
	class Dcontroller {
		
		protected $load = array();

		public function __construct() {
			$this->load = new Load();
		}
	}

?>