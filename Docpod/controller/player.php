<?php

require_once "model/class.php";

$info = "";
$liste = "";
$play = "";

// VERIFICATION QUE L'URL RENVOIE UNE INFO
If (!empty($_GET)){

	// 3 CHOIX : SOIT EDITEUR, SOIT EMISSION, SOIT EPISODE

	// -> ICI POUR EDITEUR ==>> A MODIFIER POUR PASSER VIA REQUETE editeur_By_Id()
	If (isset($_GET["editeur_id"])){

		$id = $_GET["editeur_id"];
		$editeur = new Editeur();
		$editeur->editeur_By_Id($id);


	//-> ICI POUR EMISSION

	} elseif(isset($_GET["emission_id"])){

		$id = $_GET['emission_id'];		
		$emission = Requete::emission_By_Id($id);
		$info = $emission->info_Emission();
		$play = $emission->play_Emission();

 
		//->ICI POUR EPISODE

	} elseif(isset($_GET["episode_id"])){
		$id = $_GET['episode_id'];
		$episode = Requete::episode_By_Id($id);
		$info = $episode->info_Episode();
		$play = $episode->play_Episode();

	}

		//Renvoi vers la page d'affichage

include_once "view/player.php";

} else {
	include_once "search.php";
}
?>