<!DOCTYPE html>
<html>
<body>
<?php echo $message;

If (!isset($_SESSION["username"]) || empty($_SESSION["username"])){
?>
	<form action="" method="post">
		<input type="text" name="username" placeholder="login" value="<?php echo $olduser ?>"><br>
		<input type="password" name="mdp" placeholder="password"><br>
		<input type="submit" value="Connexion">
	</form>
	<hr>
<?php

} else {
?>
	<form action="" method="post">
		<input type="submit" name="deconnexion" value="Se Déconnecter">
	</form>
	<hr>
<?php	
}
?>
</body>
</html>