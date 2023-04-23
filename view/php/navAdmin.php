<div class='navAdmin'>
	<div>
		<a href="./index.php?uc=profil"><span><?php echo $_SESSION['admin']->getFirstName()." ".strtoupper($_SESSION['admin']->getName()) ?></span></a>
		<a href="./index.php?uc=deconnexion">Deconnexion</a>
	</div>
	<a class='retourSite' href="./index.php?">Revenir au site</a>
</div>