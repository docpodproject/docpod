<?php

require_once "connect_db.php";

class Auteur {

	private $id;
	private $nom;
	private $prenom;
	private $mention_resp;
	private $type_pro;
	private $description;

	public function __construct($id = NULL, $nom = NULL, $prenom = NULL, $mention_resp = NULL, $type_pro = NULL, $description = NULL){

		$this->id = $id;
		$this->nom = $nom;
		$this->prenom = $prenom;
		$this->mention_resp = $mention_resp;
		$this->type_pro = $type_pro;
		$this->description = $description;
	}


	public function info_Complete_Auteur(){

		$info = "<h3>Informations sur l'auteur/intervenant '" . $this->nom . " " . $this->prenom . "'</h3>";
		$info .= "<p>Nom : " . $this->nom . "</p>";
		$info .= "<p>Prénom : " . $this->prenom . "</p>";
		$info .= "<p>Mention de responsabilité : " . $this->mention_resp . "</p>";
		$info .= "<p>Profession : " . $this->type_pro . "</p>";
		$info .= "<p>Description : " . $this->description . "</p>";
//		$info .= "<p><a href='index.php?p=player&emission_id=$this->Id_Emi'>Consulter les épisodes</a></p>";

		return $info;
	}
}
