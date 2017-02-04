<?php

require_once "connect_db.php";
// Définition de la classe Editeur, de ses paramètres et méthodes
Class Editeur {

	private $Id_Ed;
	private $Nom_Ed;
	private $Type_Ed;
	private $Description_Ed;
	private $Site_Ed;


	public function __construct($Id_Ed = Null, $Nom_Ed = Null, $Type_Ed = Null, $Description_Ed = Null, $Site_Ed = Null){

		$this->Id_Ed = $Id_Ed;
		$this->Nom_Ed = $Nom_Ed;
		$this->Type_Ed = $Type_Ed;
		$this->Description_Ed = $Description_Ed;
		$this->Site_Ed = $Site_Ed;
	}

	public function editeur_By_Id($id){

		$pdo = connect_db::connexion();
		$stmt = "SELECT * FROM editeurs_chaines WHERE Id_Ed = :Id_Ed";
		$request = $pdo->prepare($stmt);

		$request->execute(array(
			":Id_Ed" => htmlspecialchars($id)
			));

		$result = $request->fetch();

		$this->Id_Ed = $result["Id_Ed"];
		$this->Nom_Ed = $result["Nom_Ed"];
		$this->Type_Ed = $result["Type_Ed"];
		$this->Description_Ed = $result["Description_Ed"];
		$this->Site_Ed = $result["Site_Ed"];

	}

	public function liste_Emissions_Editeur(){

		$pdo = connect_db::connexion();
		$stmt = "SELECT Id_Emi, Titre_Emi, Description_Emi FROM Emissions WHERE FK_Ed_Emi = $this->Id_Ed ORDER BY Titre_Emi";
		$request = $pdo->prepare($stmt);
		$request->execute();

		$result = "Liste des émissions : <ul>";
		while ($emission = $request->fetch(PDO::FETCH_ASSOC)){
			$emissionid = $emission["Id_Emi"];
			$emissiontitre = $emission["Titre_Emi"];
			$emissiondescription = $emission["Description_Emi"];
			$result .= "<li>Titre : <a href='index.php?p=info&emission_id=$emissionid'>$emissiontitre</a></br>Description : " . $emissiondescription . "</li>";
		}
		$result .= "</ul>";
		return $result;
	}

	public function insert_Editeur(){
		
		try{
		$pdo = connect_db::connexion();
		$stmt = "INSERT INTO Editeurs_chaines (Nom_Ed, Type_Ed, Description_Ed, Site_Ed) VALUES (:Nom_Ed, :Type_Ed, :Description_Ed, :Site_Ed)";
		$request = $pdo->prepare($stmt);
		$request->execute(array(

			":Nom_Ed" => $this->Nom_Ed,
			":Type_Ed" => $this->Type_Ed,
			":Description_Ed" => $this->Description_Ed,
			":Site_Ed" => $this->Site_Ed

			));

		} catch (Exception $e) {

        echo $e;

        exit;

		}
		$message_insert_editeur = "Les données suivantes ont été correctement encodées : ";
		$message_insert_editeur .= "<p>Nom de l'éditeur : $this->Nom_Ed</p>";
		$message_insert_editeur .= "<p>Type d'éditeur : $this->Type_Ed</p>";
		$message_insert_editeur .= "<p>Description de l'éditeur : $this->Description_Ed</p>";
		$message_insert_editeur .= "<p>Site web de l'éditeur : $this->Site_Ed</p>";

		return $message_insert_editeur;



	}

	public function info_Editeur(){
		return "Informations sur l'éditeur : </br><ul><li>Nom : " . $this->Nom_Ed . "</li><li>Type : <a href='index.php?p=search&edtype=$this->Type_Ed'>$this->Type_Ed</a></li><li>Description : " . $this->Description_Ed . "</li><li>Site web : " . $this->Site_Ed . "</li>";
	}

	public function info_Complete_Editeur(){

			$info = "<h3>Informations sur l'éditeur/chaîne '" . $this->Nom_Ed . "'</h3>";
			$info .= "<p>Nom : " . $this->Nom_Ed . "</p>";
			$info .= "<p>Type d'éditeur : " . $this->Type_Ed . "</p>";
			$info .= "<p>Description : " . $this->Description_Ed . "</p>";
			$info .= "<p>Site web de l'éditeur : " . $this->Site_Ed . "</p>";

			$liste_emission = new Editeur($this->Id_Ed);
			$liste = $liste_emission->liste_Emissions_Editeur();
			$info .= $liste;

			return $info;
	}



}
