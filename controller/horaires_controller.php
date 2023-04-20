<?php 



if(isset($_POST['ouverture'], $_POST['midi'],$_POST['soir']))	
{
	$ouverture = htmlspecialchars($_POST['ouverture'], ENT_QUOTES, 'UTF-8');
	$midi = htmlspecialchars($_POST['midi'], ENT_QUOTES, 'UTF-8');
	$soir = htmlspecialchars($_POST['soir'], ENT_QUOTES, 'UTF-8');
	$notes = htmlspecialchars($_POST['notes'], ENT_QUOTES, 'UTF-8');
	
	$jsonString = file_get_contents('./config.json');
	$data = json_decode($jsonString, true);

	$data["jours"] = $ouverture;
	$data["horaires"][0] = $midi;
	$data["horaires"][1] = $soir;
	$data["notes"] = $notes;

	$newJsonString = json_encode($data,JSON_PRETTY_PRINT);
	file_put_contents('./config.json', $newJsonString);

	header('Location: index.php?uc=admin');	
}

else
{
	header('Location: index.php?uc=admin');		
}


 ?>