

<?php 

If (!isset($_SESSION["username"]) || empty($_SESSION["username"])){
?>
<nav class="nav">
	<ul class="nav__menu">
		<li class="nav__menu-item">Login
			<ul class="nav__submenu">
	
					<form action="" method="POST">
						<li class="nav__submenu-item"><input type="text" name="username" placeholder="Nom" value="<?php echo $olduser ?>"></li>
						<li class="nav__submenu-item"><input type="password" name="mdp" placeholder="Mot de passe"></li>
						<li class="nav__submenu-item"><input type="submit" value="Connexion"></li>
					</form>

						<?php echo $messageLogin; ?>
				</ul>
				</li>
				</ul>
				</nav>		
<?php

} else {
?>

<nav class="nav">
	<ul class="nav__menu">
		<li class="nav__menu-item">Login
			<ul class="nav__submenu">
					<?php echo $messageLogin; ?>
	<form action="" method="POST">
		<li class="nav__submenu-item"><input type="submit" name="deconnexion" value="Se Déconnecter"></li>
	</form>
			</ul>
		</li>
	</ul>
</nav>
<?php	
}
?>



