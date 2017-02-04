<?php

require_once "model/class_messagechat.php";

$pseudo="";
If (isset($_SESSION["username"])){
	$pseudo = htmlspecialchars($_SESSION["username"]);
}

If(isset($_POST["message"])){
	$message = htmlspecialchars($_POST["message"]);

		If($_POST["pseudo"] != NULL){
			$pseudo = htmlspecialchars($_POST["pseudo"]);
		} else {
			$pseudo = "Anonyme";
		}

	$messagechat = new Messagechat($pseudo, $message);
	$messagechat->insert_Message($id);

}

require_once "view/minichat.php";

?>





