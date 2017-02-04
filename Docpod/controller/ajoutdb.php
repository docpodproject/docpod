<?php

// PAGE POUR AJOUTER DES ENTREES DANS LA DB (EDITEURS, EMISSIONS, EPISODES)
$message_ajoutdb = "";

If(isset($_SESSION["statut"]) && $_SESSION["statut"] == "Admin"){
	If(isset($_GET["type"])){

		IF(isset($_GET["type"])){
		$type = $_GET["type"];
			switch ($type) {
				case 'editeur':
					include "model/insert_editeur.php";
					break;

				case 'emission':
					include "model/insert_emission.php";
					break;

				case 'episode':
					include "model/insert_episode.php";
					break;
				
				default:
					header('controller/admin.php');
					break;
			}


		}

	} else {

$message_ajoutdb = "<p>Quels informations souhaitez-vous ajouter à la db ?<p>";
$message_ajoutdb .= "<ul><li><a href='index.php?p=admin&action=ajoutdb&type=editeur'>Un éditeur</a></li>";
$message_ajoutdb .= "<li><a href='index.php?p=admin&action=ajoutdb&type=emission'>Une émission</a></li>";
$message_ajoutdb .= "<li><a href='index.php?p=admin&action=ajoutdb&type=episode'>Un épisode</a></li></ul>";
	}


} else{
	header ("index.php?p=homepage");
}

require_once "view/ajoutdb.php";
?>