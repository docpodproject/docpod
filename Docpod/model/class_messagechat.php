<?php

require_once"connect_db.php";


class Messagechat {
	public $pseudo;
	public $message;
	public $message_date;
	public $FK_Chat_Epi;

	public function __construct($pseudo = Null, $message = Null){

			$this->pseudo = $pseudo;
			$this->message = $message;

	}

	public function insert_Message($episodeid){

		$stmt= "INSERT INTO minichat (pseudo, message, message_date, FK_Chat_Epi) VALUES (:pseudo, :message, NOW(), :FK_Chat_Epi)";
		$pdo = connect_db::connexion();
		$request = $pdo->prepare($stmt);
		$request->execute(array(
			":pseudo" => $this->pseudo,
			":message" => $this->message,
			":FK_Chat_Epi" => $episodeid
		));

	}

	public function affichage_Minichat($episodeid){
		$stmt = "SELECT Id, pseudo, message, DATE_FORMAT(message_date, '%d/%m/%Y %Hh%imin%ss') AS mess_date, FK_Chat_Epi FROM minichat WHERE FK_Chat_Epi = $episodeid ORDER BY Id Desc LIMIT 10";
		$pdo = connect_db::connexion();
		$request = $pdo->prepare($stmt);
		$request->execute();

		$minichat = "<ul>";
		while ($result = $request->fetch(PDO::FETCH_ASSOC)) {
			$minichat .= "<li><b>" . $result["pseudo"] . "</b> <i>(" . $result["mess_date"] . ")</i> : " . $result["message"] . "</li>";
		}
		$minichat .="</ul>";
		echo $minichat;

	}
}
