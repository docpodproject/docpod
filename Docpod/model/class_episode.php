<?php

require_once "connect_db.php";

// Définition de la classe Episode, de ses paramètres et méthodes
Class Episode {

	private $Id_Epi;
	private $Titre_Epi;
	private $Duree_Epi;
	private $Date_Pub_Epi;
	private $Url_Epi;
	private $Description_Epi;
	private $FK_Aut_Epi;
	private $FK_Cat_Epi;
	private $FK_Emi_Epi;
	private $FK_Type_Epi;
	private $FK_Kw_Epi;

	public function __construct($Id_Epi = Null, $Titre_Epi=Null, $Duree_Epi=Null, $Date_Pub_Epi=Null, $Url_Epi=Null, $Description_Epi=Null, $FK_Aut_Epi=Null, $FK_Cat_Epi=Null, $FK_Emi_Epi=Null, $FK_Type_Epi=Null, $FK_Kw_Epi=Null){

		$this->Id_Epi = $Id_Epi;
		$this->Titre_Epi = $Titre_Epi;
		$this->Duree_Epi = $Duree_Epi;
		$this->Date_Pub_Epi = $Date_Pub_Epi;
		$this->Url_Epi = $Url_Epi;
		$this->Description_Epi = $Description_Epi;
		$this->FK_Aut_Epi = $FK_Aut_Epi;
		$this->FK_Cat_Epi = $FK_Cat_Epi;
		$this->FK_Emi_Epi =$FK_Emi_Epi;
		$this->FK_Type_Epi = $FK_Type_Epi;
		$this->FK_Kw_Epi = $FK_Kw_Epi;

	}

	public function getEpisodeTitre(){
		return $this->Titre_Epi;
	}
	
	public function getEpisodeUrl(){
		return $this->Url_Epi;
	}

	public function getEpisodeDescription(){
		return $this->Description_Epi;
	}

	
	public function episode_By_Id($id){
		$pdo = connect_db::connexion();
		$stmt = "SELECT * FROM episodes WHERE Id_Epi = :Id_Epi";
		$request = $pdo->prepare($stmt);
		$request->execute(array(
			":Id_Epi" => htmlspecialchars($id)
			));

		$result = $request->fetch();


		$this->Id_Epi = $result["Id_Epi"];
		$this->Titre_Epi = $result["Titre_Epi"];
		$this->Duree_Epi = $result["Duree_Epi"];
		$this->Date_Pub_Epi = $result["Date_Pub_Epi"];
		$this->Url_Epi = $result["Url_Epi"];
		$this->Description_Epi = $result["Description_Epi"];
		$this->FK_Aut_Epi = $result["FK_Aut_Epi"];
		$this->FK_Cat_Epi = $result["FK_Cat_Epi"];
		$this->FK_Emi_Epi = $result["FK_Emi_Epi"];
		$this->FK_Type_Epi = $result["FK_Type_Epi"];
		$this->FK_Kw_Epi = $result["FK_Kw_Epi"];

	}

	public function insert_Episode(){

		try{

		$pdo = connect_db::connexion();

		$stmt = "INSERT INTO episodes (Titre_Epi, Duree_Epi, Date_Pub_Epi, Url_Epi, Description_Epi, FK_Aut_Epi, FK_Cat_Epi, FK_Emi_Epi, FK_Type_Epi, FK_Kw_Epi) VALUES(:Titre_Epi, :Duree_Epi, :Date_Pub_Epi, :Url_Epi, :Description_Epi, :FK_Aut_Epi, :FK_Cat_Epi, :FK_Emi_Epi, :FK_Type_Epi, :FK_Kw_Epi)";
		$request = $pdo->prepare($stmt);
		$request->execute(array(

				":Titre_Epi" => $Titre_Epi,
				":Duree_Epi" => $Duree_Epi,
				":Date_Pub_Epi" => $Date_Pub_Epi,
				":Url_Epi" => $Url_Epi,
				":Description_Epi" => $Description_Epi,
				":FK_Aut_Epi" => $FK_Aut_Epi,
				":FK_Cat_Epi" => $FK_Cat_Epi,
				":FK_Emi_Epi" => $FK_Emi_Epi,
				":FK_Type_Epi" => $FK_Type_Epi,
				":FK_Kw_Epi" => $FK_Kw_Epi
			));

		}catch (Exception $e){

			echo $e;
			exit;
		}

		$message_insert_episode = "Les données suivantes ont été correctement encodées : ";
		$message_insert_episode .= "<p>Titre de l'épisode : $this->Titre_Epi</p>";
		$message_insert_episode .= "<p>Durée de l'épisode : $this->Duree_Epi</p>";
		$message_insert_episode .= "<p>Date de publication : $this->Date_Pub_Epi</p>";
		$message_insert_episode .= "<p>Url de l'épisode : $this->Url_Epi</p>";
		$message_insert_episode .= "<p>Description de l'épisode : $this->Description_Epi</p>";
		$message_insert_episode .= "<p>Intervenant(s) : $this->FK_Aut_Epi</p>";		
		$message_insert_episode .= "<p>Catégorie de l'épisode : $this->FK_Cat_Epi</p>";		
		$message_insert_episode .= "<p>Emission mère : $this->FK_Emi_Epi</p>";
		$message_insert_episode .= "<p>Type d'épisode : $this->FK_Type_Epi</p>";
		$message_insert_episode .= "<p>Mots-clés : $this->FK_Kw_Epi</p>";

		return $message_insert_episode;
	}


	public function play_Episode(){
		return "<audio controls='controls' preload='metadata'><source src='$this->Url_Epi' type='audio/mp3' /> </audio></br>";
	}

	public function info_Episode(){

			$info = "<p>Titre de l'épisode : " . $this->Titre_Epi . "</p>";
			$info .= "<p>Date de publication : " . $this->Date_Pub_Epi . "</p>";
			$info .= "<p>Emission : " . $this->FK_Emi_Epi . "</p>";
			$info .= "<p>Description : " . $this->Description_Epi . "</p>";
			$info .= "<p><a href='index.php?p=info&episode_id=$this->Id_Epi'>Plus d'informations sur l'épisode</a></p>";
			return $info;




/*"Informations sur l'épisode : </br><ul><li>Titre : " . $this->Titre_Epi . "</li><li>Auteurs : <a href='search.php?q=$this->FK_Aut_Epi'>$this->FK_Aut_Epi</a></li><li>Durée : " . $this->Duree_Epi . "</li><li>Date de publication : " . $this->Date_Pub_Epi . "</li><li>Description : " . $this->Description_Epi . "</li><li>Url : " . $this->Url_Epi . "</li><li>Catégorie : <a href=searchcat.php?q=$this->FK_Cat_Epi>$this->FK_Cat_Epi</a></li><li><a href='player.php?emission_id=$this->FK_Emi_Epi'>Voir plus d'épisodes de cette émission</a></li>";
*/
	}

	public function info_Complete_Episode(){

			$info = "<h3>Informations sur l'épisode '" . $this->Titre_Epi . "'</h3>";
			$info .= "<p>Titre : " . $this->Titre_Epi . "</p>";
			$info .= "<p>Date de publication : " . $this->Date_Pub_Epi . "</p>";
			$info .= "<p>Durée de l'épisode : " . $this->Duree_Epi . "</p>";
			$info .= "<p>Description : " . $this->Description_Epi . "</p>";
			$info .= "<p>Url : " . $this->Url_Epi . "</p>";
			$info .= "<p>Emission : " . $this->FK_Emi_Epi . "</p>";
			$info .= "<p>Type d'épisode : " . $this->FK_Type_Epi . "</p>";
			$info .= "<p>Intervenant : " . $this->FK_Aut_Epi . "</p>";
			$info .= "<p>Catégorie : " . $this->FK_Cat_Epi . "</p>";
			$info .= "<p>Terme(s) descripteur(s) : " . $this->FK_Kw_Epi . "</p>";
			$info .= "<p><a href='index.php?p=player&episode_id=$this->Id_Epi'>Lire l'épisode</a></p>";

			return $info;
	}


}

?>