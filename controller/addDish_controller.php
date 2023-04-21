<?php 



if(isset($_POST['name'], $_POST['price'],$_POST['description'],$_POST['course']))	
{
	
	$listAllergens = Allergen::getAllergens(); //liste d'objets allergènes
	$name = $_POST['name']; 
	$price = str_replace('€','',$_POST['price']);
	$description = $_POST['description']; 
	$course = [$_POST['course'],Dish::findCourse($_POST['course'])]; 
	if(isset($_POST['available']) and $_POST['available']=='on')
		{$available=1;} else{ $available=0;}
	$allergens =[];


	foreach ($listAllergens as $a) 
	{
		if(isset($_POST[$a->getName()]) and $_POST[$a->getName()]=='on')
		{
			$allergens[]=$a;
		}
	}


	$plat = new Dish(0,$name,$price,$description,$available,$course,$allergens);
	$plat->createDish();
	header('Location: index.php?uc=plats');	
}

else
{
	header('Location: index.php?uc=plats');		
}


 ?>
