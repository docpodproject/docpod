<?php
IF(isset($_SESSION) && $_SESSION["statut"] == "Admin"){

	IF(isset($_POST["Titre_Epi"])){

	// ATTENTION, TROUVER SOLUTION SI TOUT N'EST PAS REMPLI !!!

		$Titre_Epi = $_POST["Titre_Emi"];
		$Duree_Epi = $_POST["Duree_Epi"]; // TROUVER UN MOYEN DE LE FAIRE AUTOMATIQUEMENT !!!
		$Date_Pub_Epi = $_POST["Date_Pub_Epi"]; // IDEM
		$Url_Epi = $_POST["Url_Epi"];
		$Description_Epi = $_POST["Description_Epi"];
		$FK_Aut_Epi = $_POST["FK_Aut_Epi"];
		$FK_Cat_Epi = $_POST["FK_Cat_Epi"];
		$FK_Emi_Epi = $_POST["FK_Emi_Epi"];
		$FK_Type_Epi = $_POST["FK_Type_Epi"];
		$FK_Kw_Epi = $_POST["FK_Kw_Epi"];


		$episode = new Episode("", $Titre_Epi, $Duree_Epi, $Date_Pub_Epi, $Url_Epi, $Description_Epi, $FK_Aut_Epi, $FK_Cat_Epi, $FK_Emi_Epi, $FK_Type_Epi, $FK_Kw_Epi);
		$episode->insert_Episode();

	} else {
	?>
	<!DOCTYPE html>
	<html>
	<body>

	<h3>Insertion d'un épisode dans la base de données</h3>
	<p>Attention, les entrées mal référencées ou pour lesquelles des informations sont manquantes peuvent ne pas apparaîtres dans les résultats des recherches !</p>

	<form action="" method="POST">

		<p>Titre de l'épisode : <input type="text" name="Titre_Epi" placeholder="Titre épisode" required autofocus></p>
		<p>Durée de l'épisode : <input type="" name="Duree_Epi" placeholder="Durée de l'épisode"></p>
		<p>Date de publication : <input type="date" name="Date_Pub_Epi" placeholder="YYYY-MM-DD"></p>
		<p>URL de l'épisode : <input type="text" name="Url_Epi" placeholder="URL" required></p>
		<p>Description de l'épisode(cf. bonnes pratiques de description) : <input type="text" name="Description_Epi" placeholder="Description"></p>
		<p>Intervenants : <input type="text" name="FK_Aut_Epi" placeholder="Intervenants"></p>
		<p>Catégorie : <input type="text" name="FK_Cat_Epi" placeholder="Catégorie"></p>
		<p>Nom de l'émission mère : <input type="text" name="FK_Emi_Epi" placeholder="Emission mère"></p>
		<p>Type d'épisode (cf. vocabulaire contrôlé) : <input type="text" name="FK_Type_Epi" placeholder="Type d'épisode"></p>
		<p>Mots-clés (cf. vocabulaire contrôlé) : <input type="text" name="FK_Kw_Epi" placeholder="Mots-clés"></p>
		<p><input type="submit" name="Envoyer" value="Envoyer"></p>

	</form>

	</body>
	</html>
<?php
	} 
} else{
	
	header("index.php?p=homepage");
}
?>

