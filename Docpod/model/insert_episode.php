<?php
IF(isset($_SESSION) && $_SESSION["statut"] == "Admin"){

	$titre_epi = "";
	$messageIndexation = "";

	IF(isset($_GET["id_epi"])) {
		$id = $_GET["id_epi"];
		$episode = Requete::episode_By_Id($id);
		$titre_epi = $episode->getEpisodeTitre();
		$url_epi = $episode->getEpisodeUrl();
		$description_epi = $episode->getEpisodeDescription();
		// echo $titre_epi;
		// echo $description_epi;

		//INIT VARIABLES HINT CATALO
	 // $Id_Epi;
	 // $Titre_Epi;
	 // $Duree_Epi;
	 // $Date_Pub_Epi;
	 // $Url_Epi;
	 // $Description_Epi;


	 // $FK_Aut_Epi;
	 // $FK_Cat_Epi;
	 // $FK_Emi_Epi;
	 // $FK_Type_Epi;
	 // $FK_Kw_Epi;

		$messageIndexation = "TEST INDEXATION";



	// IF(isset($_POST["Titre_Epi"])){

	//AJOUTER SCRIPT ECRITURE NOTICE DETAILLEE

	// // ATTENTION, TROUVER SOLUTION SI TOUT N'EST PAS REMPLI !!!

	// 	$Titre_Epi = $_POST["Titre_Emi"];
	// 	$Duree_Epi = $_POST["Duree_Epi"]; // TROUVER UN MOYEN DE LE FAIRE AUTOMATIQUEMENT !!!
	// 	$Date_Pub_Epi = $_POST["Date_Pub_Epi"]; // IDEM
	// 	$Url_Epi = $_POST["Url_Epi"];
	// 	$Description_Epi = $_POST["Description_Epi"];
	// 	$FK_Aut_Epi = $_POST["FK_Aut_Epi"];
	// 	$FK_Cat_Epi = $_POST["FK_Cat_Epi"];
	// 	$FK_Emi_Epi = $_POST["FK_Emi_Epi"];
	// 	$FK_Type_Epi = $_POST["FK_Type_Epi"];
	// 	$FK_Kw_Epi = $_POST["FK_Kw_Epi"];


	// 	$episode = new Episode("", $Titre_Epi, $Duree_Epi, $Date_Pub_Epi, $Url_Epi, $Description_Epi, $FK_Aut_Epi, $FK_Cat_Epi, $FK_Emi_Epi, $FK_Type_Epi, $FK_Kw_Epi);
	// 	$episode->insert_Episode();

	// } else {
	?>
	<!DOCTYPE html>
	<html>
	<body>

	
			

			<section id="recherches">

				<?php echo $messageIndexation ?>

				<!-- <div id="titre-re">
					<article>
						<h1>Espace personnel</h1>
						<br />
							<p>Sur votre espace personnel, vous avez la possibilité de gérer vos abonnements, d'avoir accès à l’historique de vos écoutes et de gérer votre compte ainsi que vos préférences.</p><br/>	
					</article>
				</div> -->
			

				<div id="container-desc-cont">
  <!-- Item 1 -->
 					 <div class="accordion-desc-cont">
    					<label for="desc-cont" class="accordionitem"><h2>Description du contenu (champs 1-6) <!-- <span class="arrow">&raquo;</span> --></h2></label>
    					<input type="checkbox" id="desc-cont"/>
    					<!-- remplacer les <ul> ci-dessous par de <p> pour correspondre au php ne pas oublier de les changer dans la feuille de style -->
   							<form class="hiddentext" action="envoi.php" method="POST">
   							 	<h3>Champ 1 : <b>TITRE</b></h3>
   							 		<p>- Nom de la ressource décrite (tire de l'émission).
									<br />
									- Le nom de l'émission sera décrit au champ 10 : ELEMENTS DE DROIT > SOURCE.</p>
									<br/>
   							 		 

								<ol class="rech-av-formu">
									<li><input type="text" name="titre" placeholder="Titre de l'émission" value="<?php echo $titre_epi?>"/></li>	
									<!-- <li class="btn-s"><input type="submit" name="avance" placeholder="Chercher"></li> -->
								</ol>

								<h3>Champ 2 : description</h3>
   							 		<p>- Présentation du contenu de la ressource (résumé du contenu, ce résumé peut provenir de la ressource ou être crée par vous).
									<br />
									- La présentation du contenu se fait en langage libre.
									<br />
									- La description matérielle de la ressource s'effectuera au champ 15 : ELEMENTS TECNIQUES > FORMAT.</p><br/>
							
								<ol class="formu-desc">
									<li><textarea type="text" name="description" placeholder="Résumé"/><?php echo $description_epi?></textarea></li>	
									<!-- <li class="btn-s"><input type="submit" name="avance" placeholder="Chercher"></li> -->
								</ol>

								<h3>Champ 3 : sujet</h3>
   							 		<p>- Description du contenu intellectuel de la ressource, à l'aide du vocabulaire contrôlé issu du <a href="http://skos.um.es/unescothes/CS000/html" target="blank">thésaurus</a> en ligne de l'UNESCO.
									<br />
									- Les descripteurs sujet, de nature temporelle (tranche chronologique : 15s./1989) ou géographiques ou spatiaux (Sénégal/Bruxelles/Rue de la loi) seront indiqués dans le champ 5 : DESCRIPTION DU CONTENU > COUVERTURE.
									<br />
									- La description matérielle de la ressource s'effectuera au champ 15 : ELEMENTS TECHNIQUES > FORMAT.
									<br />
									- Veulliez remplir un champ au minimum.
									<br />
									- Accès au <a href="http://skos.um.es/unescothes/CS000/html" target="blank">thésaurus</a> 
									</p><br/>
							
								<ol class="rech-av-formu">
									<li><input type="text" name="" placeholder="Descripteur" value=""/>
									</li>
									<li><input type="text" name="" placeholder="Descripteur" value=""/>
									</li>
									<li><input type="text" name="" placeholder="Descripteur" value=""/>
									</li>
									<li><input type="text" name="" placeholder="Descripteur" value=""/>
									</li>
									<li><input type="text" name="" placeholder="Descripteur" value=""/>
									</li>

									<!-- <li class="btn-s"><input type="submit" name="avance" placeholder="Chercher"></li> -->
								</ol>

								<h3>Champ 4 : typologie</h3>
   							 		<p>- Genre ou nature de la ressource décrite à l'aide d'un vocabulaire contrôlé qui décrit la typologie de la ressource (ex: documentaire/reportage/série...).
   							 		<br />
   							 		- Accès à la <a href="" target="">liste</a> des typologies.
									</p><br />
									
								<ol class="rech-av-formu">
									<li><!-- <input type="text" name="titre" placeholder="Typologie" value=""/> -->
										<select name="typologie">
										<optgroup label="Genres qui servent à rapporter">
											<option value="nou">Nouvelle</option>
											<option value="bre">Brève</option>
											<option value="mic">Micro-trottoir</option>
											<option value="int">Interview</option>
											<option value="pot">Portrait</option>
											<option value="rep">Reportage</option>
										</optgroup>
										<optgroup label="Genres qui servent à expliquer">
											<option value="dos">Dossier</option>
											<option value="enq">Enquête</option>
											<option value="chr">chronique radio</option>
										</optgroup>
										<optgroup label="Genres qui servent à commenter">
											<option value="edi">Editorial</option>
											<option value="bil">Billet</option>
											<option value="rev">Revue de presse</option>
										</optgroup>
										<optgroup label="Genres non journalistiques">
											<option value="dive">Divertissement</option>
											<option value="fic">Fiction radiophonique</option>
											<option value="cou">Cours</option>
											<option value="con">Conférence</option>
										</optgroup>
										<optgroup label="Formats radiophoniques">
											<option value="jou">bulletin d'information</option>
											<option value="maga">Magazine</option>
											<option value="tabl">Débat radiophonique</option>
											<option value="couv">Couverture d'événement</option>
											<option value="docu">Documentaire radiophonique</option>
										</optgroup>
									</select>
									</li>	
									<!-- <li class="btn-s"><input type="submit" name="avance" placeholder="Chercher"></li> -->
								</ol>
								
								<h3>Champ 5 : couverture</h3>
   							 		<p>- Couverture spatio-temporelle de la ressource, la portée du document inclut un domaine géographique et une temporalité.
   							 		<br />
   							 		- L'indexation de la couverture se fait à l'aide du vocabulaire contrôlé issu du <a href="http://skos.um.es/unescothes/CS000/html" target="blank">thésaurus</a> en ligne de l'UNESCO.
   							 		<br />
   							 		- Le champ COUVERTURE est employé uniquement pour l'indexation du contenu de la ressource et non pour indiquer la période ou le lieu de la création.
   							 		<br />
   							 		- Accès au <a href="http://skos.um.es/unescothes/CS000/html" target="blank">thésaurus</a>
									</p><br />
									
								<ol class="rech-av-formu">
									<li><input type="text" name="titre" placeholder="aire géographique" value=""/></li>
									<li><p>Accès aux <a href="http://skos.um.es/unescothes/view.php?fmt=1" target="blank">Aires géographiques</a></p></li>
									<li><input type="text" name="titre" placeholder="Temporalité" value=""/></li>
									<li><p>Accès aux <a href="http://skos.um.es/unescothes/C01805/html" target="blank">Périodes historiques</a></p></li>	
									<!-- <li class="btn-s"><input type="submit" name="avance" placeholder="Chercher"></li> -->
								</ol>

								<h3>Champ 6 : typologie</h3>
   							 		<p>- Langue du contenu intellectuel de la ressource décrite
   							 		</p>
   							 		<br />
									
								<ol class="rech-av-formu">
									<li><!-- <input type="text" name="titre" placeholder="Langue" value=""/> -->
										<select name="">
										<optgroup label="Langues">
											<option value="fre">Français</option>
											<option value="eng">Anglais</option>
											<option value="dut">Néerlandais</option>
											<option value="ger">Allemand</option>
											<option value="und">Autre</option>
										</optgroup>
									</select>
									</li>	
									<!-- <li class="btn-s"><input type="submit" name="avance" placeholder="Chercher"></li> -->
								</ol>
							</form>

 				 		</div>

 				 		<div class="accordion-elmts-droit">
    					<label for="elmts-droit" class="accordionitem"><h2>elements de droit (champs 7-11) <!-- <span class="arrow">&raquo;</span> --></h2></label>
    					<input type="checkbox" id="elmts-droit"/>
    					<!-- remplacer les <ul> ci-dessous par de <p> pour correspondre au php ne pas oublier de les changer dans la feuille de style -->
   							<form class="hiddentext" action="envoi.php" method="POST">
   							 	<h3>Champ 7 : CREATEUR DU DOCUMENT</h3>
   							 		<p>- Entité responsable de la création du contenu de la ressource décrite (collectivité ou personne).</p>
									<br/>
   							 		 

								<ol class="rech-av-formu">
									<li><input type="text" name="titre" placeholder="Nom" value=""/></li>	
									<!-- <li class="btn-s"><input type="submit" name="avance" placeholder="Chercher"></li> -->
								</ol>

								<h3>Champ 8 : CONTRIBUTEUR(S)</h3>
   							 		<p>- Nom du/des intevenant(s) (invité(s),chroniqueur(s),...).
									<br/>
									- Qualité du contributeur (Professeur, chercheur, écrivain, artiste, politique, ...).</p>
									<br />
   							 		 

								<ol class="rech-av-formu-contrib">
									<li><input type="text" name="titre" placeholder="Nom" value=""/></li>
									<li><select name="">
										<optgroup label="Langues">
											<option value="fre">Français</option>
											<option value="eng">Anglais</option>
											<option value="dut">Néerlandais</option>
											<option value="ger">Allemand</option>
											<option value="und">Autre</option>
										</optgroup>
									</select></li>	
									<!-- <li class="btn-s"><input type="submit" name="avance" placeholder="Chercher"></li> -->
								</ol>
								<ol class="rech-av-formu-contrib">
									<li><input type="text" name="titre" placeholder="Nom" value=""/></li>
									<li><input type="text" name="titre" placeholder="Qualité" value=""/></li>	
									<!-- <li class="btn-s"><input type="submit" name="avance" placeholder="Chercher"></li> -->
								</ol>
								<ol class="rech-av-formu-contrib">
									<li><input type="text" name="titre" placeholder="Nom" value=""/></li>
									<li><input type="text" name="titre" placeholder="Qualité" value=""/></li>	
									<!-- <li class="btn-s"><input type="submit" name="avance" placeholder="Chercher"></li> -->
								</ol>
								<ol class="rech-av-formu-contrib">
									<li><input type="text" name="titre" placeholder="Nom" value=""/></li>
									<li><input type="text" name="titre" placeholder="Qualité" value=""/></li>	
									<!-- <li class="btn-s"><input type="submit" name="avance" placeholder="Chercher"></li> -->
								</ol>
								<ol class="rech-av-formu-contrib">
									<li><input type="text" name="titre" placeholder="Nom" value=""/></li>
									<li><input type="text" name="titre" placeholder="Qualité" value=""/></li>	
									<!-- <li class="btn-s"><input type="submit" name="avance" placeholder="Chercher"></li> -->
								</ol>

								<h3>Champ 9 : EDITEUR</h3>
   							 		<p>- Entité responsable de la mise à disposition de la ressource, généralement le nom de la radio qui émet la ressource.
									<br/>
   							 		 

								<ol class="rech-av-formu">
									<li><input type="text" name="titre" placeholder="Entité responsable" value=""/></li>	
									<!-- <li class="btn-s"><input type="submit" name="avance" placeholder="Chercher"></li> -->
								</ol>

								<h3>Champ 10 : SOURCE</h3>
   							 		<p>- Entité responsable de la mise à disposition de la ressource, généralement le nom de la radio qui émet la ressource.</p>
									<br/>
   							 		 

								<ol class="rech-av-formu">
									<li><input type="text" name="titre" placeholder="Entité responsable" value=""/></li>	
									<!-- <li class="btn-s"><input type="submit" name="avance" placeholder="Chercher"></li> -->
								</ol>

								<h3>Champ 11 : DROITS</h3>
   							 		<p>- Informations relatives sur les droits associés à la ressource.</p>
									<br/>
   							 		 

								<ol class="rech-av-formu">
									<li><input type="text" name="titre" placeholder="Droits" value=""/></li>	
									<!-- <li class="btn-s"><input type="submit" name="avance" placeholder="Chercher"></li> -->
								</ol>
							</form>
							</div>

							<div class="accordion-elmts-tech">
    							<label for="elmts-tech" class="accordionitem"><h2>elements techniques (champs 12-15) <!-- <span class="arrow">&raquo;</span> --></h2></label>
    							<input type="checkbox" id="elmts-tech"/>
    						<!-- remplacer les <ul> ci-dessous par de <p> pour correspondre au php ne pas oublier de les changer dans la feuille de style -->
   								<form class="hiddentext" action="envoi.php" method="POST">
   							 		
   							 	<h3>Champ 12 : DATE</h3>
   							 		<p>- Date de mise à disposition de la ressource décrite.</p>
									<br/>
   							 		 

								<ol class="rech-av-formu">
									<li><input type="text" name="titre" placeholder="AAAA-MM-JJ" value=""/></li>	
									<!-- <li class="btn-s"><input type="submit" name="avance" placeholder="Chercher"></li> -->
								</ol>

								<h3>Champ 13 : Relation</h3>
   							 		<p>- Référence à d'autre(s) ressource(s) en rapport avec la ressource décrite(livre, liens, ...).</p>
									<br/>
   							 		 

								<ol class="rech-av-formu">
									<li><input type="text" name="titre" placeholder="Référence" value=""/></li>	
									<!-- <li class="btn-s"><input type="submit" name="avance" placeholder="Chercher"></li> -->
								</ol>
								<ol class="rech-av-formu">
									<li><input type="text" name="titre" placeholder="Référence" value=""/></li>	
									<!-- <li class="btn-s"><input type="submit" name="avance" placeholder="Chercher"></li> -->
								</ol>
								<ol class="rech-av-formu">
									<li><input type="text" name="titre" placeholder="Référence" value=""/></li>	
									<!-- <li class="btn-s"><input type="submit" name="avance" placeholder="Chercher"></li> -->
								</ol>

								<h3>Champ 14 : IDENTIFIER</h3>
   							 		<p>- Référence univoque à la ressource décrite (URL de la ressource).</p>
									<br/>
   							 		 

								<ol class="rech-av-formu">
									<li><input type="text" name="titre" placeholder="URL de la ressource" value="<?php echo $url_epi?>"/></li>	
									<!-- <li class="btn-s"><input type="submit" name="avance" placeholder="Chercher"></li> -->
								</ol>


								<h3>Champ 15 : FORMAT</h3>
   							 		<p>- Format du document décrit.
									<br/>
									- Durée de la resource décrite.</p>
									<br />
   							 		 

								<ol class="rech-av-formu-date">
									<li><input type="text" name="titre" placeholder="Format" value=""/></li>
									<li><input type="text" name="titre" placeholder="hh-min-sec" value=""/></li>
									<!-- <li class="btn-s"><input type="submit" name="avance" placeholder="Chercher"></li> -->
								</ol>
							</form>
						</div>
					</section>




	</body>
	</html>
<?php
	} else {
		$messageIndexation = "Vous devez choisir un épisode à catalographier";
		echo $messageIndexation;
	}
	 
} else{
	
	header("index.php?p=homepage");
}
?>

