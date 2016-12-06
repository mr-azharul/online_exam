<?php

	spl_autoload_register(function($class) {
		include_once "system/libs/".$class.".php";
	});
	
	include_once "app/config/config.php";

	$url = isset($_GET['url']) ? $_GET['url'] : NULL;
	if($url != NULL){
		$url = rtrim($url,"/");
		$url = explode("/", filter_var($url,FILTER_SANITIZE_URL)); //sanitize the url
	} else {
	 unset($url);
	}

	if(isset($url[0])) {
		include_once 'app/controllers/'.$url[0].'.php';
		$ctrl = new $url[0](); //for detect controller
		if (isset($url[2])) {
		$ctrl -> $url[1]($url[2]); //for method and parameter detect
		}else{

			if(isset($url[1])){
				$ctrl->$url[1](); //for method detect
			}
		}
	} else{
		include_once 'app/controllers/Index.php';

		$ctrl = new Index();
		$ctrl->home();
	}

?>