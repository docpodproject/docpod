<?php
require_once "model/class.php";

$info = "";

If (isset($_GET["editeur_id"]) || isset($_GET["emission_id"]) || isset($_GET["episode_id"]) || isset($_GET["thesaurus_id"]) || isset($_GET["categorie_id"]) || isset($_GET["typo_id"]) || isset($_GET["auteur_id"])){

	If (isset($_GET["editeur_id"])){
		$id = $_GET["editeur_id"];
		$editeur = Requete::editeur_By_Id($id);
		$info = $editeur->info_Complete_Editeur();

	} elseif (isset($_GET["emission_id"])) {
		$id = $_GET["emission_id"];
		$emission = Requete::emission_By_Id($id);
		$info = $emission->info_Complete_Emission();


	} elseif (isset($_GET["episode_id"])) {
		$id = $_GET["episode_id"];
		$episode = Requete::episode_By_Id($id);
		$info = $episode->info_Complete_Episode();
	
	} elseif (isset($_GET["thesaurus_id"])) {
		$id = $_GET["thesaurus_id"];
		$thesaurus = Requete::thesaurus_By_Id($id);
		$info = $thesaurus->info_Complete_Thesaurus();


	} elseif (isset($_GET["categorie_id"])) {
		$id = $_GET["categorie_id"];
		$categorie = Requete::categorie_By_Id($id);
		$info = $categorie->consult_Categorie();


	} elseif (isset($_GET["typo_id"])) {
		$id = $_GET["typo_id"];
		$typo = Requete::typo_By_Id($id);
		$info = $typo->info_Complete_Typo();
	


	} elseif (isset($_GET["auteur_id"])) {
		$id = $_GET["auteur_id"];
		$auteur = Requete::auteur_By_Id($id);
		$info = $auteur->info_Complete_Auteur();


	}

} else {

	$info = "Il faut passer un paramètre dans l'url.";
}

require_once "view/info.php";
?>