<?php

require_once "connect_db.php";

Abstract class Requete {

	private $terme;

	public function __construct($terme = Null){

		$this->terme = $terme;
	}

	public static function recherche_Fulltext_Episode($terme){

		try {

			$pdo = connect_db::connexion();
			$stmt= "SELECT Id_Epi, Titre_Epi, Description_Epi FROM episodes WHERE MATCH(Titre_Epi, Description_Epi) AGAINST('$terme')";
			$request = $pdo->prepare($stmt);
			$request->execute();

			//VOIR POUR TRANSFORMER LE RESULTAT EN OBJET

			$result = "<h3>Episode(s) trouvé(s)</h3>";
			$countreq = 0;
			$result .= "<ul>";
			while ($row = $request->fetch(PDO::FETCH_ASSOC)){
				$countreq++;
				$consult = $row["Id_Epi"];
				$result .= "<li>" . $row["Titre_Epi"] . " : " . $row["Description_Epi"] . "</li>";
				$result .= "<a href='index.php?p=player&episode_id=$consult'>Consulter l'épisode</a>";

			}
			$result .= "</ul>";
			$result .= "<p>Nous avons trouvé <b>". $countreq ."</b> résultat(s).</p>";
			return $result;

		 } catch (Exception $e) {

        echo $e;

        exit;

        }
	}

	public static function episode_By_Id($id){

		try {

			$pdo = connect_db::connexion();
			$stmt = "
				SELECT Id_Epi, Titre_Epi, Duree_Epi, Date_Pub_Epi, Url_Epi, Description_Epi, Vedette_type.Terme as Type, Vedette_auteurs.Nom as Auteur, Vedette_categories.Terme as Categorie, Emissions.Titre_Emi as Emission, Thesaurus.Terme as Kw FROM episodes 
				INNER JOIN Vedette_type
				ON Vedette_type.Id = FK_Type_Epi
				INNER JOIN Vedette_auteurs
				ON Vedette_auteurs.Id = FK_Aut_Epi
				INNER JOIN Vedette_categories
				ON Vedette_categories.Id = FK_Cat_Epi
				INNER JOIN Emissions
				ON Emissions.Id_Emi = FK_Emi_Epi
				INNER JOIN Thesaurus
				ON Thesaurus.Id = FK_Kw_Epi
				WHERE Id_Epi = $id";
			$request = $pdo->prepare($stmt);
			$request->execute();

			$result = $request->fetch();

			$episode = new Episode ($result["Id_Epi"], htmlentities($result["Titre_Epi"]), $result["Duree_Epi"], $result["Date_Pub_Epi"], $result["Url_Epi"], htmlentities($result["Description_Epi"]), htmlentities($result["Auteur"]), htmlentities($result["Categorie"]), htmlentities($result["Emission"]), htmlentities($result["Type"]), htmlentities($result["Kw"]));
			return $episode;

        } catch (Exception $e) {

        echo $e;

        exit;

        }

	}

	public static function recherche_Fulltext_Emission($terme){

		try {

			$pdo = connect_db::connexion();
			$stmt = "SELECT * FROM Emissions WHERE MATCH(Titre_Emi, Description_Emi) AGAINST('$terme')";
			$request = $pdo->prepare($stmt);
			$request->execute();

			//VOIR POUR TRANSFORMER LE RESULTAT EN OBJET

			$result = "<h3>Emission(s) trouvée(s)</h3>";
			$countreq = 0;
			$result .= "<ul>";
			while ($row = $request->fetch(PDO::FETCH_ASSOC)){
				$countreq++;
				$consult = $row["Id_Emi"];
				$result .= "<li>" . $row["Titre_Emi"] . " : " . $row["Description_Emi"] . "</li>";
				$result .= "<a href='index.php?p=player&emission_id=$consult'>Consulter l'émission</a>";

			}
			$result .= "</ul>";
			$result .= "<p>Nous avons trouvé <b>". $countreq ."</b> résultat(s).</p>";
			return $result;

        } catch (Exception $e) {

        echo $e;

        exit;

        }
	}

	public static function emission_By_Id($id){

		try {

			$pdo = connect_db::connexion();
			$stmt = "
				SELECT Id_Emi, Titre_Emi, Flux_Emi, Description_Emi, Site_Emi, Vedette_type.Terme as Type, Vedette_auteurs.Nom as Auteur, Vedette_categories.Terme as Categorie, Editeurs_chaines.Nom_Ed as Editeur, Thesaurus.Terme as Kw FROM emissions 
				INNER JOIN Vedette_type
				ON FK_Type_Emi = Vedette_type.Id
				INNER JOIN Vedette_auteurs
				ON Vedette_auteurs.Id = FK_Aut_Emi
				INNER JOIN Vedette_categories
				ON Vedette_categories.Id = FK_Cat_Emi
				INNER JOIN Editeurs_chaines
				ON Editeurs_chaines.Id_Ed = FK_Ed_Emi
				INNER JOIN Thesaurus
				ON Thesaurus.Id = FK_Kw_Emi
				WHERE Id_Emi = $id";
			$request = $pdo->prepare($stmt);
			$request->execute();

			$result = $request->fetch();

			$emission = new Emission ($result["Id_Emi"], htmlentities($result["Titre_Emi"]), $result["Flux_Emi"], htmlentities($result["Description_Emi"]), htmlentities($result["Site_Emi"]), htmlentities($result["Auteur"]), htmlentities($result["Categorie"]), htmlentities($result["Editeur"]), htmlentities($result["Type"]), htmlentities($result["Kw"]));
			
			return $emission;


        } catch (Exception $e) {

        echo $e;

        exit;

        }

	}

	public static function consult_Emissions(){

		$pdo = connect_db::connexion();
		$stmt = "SELECT Id_Emi, Titre_Emi FROM emissions";
		$request = $pdo->prepare($stmt);
		$request->execute();

		$liste = "<ul>";
		while ($row = $request->fetch(PDO::FETCH_ASSOC)) {
			$id = $row["Id_Emi"];
			$liste .= "<li> Titre émission : " . $row["Titre_Emi"] . " - <a href='index.php?p=info&emission_id=$id'>Plus d'informations sur l'émission</a></li>";  
		}

		$liste .= "</ul>";
		return $liste;
	}



	public static function recherche_Fulltext_Editeur($terme){

		try{

			$pdo = connect_db::connexion();
			$stmt= "SELECT * FROM editeurs_chaines WHERE MATCH(Nom_Ed, Description_Ed) AGAINST('$terme')";
			$request = $pdo->prepare($stmt);
			$request->execute();


			//VOIR POUR TRANSFORMER LE RESULTAT EN OBJET

			$result = "<h3>Editeur(s) trouvé(s)</h3>";
			$countreq = 0;
			$result .= "<ul>";
			while ($row = $request->fetch(PDO::FETCH_ASSOC)){
				$countreq++;
				$consult = $row["Id_Ed"];
				$result .= "<li>" . $row["Nom_Ed"] . " : " . $row["Description_Ed"] . "</li>";
				$result .= "<a href='index.php?p=info&editeur_id=$consult'>Plus d'informations sur l'éditeur</a>";

			}
			$result .= "</ul>";
			$result .= "<p>Nous avons trouvé <b>". $countreq ."</b> résultat(s).</p>";
			return $result;

        } catch (Exception $e) {

        echo $e;

        exit;

        }

	}

	public static function editeur_By_Id($id){

		try {

			$pdo = connect_db::connexion();
			$stmt = "SELECT * FROM Editeurs_chaines WHERE Id_Ed = $id";
			$request = $pdo->prepare($stmt);
			$request->execute();
			$result = $request->fetch();

			$editeur = new Editeur($result["Id_Ed"], htmlentities($result["Nom_Ed"]), htmlentities($result["Type_Ed"]), htmlentities($result["Description_Ed"]), htmlentities($result["Site_Ed"]));
			return $editeur;


        } catch (Exception $e) {

        echo $e;

        exit;

        }

	}

	public static function consult_Editeurs(){

		$pdo = connect_db::connexion();
		$stmt = "SELECT Id_Ed, Nom_Ed FROM editeurs_chaines";
		$request = $pdo->prepare($stmt);
		$request->execute();

		$liste = "<ul>";
		while ($row = $request->fetch(PDO::FETCH_ASSOC)) {
			$id = $row["Id_Ed"];
			$liste .= "<li> Nom éditeur/chaîne : " . $row["Nom_Ed"] . " - <a href='index.php?p=info&editeur_id=$id'>Plus d'informations sur l'éditeur/chaîne</a></li>";  
		}

		$liste .= "</ul>";
		return $liste;
	}

	public static function thesaurus_By_Id($id){
	
	try {

			$pdo = connect_db::connexion();
			$stmt = "SELECT * FROM thesaurus WHERE Id = $id";

			$request = $pdo->prepare($stmt);
			$request->execute();
			$result = $request->fetch();

			$thesaurus = new Thesaurus ($result["Id"], $result["Terme"], $result["Description"]);
			return $thesaurus;
			
		} catch (Exception $e) {
			
			echo $e;

			exit;
		}	
	}

	public static function consult_Thesaurus(){

		$pdo = connect_db::connexion();
		$stmt = "SELECT Id, Terme FROM thesaurus";
		$request = $pdo->prepare($stmt);
		$request->execute();

		$liste = "<ul>";
		while ($row = $request->fetch(PDO::FETCH_ASSOC)) {
			$id = $row["Id"];
			$liste .= "<li> Terme descripteur : " . $row["Terme"] . " - <a href='index.php?p=info&thesaurus_id=$id'>Plus d'informations sur le terme et son utilisation</a></li>";  
		}

		$liste .= "</ul>";
		return $liste;
	}

	public static function categorie_By_Id($id){
	
	try {

			$pdo = connect_db::connexion();
			$stmt = "SELECT * FROM vedette_categories WHERE Id = $id";

			$request = $pdo->prepare($stmt);
			$request->execute();
			$result = $request->fetch();

			$categorie = new Categorie ($result["Id"], $result["Terme"], $result["Description"]);
			return $categorie;
			
		} catch (Exception $e) {
			
			echo $e;

			exit;
		}	
	}

	public static function consult_Categories(){

		$pdo = connect_db::connexion();

		$stmt = "SELECT Id, Terme FROM vedette_categories";
		$request = $pdo->prepare($stmt);
		$request->execute();

		$liste = "<ul>";
		while ($row = $request->fetch(PDO::FETCH_ASSOC)) {
			$id = $row["Id"];
			$liste .= "<li> Terme descripteur : " . $row["Terme"] . " - <a href='index.php?p=info&typo_id=$id'>Plus d'informations sur la catégorie et son utilisation</a></li>";  
		}

		$liste .= "</ul>";
		return $liste;
	}


	public static function typo_By_Id($id){
	
	try {

			$pdo = connect_db::connexion();
			$stmt = "SELECT * FROM vedette_type WHERE Id = $id";

			$request = $pdo->prepare($stmt);
			$request->execute();
			$result = $request->fetch();

			$typo = new Typo ($result["Id"], $result["Terme"], $result["Description"]);
			return $typo;
			
		} catch (Exception $e) {
			
			echo $e;

			exit;
		}	
	}

	public static function consult_Typo(){

		$pdo = connect_db::connexion();
		$stmt = "SELECT Id, Terme FROM vedette_type";
		$request = $pdo->prepare($stmt);
		$request->execute();

		$liste = "<ul>";
		while ($row = $request->fetch(PDO::FETCH_ASSOC)) {
			$id = $row["Id"];
			$liste .= "<li> Terme descripteur : " . $row["Terme"] . " - <a href='index.php?p=info&typo_id=$id'>Plus d'informations sur le type et son utilisation</a></li>";  
		}

		$liste .= "</ul>";
		return $liste;
	}

	public static function auteur_By_Id($id){
	
	try {

			$pdo = connect_db::connexion();
			$stmt = "SELECT * FROM vedette_auteurs WHERE Id = $id";

			$request = $pdo->prepare($stmt);
			$request->execute();
			$result = $request->fetch();

			$auteur = new Auteur ($result["Id"], $result["Nom"], $result["Prenom"], $result["Mention_resp"], $result["Type_pro"], $result["Description"]);
			return $auteur;
			
		} catch (Exception $e) {
			
			echo $e;

			exit;
		}	
	}

	public static function consult_Auteurs(){

		$pdo = connect_db::connexion();
		$stmt = "SELECT Id, Nom, Prenom, Mention_resp FROM vedette_auteurs";
		$request = $pdo->prepare($stmt);
		$request->execute();

		$liste = "<ul>";
		while ($row = $request->fetch(PDO::FETCH_ASSOC)) {
			$id = $row["Id"];
			$liste .= "<li> Nom : " . $row["Nom"] . " " . $row["Prenom"] . "</br>Mention de responsabilité : " . $row["Mention_resp"] . " - <a href='index.php?p=info&auteur_id=$id'>Plus d'informations sur l'intervenant et ses contributions</a></li>";  
		}

		$liste .= "</ul>";
		return $liste;
	}

	public function recherche_Avancee_Editeur(){

	}

	public function recherche_Avancee_Emission(){

	}

	public function recherche_Avancee_Episode(){

	}

	public static function recherche_Auteurs($terme){

		try {

			$pdo = connect_db::connexion();
			$stmt = "SELECT * FROM vedette_auteurs WHERE MATCH(Nom, Prenom, Description) AGAINST('$terme')";
			$request = $pdo->prepare($stmt);
			$request->execute();

			//VOIR POUR TRANSFORMER LE RESULTAT EN OBJET

			$resultat_auteur = "<h3>Auteur(s) trouvé(s)</h3>";
			$countreq = 0;
			$resultat_auteur .= "<ul>";
			while ($row = $request->fetch(PDO::FETCH_ASSOC)){
				$countreq++;
				$consult = $row["Id"];
				$resultat_auteur .= "<li>" . $row["Nom"] . " : " . $row["Description"] . "</li>";
				$resultat_auteur .= "<a href='index.php?p=info&auteur_id=$consult'>Plus d'informations sur l'auteur</a>";

			}
			$resultat_auteur .= "</ul>";
			$resultat_auteur .= "<p>Nous avons trouvé <b>". $countreq ."</b> résultat(s).</p>";
			return $resultat_auteur;

        } catch (Exception $e) {

        echo $e;

        exit;

        }


	}

	public static function recherche_Mots_Cles($terme){

		try {

			$pdo = connect_db::connexion();
			$stmt = "SELECT * FROM thesaurus WHERE MATCH(Terme, Description) AGAINST('$terme')";
			$request = $pdo->prepare($stmt);
			$request->execute();

			//VOIR POUR TRANSFORMER LE RESULTAT EN OBJET

			$resultat_kw = "<h3>Mot(s)-Clé(s) trouvé(s)</h3>";
			$countEd = 0;
			$resultat_kw .= "<ul>";
			while ($row = $request->fetch(PDO::FETCH_ASSOC)){
				$countEd++;
				$consult = $row["Id"];
				$resultat_kw .= "<li>" . $row["Terme"] . " : " . $row["Description"] . "</li>";
				$resultat_kw .= "<a href='index.php?p=info&kw_id=$consult'>Plus d'informations sur le mot-clé</a>";

			}
			$resultat_kw .= "</ul>";
			$resultat_kw .= "<p>Nous avons trouvé <b>". $countEd ."</b> résultat(s).</p>";
			return $resultat_kw;

        } catch (Exception $e) {

        echo $e;

        exit;

        }
	}

	public static function recherche_Categories_Emission ($terme){

		try{

			$pdo = connect_db::connexion();
			$stmt = "SELECT Id_Emi, Titre_Emi FROM Emissions INNER JOIN Vedette_categories ON FK_Cat_Emi = Vedette_categories.Id Where Vedette_categories.Terme = '$terme'";
			$request = $pdo->prepare($stmt);
			$request->execute();

			//VOIR POUR TRANSFORMER LE RESULTAT EN OBJET

			$result_Emission_By_Categorie = "<h3>Emission(s) trouvée(s) pour cette catégorie</h3>";
			$result_Emission_By_Categorie .= "<ul>";
			$countreq = 0;
			while ($row = $request->fetch(PDO::FETCH_ASSOC)) {
				$countreq++;
				$consult = $row["Id_Emi"];
				$result_Emission_By_Categorie .= "<li>" . $row["Titre_Emi"] . " : <a href='index.php?p=info&emission_id=$consult'>Plus d'informations sur l'émission</a></li>";		
			}
			$result_Emission_By_Categorie .= "</ul>";
			$result_Emission_By_Categorie .= "<p>Nous avons trouvé " . $countreq . " résultat(s)</p>";
			return $result_Emission_By_Categorie;

        } catch (Exception $e) {

        echo $e;

        exit;

        }


	}

	public static function recherche_Categories_Episode ($terme){

		try{

			$pdo = connect_db::connexion();
			$stmt = "SELECT Id_Epi, Titre_Epi FROM Episodes INNER JOIN Vedette_categories ON FK_Cat_Epi = Vedette_categories.Id Where Vedette_categories.Terme = '$terme'";
			$request = $pdo->prepare($stmt);
			$request->execute();

			//VOIR POUR TRANSFORMER LE RESULTAT EN OBJET

			$result_Episode_By_Categorie = "<h3>Episode(s) trouvé(s) pour cette catégorie</h3>";
			$result_Episode_By_Categorie .= "<ul>";
			$countreq = 0;
			while ($row = $request->fetch(PDO::FETCH_ASSOC)) {
				$countreq++;
				$consult = $row["Id_Epi"];
				$result_Episode_By_Categorie .= "<li>" . $row["Titre_Epi"] . " : <a href='index.php?p=info&episode_id=$consult'>Plus d'informations sur l'épisode</a></li>";		
			}
			$result_Episode_By_Categorie .= "</ul>";
			$result_Episode_By_Categorie .= "<p>Nous avons trouvé " . $countreq . " résultat(s)</p>";
			return $result_Episode_By_Categorie;
			
        } catch (Exception $e) {

        echo $e;

        exit;

        }


	}

	public static function recherche_Categories($terme){

		try {

			$pdo = connect_db::connexion();
			$stmt = "SELECT * FROM vedette_categories WHERE MATCH(Terme, Description) AGAINST('$terme')";
			$request = $pdo->prepare($stmt);
			$request->execute();

			//VOIR POUR TRANSFORMER LE RESULTAT EN OBJET

			$result_recherche_by_categorie = "<h3>Catégorie(s) trouvée(s)</h3>";
			$countreq = 0;
			$result_recherche_by_categorie .= "<ul>";
			while ($row = $request->fetch(PDO::FETCH_ASSOC)){
				$countreq++;
				$consult = $row["Id"];
				$result_recherche_by_categorie .= "<li>" . $row["Terme"] . " : " . $row["Description"] . "</li>";
				$result_recherche_by_categorie .= "<a href='index.php?p=info&categorie_id=$consult'>Plus d'informations sur la catégorie</a>";

			}
			$result_recherche_by_categorie .= "</ul>";
			$result_recherche_by_categorie .= "<p>Nous avons trouvé <b>". $countreq ."</b> résultat(s).</p>";

/*
		FAIRE UN RENVOI VERS LA PAGE INFO/SEARCH POUR CONSULTER LES EPI/EMI DE CETTE CATEGORIE

			$request = new Requete();
			$result_recherche_by_categorie .= $request->recherche_Categories_Emission($terme);
			$result_recherche_by_categorie .= $request->recherche_Categories_Episode($terme);
			return $result_recherche_by_categorie;
*/
        } catch (Exception $e) {

        echo $e;

        exit;

        }
	}

	public static function recherche_Types($terme){

		try {

			$pdo = connect_db::connexion();
			$stmt = "SELECT * FROM vedette_type WHERE MATCH(Terme, Description) AGAINST('$terme')";
			$request = $pdo->prepare($stmt);
			$request->execute();

			//VOIR POUR TRANSFORMER LE RESULTAT EN OBJET

			$resultat_type = "<h3>Type(s) trouvé(s)</h3>";
			$countreq = 0;
			$resultat_type .= "<ul>";
			while ($row = $request->fetch(PDO::FETCH_ASSOC)){
				$countreq++;
				$consult = $row["Id"];
				$resultat_type .= "<li>" . $row["Terme"] . " : " . $row["Description"] . "</li>";
				$resultat_type .= "<a href='index.php?p=info&type_id=$consult'>Plus d'informations sur le type</a>";

			}
			$resultat_type .= "</ul>";
			$resultat_type .= "<p>Nous avons trouvé <b>". $countreq ."</b> résultat(s).</p>";
			return $resultat_type;

        } catch (Exception $e) {

        echo $e;

        exit;

        }
	}


	public static function nb_Entrees_Db(){

		try{

			$pdo = connect_db::connexion();
			$stmt = "SELECT (SELECT COUNT(*) FROM editeurs_chaines) AS Nb_Editeurs, (SELECT COUNT(*) FROM emissions) AS Nb_Emissions, (SELECT COUNT(*) FROM episodes) AS Nb_Episodes";
			$request = $pdo->prepare($stmt);
			$request->execute();
			$result = $request->fetch();

			$info = "Il y a actuellement : " . $result["Nb_Episodes"] . " épisodes, " . $result["Nb_Emissions"] . " émissions et " . $result["Nb_Editeurs"] . " éditeurs recensés sur l'application.";
			return $info;

        } catch (Exception $e) {

        echo $e;

        exit;

        }
	}
//MODIFIER POUR QU'UN MESSAGE D'ERREUR APPARAISSE SI LE PASSWORD EST FAUX
	public static function check_User_Login($username_canonical, $password){

		try{
			$pdo = connect_db::connexion();
			$stmt = "SELECT * FROM Users WHERE Username_Canonical = :username_canonical AND Password = :password";
			$request = $pdo->prepare($stmt);
			$request->execute(array(
				":username_canonical" => $username_canonical,
				":password" => $password
				));

			$result = $request->fetch();

			If ($password = $result["Password"]){

				$user = new User($result["User_Id"], $result["Username"], $result["Username_Canonical"], $result["Password"], $result["Email"], $result["Inscription_Date"], $result["Statut"]);
				return $user;
			}

		} catch (Exception $e) {

			echo $e;
			exit;
		}
	}

}

