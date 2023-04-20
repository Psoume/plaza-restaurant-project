<footer>
	<div>
		<h3>Contact :</h3>
		<ul>
			<li><i class="fa-sharp fa-solid fa-location-dot"></i> 12 rue du port, XX XXX PAU</li>
			<li><i class="fa-solid fa-phone"></i> XX XX XX XX XX</li>
			<li><i class="fa-solid fa-envelope"></i> restaurant-grand-plaza-pau@orange.fr</li>
		</ul>
		<h3>Horaires :</h3>
		<p>Ouverture : <?php echo $_SESSION['config']["jours"] ; ?></p>
		<br>
		<table>
			<tr>
				<td>MIDI</td>
				<td><?php echo $_SESSION['config']['horaires'][0] ; ?></td>
			</tr>
			<tr>
				<td>SOIR</td>
				<td><?php echo $_SESSION['config']['horaires'][1] ; ?></td>
			</tr>
		</table>
	</div>
	<img src="./view/img/map.png">
<footer>