<?php
require_once "connect_db.php";

class user {


	private $User_Id;
	private $Username;
	private $Username_Canonical;
	private $Password;
	private $Email;
	private $Inscription_Date;
	private $Statut;


	public function __construct($User_Id = Null, $Username = Null, $Username_Canonical = Null, $Password = Null, $Email = Null, $Inscription_Date = Null, $Statut = Null){

		$this->User_Id = $User_Id;
		$this->Username = $Username;
		$this->Username_Canonical = strtolower($Username);
		$this->Password = $Password;
		$this->Email = $Email;
		$this->Inscription_Date = $Inscription_Date;
		$this->Statut = $Statut;
	}


	public function GetUsername(){
		return $this->Username;
	}

	public function GetPassword(){
		return $this->Password;
	}

	public function GetUser_Id(){
		return $this->User_Id;
	}

	public function GetStatut(){
		return $this->Statut;
	}



	public function user_By_Id($id){
		$pdo = connect_db::connexion();
		$stmt = "SELECT * FROM users WHERE User_Id = :id";
		$request = $pdo->prepare($stmt);
		$request->execute(array(

			":id" => $id

			));

		$result = $request->fetch();

		$this->User_Id = $result["User_Id"];
		$this->Username = $result["Username"];
		$this->Username_Canonical = strtolower($result["Username"]);
		$this->Password = $result["Password"];
		$this->Email = $result["Email"];
		$this->Inscription_Date = $result["Inscription_Date"];
		$this->Status = $result["Statut"];
	}

	public function insert_User(){
		$pdo = connect_db::connexion();
		$stmt = "INSERT INTO users (Username, Username_Canonical, Password, Email, Inscription_Date) VALUES (:Username, :Username_Canonical, :Password, :Email, CURDATE())";
		$request = $pdo->prepare($stmt);
		$request->execute(array(

			":Username" => $this->Username,
			":Username_Canonical" => $this->Username_Canonical,
			":Password" => md5($this->Password),
			":Email" => $this->Email

			));
	}

	public function info_User(){

		echo $this->User_Id . "</br>" . $this->Username . "</br>" . $this->Username_Canonical . "</br>" . $this->Password . "</br>" . $this->Email . "</br>" . $this->Inscription_Date . "</br>" . $this->Statut . "</br>";
	}

	public function message_Succes_Insert(){

		return "Vos informations ont bien été enregistrées" . "<br />" . "Vous avez créé un profil utilisateur avec le login suivant : " . $this->Username . "<br />" . "Vous pouvez désormais accéder aux fonctionnalités du site en vous authentifiant sur votre <a href='index.php?page=dashboard'>tableau de bord</a>.";
	}
}

//test des méthodes

/*
$user = new User("", "Pseudotest2", "", "PasswordTest2", "emailtest2");
$user->info_User();
//$user->insert_User();
$user->user_By_Id(3);
$user->info_User();
$user2 = new User();
$user2->user_By_Id(1);
$user2->info_User();
*/
?>