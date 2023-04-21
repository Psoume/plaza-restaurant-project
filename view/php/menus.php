<a class='retour_admin' href="./index.php?uc=admin">Retour à l'accueil de l'espace administrateur</a>
<h3 style='margin-left:10vw'>Gérer les menus</h3>
<div class='menus'>
<div class='menuMidi'></div>
<div class='menuSoir'></div>
<?php 

foreach ($menuMidi->getDishes() as $d ) {
	echo $d->getName();
}
?>
</div>