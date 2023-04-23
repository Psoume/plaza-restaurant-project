
<div class='carte'>
	<h2>La Carte</h2>
	<h3>Entrées</h3>
	<table>
			<?php foreach ($entrees as $e) 
			{
				echo '<tr><td>'.$e->getName().'</td><td>'.$e->getPrice().'€</td></tr>';
			} ?>
	</table>
	
	<h3>Plats</h3>
	<table>
			<?php foreach ($plats as $p) 
			{
				echo '<tr><td>'.$p->getName().'</td><td>'.$p->getPrice().'€</td></tr>';
			} ?>
	</table>
	<h3>Desserts</h3>
	<table>
			<?php foreach ($desserts as $d) 
			{
				echo '<tr><td>'.$d->getName().'</td><td>'.$d->getPrice().'€</td></tr>';
			} ?>
	</table>
	<div></div>
</div>