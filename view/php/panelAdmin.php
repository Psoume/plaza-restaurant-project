<div class='navAdmin'>
	<div>
		<span><?php echo $_SESSION['admin']->getFirstName()." ".strtoupper($_SESSION['admin']->getName()) ?></span>
		<a href="./index.php?uc=deconnexion">Deconnexion</a>
	</div>
	<a class='retourSite' href="./index.php?">Revenir au site</a>
</div>

<div class='panelAdmin'>


  <div class="Plats">
  	<div>
  		<h3>Gérer les plats</h3>
  	</div>
  </div>


  <div class="Menus">
  	  <div>
  		<h3>Gérer les menus</h3>
  	</div>
  </div>


  <div class="Images">
  	<form action="./index.php?uc=images" method="post" enctype="multipart/form-data">
  		<div class='galerie_admin'>
  			<div class='img1'>
				<img src="./view/img/<?php echo $_SESSION['config']['galerie'][0] ; ?>">
				<input type="file" id="img1" name="img1" accept='image/png, image/jpeg, image/jpg' >
			</div>
			<!-- onchange="previewPicture(this)" -->
			<div class='img2'>
				<img src="./view/img/<?php echo $_SESSION['config']['galerie'][1] ; ?>">
				<input type="file" id="img2" name="img2" accept='image/png, image/jpeg, image/jpg' >
			</div>
			<div class='img3'>
				<img  src="./view/img/<?php echo $_SESSION['config']['galerie'][2] ; ?>">
				<input type="file" id="img3" name="img3" accept='image/png, image/jpeg, image/jpg' >
			</div>
			
		</div>
		<input type="submit" name="change_images" value="Enregistrer">
	</form>
  </div>


  <div class="Horaires">
  	<h3>Horaires</h3>
  	<form action="./index.php?uc=horaires" method="post">
  		<label for="ouverture">Jours d'ouverture:</label>
  		<input type="text" id="ouverture" name="ouverture" value="<?php echo $_SESSION['config']["jours"] ; ?>" required>
  		<label for="midi">Midi:</label>
  		<input type="text" id="midi" name="midi" value="<?php echo $_SESSION['config']['horaires'][0] ; ?>"required>
  		<label for="soir">Soir:</label>
  		<input type="text" id="soir" name="soir" value="<?php echo $_SESSION['config']['horaires'][1] ; ?>"required>
  		<label for="notes">Notes:</label>
  		<textarea id="notes" name="notes" value="" ></textarea>
  		<input type="submit" value="Enregistrer">
	</form> 
  </div>
</div>