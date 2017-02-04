<?php

$message = "";

If(isset($_SESSION)){

	If(isset($_SESSION["statut"]) && $_SESSION["statut"] == "Admin"){

		If(isset($_GET["action"])){
			$action = $_GET["action"];
			switch ($action) {
				case 'ajoutdb':
					include "controller/ajoutdb.php";
					break;

				case 'update':
					include "controller/update.php";
					break;

				case 'catalo':
					include "controller/catalo.php";
					break;
				
				default:
					include 'controller/admin.php';
					break;
			}
		} else {

			$message = "<h2>Bienvenue sur la page d'administration.</h2>";
			$message .= "<p>Attention, les actions que vous effectuerez ici auront des répercussions sur l'ensemble de l'application. Veillez donc à réfléchir à deux fois avant de faire des modifications !</p>";
			$message .= "<h3>Que souhaitez-vous faire ?</h3>";
			$message .= "<ul><li><a href='index.php?p=admin&action=ajoutdb'>Ajouter des entrées dans la base de données (éditeurs, émissions et épisodes)</a></li>";
			$message .= "<li><a href='index.php?p=admin&action=update'>Mettre à jour des informations déjà entrées en bd</a></li>";
			$message .= "<li><a href='index.php?p=admin&action=catalo'>Catalographier des épisodes</a></li></ul>";
		}


	} else {

		$message = "Désolé, vous devez avoir un statut administrateur pour accéder à cette page."; 
	}


} else {
	$message = "Désolé, vous devez être connecté avec un statut administrateur pour accéder à cette page."; 
}

require_once "view/admin.php";
?>