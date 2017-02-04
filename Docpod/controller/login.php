<?php
session_start();

require_once "model/class.php";

$olduser = "";
$message = "";


If ((!isset($_SESSION['username'])) || (empty($_SESSION['username']))){


	If(isset($_POST["username"]) && isset($_POST["mdp"])) {

		$olduser = $_POST["username"];
		$username_canonical = htmlspecialchars(strtolower($_POST["username"]));
		$password = md5($_POST["mdp"]);

//MODIFIER POUR QU'UN MESSAGE D'ERREUR APPARAISSE SI LE PASSWORD EST FAUX
		$user = Requete::check_User_Login($username_canonical, $password);

		$_SESSION["username"] = $user->GetUsername();
		$_SESSION["user_id"] = $user->GetUser_Id();
		$_SESSION["statut"] = $user->GetStatut();
		header("Refresh:0");

	} else {
				$message = "Nouvel utilisateur ? <a href='newuser.php'>Enregistrez-vous !</a>";
	}
	
} elseif (isset($_SESSION)) {

	$message = "Vous êtes connecté avec cet identifiant :  <b>" . ucfirst($_SESSION["username"]) . "</b>";

}

If(isset($_POST["deconnexion"])){
	session_unset();
	session_destroy();
	header("Refresh:0");
}

require_once "view/login.php";

//$message = "<h1 style = \"color: red;\">ERREUR</h1>" . "<br />" . "Vous avez entré un nom d'utilisateur et/ou un mot de passe non correct(s)." . "<br />" . "Merci de recharger cette page pour introduire vos informations valides";
