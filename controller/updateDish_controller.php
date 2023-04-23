<?php 



if(isset($_POST['idPlat'],$_POST['name'], $_POST['price'],$_POST['description'],$_POST['course']))	
{
	$listAllergens = Allergen::getAllergens(); //liste d'objets allergènes
	$idPlat=htmlspecialchars($_POST['idPlat'], ENT_QUOTES, 'UTF-8');
	$name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8'); 
	$price =str_replace('€','',htmlspecialchars($_POST['price']), ENT_QUOTES, 'UTF-8');
	$description = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8'); 
	$course = htmlspecialchars($_POST['course'], ENT_QUOTES, 'UTF-8'); 
	if(isset($_POST['available']) and $_POST['available'])=='on'
		{$available=1;} else{ $available=0;}
	$allergens =[];


	foreach ($listAllergens as $a) 
	{
		if(isset($_POST[$a->getName()]) and $_POST[$a->getName()])=='on'
		{
			$allergens[]=$a;
		}
	}


	$plat = new Dish($idPlat,$name,$price,$description,$available,$course,$allergens);
	$plat->updateDish();
	header('Location: index.php?uc=plats');	
}

else
{

	header('Location: index.php?uc=plats');		
}


 ?>
