<a class='retour_admin' href="./index.php?uc=admin">Retour à l'accueil de l'espace administrateur</a>
<div class='plats'>
	<div class=listePlats>
		<ul>
			<li><p style='text-align: center;' id='retourAccueilPlats'>--- Ajouter un plat ---</p><input id='0' hidden value='0'></li>
		<?php foreach ($plats as $p) 
		{
			echo "<li><p class='liplat'>".$p->getName()."</p><input id='id_plat' hidden value='".$p->getId()."'></li>";
		} ?>
		</ul>
	</div>
	<div class=detailsPlats>
	<div class="accueilPlats">
		<h4>Ajoutez un nouveau plat :</h4>
		<br>
		<form action="./index.php?uc=addDish" method="post">
			<?php include './view/php/formPlats.php' ;?>
			<input type="submit" value="Créer le plat">
		</form>
	</div>

	<div hidden class='modifierPlat'>
		<h4>Modifier un plat :</h4>
		<br>
		<form action='./index.php?uc=updateDish' method='post'>
			<input hidden type="int" name="idPlat">
			<?php include './view/php/formPlats.php' ;?>
			<input type="submit" value="Modifier le plat">
		</form>

	</div>

	</div>
</div>