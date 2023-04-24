<?php 



if(isset($_GET['id']))
{
	$id = htmlspecialchars($_GET['id']);

	$plat = Dish::getDishbyID($id);

	$plat->deleteDish();
	header('Location: index.php?uc=plats');	
}

else
{
	header('Location: index.php?uc=plats');	
	echo 'coucou';	
}


 ?>
