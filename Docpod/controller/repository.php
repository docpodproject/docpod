<?php
// PAGE POUR CONSULTER LA LISTE DES DIFFERENTS EDITEURS, EMISSIONS, MOTS-CLES ET CATEGORIES
require_once "model/class.php";
$message = "";
$liste = "";
IF (isset($_GET["type"])){
	$type = $_GET["type"];
		switch ($type) {
			case 'editeurs' :
				$message = "<h3>Liste des éditeurs/chaînes</h3>";
				$message .= Requete::consult_Editeurs();
				break;

			case 'emissions' :
				$message = "<h3>Liste des émissions</h3>";
				$message .= Requete::consult_Emissions();
				break;

			case 'thesaurus' :
				$message = "<h3>Liste des mots-clés</h3>";
				$message .= Requete::consult_Thesaurus();
				break;

			case 'categories' :
				$message = "<h3>Liste des catégories</h3>";
				$message .= Requete::consult_Categories();
				break;

			case 'typo' :
				$message  = "<h3>Liste des types d'émissions/épisodes</h3>";
				$message .= Requete::consult_Typo();
				break;

			case 'auteurs' :
				$message = "<h3>Liste des intervenants</h3>";
				$message .= Requete::consult_Auteurs();
				break;

			default:
				include 'controller/repository.php';
				break;
	}

} else {

	$message = "Que souhaitez-vous consulter ?";
	$message .= "<ul>";
	$message .= "<li><a href='index.php?p=repository&type=editeurs'>Consulter la liste des éditeurs</a></li>";
	$message .= "<li><a href='index.php?p=repository&type=emissions'>Consulter la liste des émissions</a></li>";
	$message .= "<li><a href='index.php?p=repository&type=thesaurus'>Consulter la liste des mots-clés (thésaurus)</a></li>";
	$message .= "<li><a href='index.php?p=repository&type=categories'>Consulter la liste des catégories</a></li>";
	$message .= "<li><a href='index.php?p=repository&type=typo'>Consulter la typologie de podcasts</a></li>";
	$message .= "<li><a href='index.php?p=repository&type=auteurs'>Consulter la liste des intervenants recensés</a></li>";
	$message .= "</ul>";
}



require_once "view/repository.php";
