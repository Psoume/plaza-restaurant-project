<a class='retour_admin' href="./index.php?uc=admin">Retour à l'accueil de l'espace administrateur</a>
<br>
<div class='profil'>
<form action='./index.php?uc=updateAdmin' method='post'>
	<ul>
	
	<li>
		<label for="mailAdmin">Adresse Mail :</label>
		<input type="email" name="mailAdmin" value='<?php echo $_SESSION['admin']->getMail() ?>' >
	</li>
	<li>
		<label for="password">Mot de passe :</label>
		<input type="password" name="password" value='********' >
	</li>
	<li>
		<label for="name">Nom :</label>
		<input type="text" name="name" value='<?php echo $_SESSION['admin']->getName() ?>'>
	</li>
	<li>
		<label for="firstName">Prénom :</label>
		<input type="text" name="firstName" value='<?php echo $_SESSION['admin']->getFirstName() ?>' >
	</li>
</ul>

	<input type="submit" value="Modifier le profil">
</form>
</div>
