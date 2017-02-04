<?php

/*
INFORMATIONS A VOIR SUR LA HOMEPAGE :
- Titre
- Présentation App
- Suggestion aléatoire
- Affichage des derniers épisodes publiés
- Index
- Barre de recherche simple
*/

include_once "controller/login.php";
?>

<!DOCTYPE html>
<html>
<head>

	<title>DocPod - Page d'Accueil</title>
</head>
<body>
	<h1>Bienvenue sur la page d'accueil de DOCPOD</h1>
	
	<h3>Présentation de DocPod</h3>

		<p>Bienvenue sur l'application DocPod. Destinée à satisfaire les besoins documentaires liés au podcasting, DocPod est l'application de référence qui répertorie, valorise et documente les nombreux podcasts publiés à travers le monde.</p>

		<p>Si vous souhaitez vous informer sur les podcasts et leur univers, n'hésitez pas à vous rendre sur notre page <b><i><a href="index.php?p=infocast">Infocast</a></i></b>, dédiée à ce format.</p>

	<h3>Index du site</h3>

	<p>Sur ce site, vous pouvez : </p>

	<ul>
		<li><i><a href="index.php?p=repository">Consulter les podcasts de notre base de données par catégories</a></i></li>
		<li><i><a href="index.php?p=search">Chercher une émission ou un épisode par mots-clés</a></i></li>
	</ul>


	<h3>Effectuer une recherche simple</h3>
		<p>Vous êtes impatient ? Essayer notre base de donnée sans attendre !</p>

		<form action="index.php?p=search" method="POST">
			<p><input type="text" name="simple" placeholder="Faites une recherche simple"></p>
			<p><input type="submit" name="send" value="Chercher"></p>		
		</form>


</body>
<?php 
//include "lastepisode.php";
include_once "footer.php" 
?>
</html>