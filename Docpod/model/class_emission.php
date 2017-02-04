<?php

require_once "connect_db.php";

// Définition de la classe Emission, de ses paramètres et méthodes
Class Emission {

	private $Id_Emi;
	private $Titre_Emi;
	private $Flux_Emi;
	private $Description_Emi;
	private $Site_Emi;
	private $FK_Aut_Emi;
	private $FK_Cat_Emi;
	private $FK_Ed_Emi;
	private $FK_Type_Emi;
	private $FK_Kw_Emi;


	public function __construct($Id_Emi = NULL, $Titre_Emi = NULL, $Flux_Emi = NULL, $Description_Emi = NULL, $Site_Emi = Null, $FK_Aut_Emi = NULL, $FK_Cat_Emi = NULL, $FK_Ed_Emi = NULL, $FK_Type_Emi = NULL, $FK_Kw_Emi = NULL){

		$this->Id_Emi = $Id_Emi;
		$this->Titre_Emi = $Titre_Emi;
		$this->Flux_Emi = $Flux_Emi;
		$this->Description_Emi = $Description_Emi;
		$this->Site_Emi = $Site_Emi;
		$this->FK_Aut_Emi = $FK_Aut_Emi;
		$this->FK_Cat_Emi = $FK_Cat_Emi;
		$this->FK_Ed_Emi = $FK_Ed_Emi;
		$this->FK_Type_Emi = $FK_Type_Emi;
		$this->FK_Kw_Emi = $FK_Kw_Emi;

	}

	public function emission_By_Id($id){

		$pdo = connect_db::connexion();
		$stmt = "SELECT * FROM emissions WHERE Id_Emi = :Id_Emi";
		$request = $pdo->prepare($stmt);
		$request->execute(array(
			":Id_Emi" => htmlspecialchars($id)
			));

		$result = $request->fetch();


		$this->Id_Emi = $result["Id_Emi"];
		$this->Titre_Emi = $result["Titre_Emi"];
		$this->Flux_Emi = $result["Flux_Emi"];
		$this->Description_Emi = $result["Description_Emi"];
		$this->Site_Emi = $result["Site_Emi"];
		$this->FK_Aut_Emi = $result["FK_Aut_Emi"];
		$this->FK_Cat_Emi = $result["FK_Cat_Emi"];
		$this->FK_Ed_Emi = $result["FK_Ed_Emi"];
		$this->FK_Type_Emi = $result["FK_Type_Emi"];
		$this->FK_Kw_Emi = $result["FK_Kw_Emi"];

	}

	public function insert_Emission(){

		try{

			$pdo = connect_db::connexion();

			$stmt = "INSERT INTO emissions (Titre_Emi, Flux_Emi, Description_Emi, Site_Emi, FK_Aut_Emi, FK_Cat_Emi, FK_Ed_Emi, FK_Type_Emi, FK_Kw_Emi) VALUES(:Titre_Emi, :Flux_Emi, :Description_Emi, :Site_Emi, :FK_Aut_Emi, :FK_Cat_Emi, :FK_Ed_Emi, :FK_Type_Emi, :FK_Kw_Emi)";
			$request = $pdo->prepare($stmt);
			$request->execute(array(

					":Titre_Emi" => $this->Titre_Emi,
					":Flux_Emi" => $this->Flux_Emi,
					":Description_Emi" => $this->Description_Emi,
					":Site_Emi" => $this->Site_Emi,
					":FK_Aut_Emi" => $this->FK_Aut_Emi,
					":FK_Cat_Emi" => $this->FK_Cat_Emi,
					":FK_Ed_Emi" => $this->FK_Ed_Emi,
					":FK_Type_Emi" => $this->FK_Type_Emi,
					":FK_Kw_Emi" => $this->FK_Kw_Emi
				));
		} catch (Exception $e){

			echo $e;

			exit;
		}

		$message_insert_emission = "Les données suivantes ont été correctement encodées : ";
		$message_insert_emission .= "<p>Titre de l'émission : $this->Titre_Emi</p>";
		$message_insert_emission .= "<p>Flux de l'émission : $this->Flux_Emi</p>";
		$message_insert_emission .= "<p>Description de l'émission : $this->Description_Emi</p>";
		$message_insert_emission .= "<p>Site web de l'émission : $this->Site_Emi</p>";
		$message_insert_emission .= "<p>Intervenant(s) : $this->FK_Aut_Emi</p>";		
		$message_insert_emission .= "<p>Catégorie de l'émission : $this->FK_Cat_Emi</p>";		
		$message_insert_emission .= "<p>Editeur de l'émission : $this->FK_Ed_Emi</p>";
		$message_insert_emission .= "<p>Type d'émission : $this->FK_Type_Emi</p>";
		$message_insert_emission .= "<p>Mots-clés émission : $this->FK_Kw_Emi</p>";

		return $message_insert_emission;
	}

	public function play_Emission(){

		// Lecture du fichier xml
		$flux = $this->Flux_Emi;
		$rss = simplexml_load_file($flux);

		$titrerss = "<b><u>" . $rss->channel->title . "</b></u>";
		$imagerss = $rss->channel->image->url;
		$descriptionrss = $rss->channel->description;

		$texte = "Derniers podcasts de l'émission : " . $titrerss . "</br><img src='$imagerss' alt='$titrerss' height='200' width='200'>";
		$texte .= "</br>" . $descriptionrss;
		$texte .= "<p>Pour voir les détails d'un épisode, cliquez sur son titre.</p>";

		// Affichage des dix derniers épisodes du flux
		$i=0;
		$texte .= '<ul>';
		foreach ($rss->channel->item as $item){
			$i++;
			$datetime = date_create($item->pubDate);
			$date = date_format($datetime, 'd M Y, H\hi');
			$url = $item->enclosure["url"];
			$titreepi = $item->title;
			$stmt = "SELECT Id_Epi FROM episodes WHERE Url_Epi = '$url'";
			$pdo = connect_db::connexion();
			$request = $pdo->prepare($stmt);
			$request->execute();
			$result = $request->fetch();
			$epiid = $result["Id_Epi"];


			$texte .= "</br><li> <a href='index.php?p=player&episode_id=$epiid'>$titreepi</a></br> <audio controls='controls' preload='metadata'><source src='" . $url ."' type='audio/mp3' /> </audio>" . "</br> Publication : " . $date . "</br></li>";
			IF($i > 9) {
				break;
			}
		}
		$texte .= '</ul>';
		return $texte;
	}

	public function info_Emission(){

		$info = "<p>Titre : " . $this->Titre_Emi . "</p>";
		$info .= "<p>Description : " . $this->Description_Emi . "</p>";
		$info .= "<p>Site web de l'émission : " . $this->Site_Emi . "</p>";
		$info .= "<p><a href='index.php?p=info&emission_id=$this->Id_Emi'>Plus d'informations sur l'émission</a></p>";

		return $info;
 
/*		"Informations sur l'émission : </br><ul><li>Titre : " . $this->Titre_Emi . "</li><li>Auteurs : <a href='search.php?q=$this->FK_Aut_Emi'>$this->FK_Aut_Emi</a></li><li>Description : " . $this->Description_Emi . "</li><li>Flux rss : " . $this->Flux_Emi . "</li><li>Site web : <a href='" . $this->Site_Emi ."'>" . $this->Site_Emi . "</a></li><li>Catégorie : <a href=searchcat.php?q=$this->FK_Cat_Emi>$this->FK_Cat_Emi</a></li><li><a href='player.php?editeur_id=$this->FK_Ed_Emi'>Voir plus de cet éditeur</a></li>";
*/
	}

	public function info_Complete_Emission(){

		$info = "<h3>Informations sur l'émission '" . $this->Titre_Emi . "'</h3>";
		$info .= "<p>Titre : " . $this->Titre_Emi . "</p>";
		$info .= "<p>Description : " . $this->Description_Emi . "</p>";
		$info .= "<p>Flux RSS : " . $this->Flux_Emi . "</p>";
		$info .= "<p>Site web de l'émission : " . $this->Site_Emi . "</p>";
		$info .= "<p>Editeur/chaine : " . $this->FK_Ed_Emi . "</p>";
		$info .= "<p>Intervenant : " . $this->FK_Aut_Emi . "</p>";
		$info .= "<p>Catégorie : " . $this->FK_Cat_Emi . "</p>";
		$info .= "<p>Type d'émission : " . $this->FK_Type_Emi . "</p>";
		$info .= "<p>Terme(s) descripteur(s) : " . $this->FK_Kw_Emi . "</p>";
		$info .= "<p><a href='index.php?p=player&emission_id=$this->Id_Emi'>Consulter les épisodes</a></p>";

		return $info;
	}


}
