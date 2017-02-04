<?php

IF(isset($_SESSION) && $_SESSION["statut"] == "Admin"){

	IF(isset($_POST["Titre_Emi"])){

	// ATTENTION, TROUVER SOLUTION SI TOUT N'EST PAS REMPLI !!!
		$Titre_Emi = $_POST["Titre_Emi"];
		$Flux_Emi = $_POST["Flux_Emi"];
		$Description_Emi = $_POST["Description_Emi"];
		$Site_Emi = $_POST["Site_Emi"];
		$FK_Aut_Emi = $_POST["FK_Aut_Emi"];
		$FK_Cat_Emi = $_POST["FK_Cat_Emi"];
		$FK_Ed_Emi = $_POST["FK_Ed_Emi"];
		$FK_Type_Emi = $_POST["FK_Type_Emi"];
		$FK_Kw_Emi = $_POST["FK_Kw_Emi"];

		$emission = new Emission("", $Titre_Emi, $Flux_Emi, $Description_Emi, $Site_Emi, $FK_Aut_Emi, $FK_Cat_Emi, $FK_Ed_Emi, $FK_Type_Emi, $FK_Kw_Emi);
		$emission->insert_Emission();

	} else {
	?>
	<!DOCTYPE html>
	<html>
	<body>

	<h3>Insertion d'une émission dans la base de données</h3>
	<p>Attention, les entrées mal référencées ou pour lesquelles des informations sont manquantes peuvent ne pas apparaîtres dans les résultats des recherches !</p>

	<form action="" method="POST">

		<p>Titre de l'émission : <input type="text" name="Titre_Emi" placeholder="Titre émission" required autofocus></p>
		<p>Flux RSS de l'émission : <input type="text" name="Flux_Emi" placeholder="Flux RSS" required></p>
		<p>Description de l'émission (cf. bonnes pratiques de description) : <input type="text" name="Description_Emi" placeholder="Description"></p>
		<p>Site web de l'émission : <input type="text" name="Site_Emi" placeholder="Site web"></p>
		<p>Intervenants : <input type="text" name="FK_Aut_Emi" placeholder="Intervenants"></p>
		<p>Catégories : <input type="text" name="FK_Cat_Emi" placeholder="Catégorie"></p>
		<p>Nom de l'éditeur : <input type="text" name="FK_Ed_Emi" placeholder="Editeur"></p>
		<p>Type d'émission (cf. vocabulaire contrôlé) : <input type="text" name="FK_Type_Emi" placeholder="Type d'émission"></p>
		<p>Mots-clés (cf. vocabulaire contrôlé) : <input type="text" name="FK_Kw_Emi" placeholder="Mots-clés"></p>
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

