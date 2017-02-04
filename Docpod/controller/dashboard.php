<?php

include_once "model/class.php";
//include_once "login.php";
$message = "";


If (isset($_SESSION["username"]) && isset ($_SESSION["user_id"]) && isset ($_SESSION["statut"])){
// TRANSFORMER UN ID RECUPERER LORS DU LOGIN POUR FAIRE RECHERCHE RAPIDEMENT (GET_USER_BY_ID)

	$id = $_SESSION["user_id"];
	$pdo = connect_db::connexion();
	$stmt = "SELECT Username, Email FROM users WHERE User_Id = $id";
	$request = $pdo->prepare($stmt);
	$request->execute();
	$result = $request->Fetch();

	$message = "Bienvenue sur votre page personnelle, " . $result["Username"];

// AJOUTER LISTE DES DERNIERS EPISODES PUBLIES SELON PREFERENCES USER
//	$derniers_episodes = Requete::derniers_Episodes();


} else {
	$message = "Veuillez vous identifier pour accéder à votre page personnelle. <br>Si vous ne possédez pas de compte utilisateur, vous pouvez <a href='newuser.php'>en créer un</a>.";
}



include_once "view/dashboard.php";