<?php require_once "menubar.html" ?>
<head>
	<title>Page d'administration</title>
</head>
<body>


<?php 
		If(isset($_GET["action"])){
			$action = $_GET["action"];
			switch ($action) {
				case 'indexation':
					include "model/insert_episode.php";
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
			$message .= "<ul><li><a href='index.php?p=admin&action=indexation'>Indexer un épisode</a></li>";
			$message .= "<li><a href='index.php?p=admin&action=update'>Mettre à jour des informations déjà entrées en bd</a></li>";
			$message .= "<li><a href='index.php?p=admin&action=catalo'>Catalographier des épisodes</a></li></ul>";
		}
		echo $message
			?>


<?php require_once "footer.php" ?>


<!--
AJOUTER DES DOCUMENTS RELATIFS A LA CATALO ETC EN FOOTER
-->