<?php

require_once "connect_db.php";

class Thesaurus {

	private $id;
	private $terme;
	private $description;

	public function __construct($id = NULL, $terme = NULL, $description = NULL){

		$this->id = $id;
		$this->terme = $terme;
		$this->description = $description;
	}


	public function info_Complete_Thesaurus(){

		$info = "<h3>Informations sur le mot-clé '" . $this->terme . "'</h3>";
		$info .= "<p>Terme descripteur : " . $this->terme . "</p>";
		$info .= "<p>Description : " . $this->description . "</p>";
//		$info .= "<p><a href='index.php?p=player&emission_id=$this->Id_Emi'>Consulter les épisodes</a></p>";

		return $info;
	}
}