
	<form action="" method="POST">
	<p>
		<label for "pseudo">Pseudo</label> : <input type="text" name="pseudo" placeholder="Pseudo" value="<?php echo $pseudo?>"></br>
		<label for "message">Message</label> : <input type="text" name="message" placeholder="Message"></br>
		<input type="submit" name="Envoyer" value="Envoyer votre message">
	</p>
	</form>


<p><?php $minichat = new Messagechat() ?> </p>
<p><?php $minichat->affichage_Minichat($id) ?></p>