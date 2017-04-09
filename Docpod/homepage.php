


<!Doctype html>
<html lang="fr">
	<head>
		<meta charset="UFT-8">
		<title>index</title>
		<meta name="author" content="Docpod Project">
		<meta name="keywords" content="Docpod, documentaires audio, podcast, podcasting, biblothèque audio">
		<link rel="stylesheet" type="text/css" href="style.css">
	<head>
	<body>

		<div id="cont-general">

<!-- Menu de navigation -->

			<div id="clear"></div>
			<section id="nav-primary">
				<a href="Newuser.html"class="nav-btn">Inscription à DocPod</a>
				<a href="Accueil2.html"class="nav-btn">Accueil</a>
				<a href="Infocast.html" class="nav-btn">Infocast</a>
				<a href="Dashboard.html"class="nav-btn">Espace personnel</a>
				<a href="#apropos"class="nav-btn">à Propos</a>
				<a href="Player.html"class="nav-btn">Lecteur</a>
				<a href="Search.html"class="nav-btn">Recherches avancées</a>
				<a href="#contacts"class="nav-btn">Partenaires</a>
				<a href="#contacts"class="nav-btn">Contacts</a>
			</section>

<!-- HEADER -->

			<header>
				<div class="logo">
					<img src="images/casqueoblique.png" alt="logodocpod">
				</div>

					<div class="titre">
						<h1>Plateforme des podcasts documentaires<h1>
						<h2> - ACCUEIL -</h2>
					</div>

					<div class="formulaire-recherche">
						<form  action="" method="POST">				
							<ul>
								<li><input type="text" name="simple" placeholder=" Recherche simple"></li>
								<li><input type="submit" name="send" value="OK"></li>
								
							</ul>

					</form>
				</div>
			</header>
			<div class="nav">
					<ul class="nav__menu">
						<li class="nav__menu-item">Login</li>
					 		<!-- <ul class="nav__submenu"> -->			
	<?php $oldsearch=""; 
include_once "controller/login.php" ?>
							<!-- 
							 -->
						</li>
					</ul>
				</div>		
	<div id="container">
  <!-- Item 1 -->
 					 <div class="accordion">
    					<label for="tm" class="accordionitem"><h2>Revue de presse <!-- <span class="arrow">&raquo;</span> --></h2></label>
    					<input type="checkbox" id="tm"/>
   							 <p class="hiddentext">One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed  into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections.</p>
 				 </div>
  
  <!-- Item 2 -->
  					<div class="accordion">
   						 <label for="tn" class="accordionitem"><h2>Dernières publications<!--  <span class="arrow">&raquo;</span> --></h2></label>
    						<input type="checkbox" id="tn"/>
    							<p class="hiddentext">One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections.</p>
  					</div>
  
  <!-- Item 3 -->
  					<div class="accordion">
    					<label for="to" class="accordionitem"><h2>Dossiers <!-- <span class="arrow">&raquo;</span> --></h2></label>
   						 <input type="checkbox" id="to"/>
   							 <p class="hiddentext">One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections.</p>
  					</div>

 					<div class="accordion">
    					<label for="tp" class="accordionitem"><h2>Suggetions alléatoires <!-- <span class="arrow">&raquo;</span> --></h2></label>
    					<input type="checkbox" id="tp"/>
    						<p class="hiddentext">One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin. He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff sections.</p>
  					</div>
				</div>
				
			<div id="clear"></div>

<!-- Lecteur -->			
			
			<section id="lecteur">
				<audio scr="" controls=""></audio>
			</section>

<!-- Corp de page -->
			
			<section id="corp-de-page">
				<article>				
				<h1>Bienvenue sur la Plateforme des Podcasts documentaires</h1><br>
				<p>La plateforme DOCPOD a été créer dans le but de centraliser et diffuser les documentaires radiophoniques sous forme de podcasts.<br>
				<br>
				<p>Les podcasts présents sur cette plateforme recouvrent, dans la mesure du possible, l’ensemble des savoirs et proviennent essentiellement des radios publiques francophone (RTBF, RTS, Radio Canada, France Radio, …).<br /></p>
				<br>	
				<p>DOCPOD propose aussi à l’écoute des conférences, des cours et des débats sur des sujets variés : mathématiques, physiques, sciences du vivant, sciences humaines, art et littérature, histoire, dont les sources sont issues du Collège de Belgique, de l’Académie Royale de Belgique et du Collège de France.<br/></p><br>
					
				<p>L’équipe de DOCPOD, constitue des dossiers thématiques sur des sujets précis dans lesquels vous trouverez des documentaires radiophoniques provenant de différentes sources.<br /></p><br>
					
				<p>Sur DOCPOD, il est également possible de réécouter les derniers journaux parlés ainsi que les émissions d’actualités diffusées sur les différentes radios publiques francophones, depuis la rubrique Revue de presse.<br /></p><br>
					
				<p>Enfin, nous vous invitons à vous <a href="Newuser.html#inscription">inscrire</a> sur DOCPOD pour bénéficier des facilités liées à votre compte (historique d’écoute, abonnements, …) .<br /></p><br>
				<p>L’équipe de DOCPOD vous souhaite une bonne écoute.</p>
 							
				</article>
			</section>

<!-- A PROPOS -->

			<section id="apropos">
				<article class="art-apropos">
					<h3>à Propos :</h3>
					<p></p>
				</article>
			</section>

<!-- FOOTER -->

			<footer id="footer">
				<article id="contacts">
					<h3>CONTACTS :</h3>
						<a href="mailto:docpodprojet@gmail.com">docpodprojet@gmail.com</a>
						<a href="mailto:thomas.g.pauly@gmail.com">thomas.g.pauly@gmail.com</a>
						<a href="mailto:savinienpeeters@hotmail.com">savinienpeeters@hotmail.com</a>
				</article>
				
				<article id="contacts">
					<h3>PARTENAIRES :</h3>
						<a href="https://bibliothequedesaintjosse.wordpress.com/">Bibliothèque communale de Saint-Josse-ten-Noode</a>
						<a href="http://biblioxl.be/">Bibliothèque communale francophone d'Ixelles</a>
						<a href="http://www.mabiblio.be/">Les bibliothèques de Schaerbeek-Evere</a>
						<a href="https://www.pointculture.be/bruxelles/">Point Culture</a>
				</article>
			</footer>
	</body>
</html>