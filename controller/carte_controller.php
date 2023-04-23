<?php  
$dishes = Dish::getDishes();
$entrees = [];
$plats = [];
$desserts = [];
foreach ($dishes as $d) 
{
	switch ($d->getCourse()[1])
	{
		case 'Entrée':
			$entrees[]=$d;
			break;
		case 'Plat':
			$plats[]=$d;
			break;
		case 'Dessert':
			$desserts[]=$d;
			break;
	}
}
include './view/php/header.php'; 
include './view/php/carte.php'; 
include './view/php/footer.php'; 
?>