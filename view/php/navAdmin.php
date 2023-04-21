<div class='navAdmin'>
	<div>
		<span><?php echo $_SESSION['admin']->getFirstName()." ".strtoupper($_SESSION['admin']->getName()) ?></span>
		<a href="./index.php?uc=deconnexion">Deconnexion</a>
	</div>
	<a class='retourSite' href="./index.php?">Revenir au site</a>
</div>