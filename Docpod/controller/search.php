<?php

//require_once "login.php";
require_once "model/class.php";

$oldsearch = "";
$oldtitle = "";
$oldediteur = "";
$oldintervenant = "";
$oldate = "";
$oldkeyword = "";
$oldcategorie = "";
$oldtype = "";
$message="";
$resultsimple = "";
$resultat_simple_emission = "";
$resultat_simple_episode = "";
$resultat_simple_editeur = "";
$resultat_auteur = "";
$resultat_kw = "";
$resultat_categorie = "";
$resultat_type = "";

$nb_entrees_db = Requete::nb_Entrees_Db();

If (!empty($_POST)){


	If (isset ($_POST["simple"])){
		$terme_simple = htmlspecialchars($_POST["simple"]);
		$oldsearch = $terme_simple;


		// REQUETE SIMPLE SUR EDITEURS, EMISSIONS ET EPISODES
		$resultat_simple_editeur = Requete::recherche_Fulltext_Editeur($terme_simple);
		$resultat_simple_emission = Requete::recherche_Fulltext_Emission($terme_simple);
		$resultat_simple_episode = Requete::recherche_Fulltext_Episode($terme_simple);
		require_once "view/search.php";		
		
	}

		// REQUETE AVANCEE SUR EDITEURS, EMISSIONS, EPISODES, VEDETES...
	If (isset ($_POST["avance"])){
		$message = "Vous avez effectué une recherche avancée.";


		If (!empty ($_POST["intervenant"])){
			$oldintervenant = $_POST["intervenant"];
			$terme_avance = htmlspecialchars($_POST["intervenant"]);
			$resultat_auteur = Requete::recherche_Auteurs($terme_avance);

		}

		If (!empty($_POST["keyword"])){
			$oldkeyword = $_POST["keyword"];
			$terme_avancee = htmlspecialchars($_POST["keyword"]);
			$resultat_kw = Requete::recherche_Mots_Cles($terme_avance);
		}

		IF (!empty($_POST["categorie"])){
			$oldcategorie = $_POST["categorie"];
			$terme_avance = htmlspecialchars($_POST["categorie"]);
			$resultat_categorie = Requete::recherche_Categories($terme_avance);
		}

		If (!empty($_POST["type"])){
			$oldtype = $_POST["type"];
			$terme_avance = htmlspecialchars($_POST["categorie"]);
			$resultat_type = Requete::recherche_Types($terme_avance);
		}

		require_once "view/search.php";

	} else{
	$message = "Effectuer une recherche sur cette page.";
	}
} else include "view/search.php";


?>