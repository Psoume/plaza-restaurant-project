
<ul>
	
	<li>
		<label for="name">Nom du plat :</label>
		<input type="text" name="name" required>

		<label for="price">Prix :</label>
		<input type="int" name="price" required>
	</li>
	<li>
		<label for="description">Description :</label>
		<input type="text" name="description">
	</li>
	<li>
		<label for="available">Disponible sur la carte :</label>
		<input type="checkbox" name="available">
	</li>
	<li>
		<label for="course">Choisir un type de plat :</label>
		<select name="course" id="course"> 
		<?php foreach ($courses as $c) 
		{
			echo "<option value='".$c[0]."'>".$c[1]."</option>";
		} ?>
	</select>
	</li>
	<fieldset>
		<legend>Allergènes :</legend>
		<?php foreach ($allergens as $a) {
			echo "<div><input type='checkbox' id='".$a->getId()."' name='".$a->getName()."'><label for='".$a->getName()	."'>".$a->getName()."</label></div>";
		} ?>
	</fieldset>
</ul>

	