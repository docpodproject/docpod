<?php
IF(isset($_SESSION) && $_SESSION["statut"] == "Admin"){

	If(isset($_POST["Nom_Ed"])){

	// ATTENTION, TROUVER SOLUTION SI TOUT N'EST PAS REMPLI !!!
		
		$Nom_Ed = $_POST["Nom_Ed"];
		$Type_Ed = $_POST["Type_Ed"];
		$Description_Ed = $_POST["Description_Ed"];
		$Site_Ed = $_POST["Site_Ed"];

		$editeur = new editeur($Nom_Ed, $Type_Ed, $Description_Ed, $Site_Ed);
		echo $editeur->insert_Editeur();
		
	} else {

	?>
	<!DOCTYPE html>
	<html>
	<body>

	<h3>Insertion d'un éditeur dans la base de données</h3>
	<p>Attention, les entrées mal référencées ou pour lesquelles des informations sont manquantes peuvent ne pas apparaîtres dans les résultats des recherches !</p>

	<form action="" method="POST">

		<p>Nom de l'éditeur : <input type="text" name="Nom_Ed" placeholder="Nom éditeur" required autofocus></p>
		<p>Type d'éditeur (cf. vocabulaire contrôlé) : <input type="text" name="Type_Ed" placeholder="Type d'éditeur"></p>
		<p>Description de l'éditeur (cf. bonnes pratiques de description) : <input type="text" name="Description_Ed" placeholder="Description"></p>
		<p>Site web de l'éditeur : <input type="text" name="Site_Ed" placeholder="Site web"></p>
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
