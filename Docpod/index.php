<?php

require_once "model/class.php";
require_once "controller/login.php";

if (!empty($_GET)){
	if (isset ($_GET["p"])){
		$page = ($_GET["p"]);
		switch($page){
			case "homepage":
				include "homepage.php";
				break;

			case "dashboard":
				include "controller/dashboard.php";
				break;

			case "infocast":
				include "view/infocast.php";
				break;

			case "info":
				include "controller/info.php";
				break;

			case "player":
				include "controller/player.php";
				break;

			case "search":
				include "controller/search.php";
				break;

			case "repository":
				include "controller/repository.php";
				break;

			case "about" :
				include "view/about.php";
				break;

			case "admin" :
				include "controller/admin.php";
				break;


			default : 
				include "homepage.php";
				break;

			}
	}
}  else {
		include "homepage.php";
	}

require_once "footer.php";
?>