<?php  

?>

<?php 

if (isset($_SESSION['admin']))
    {
		$plats = Dish::getDishes(); //liste d'objets Dish
		$allergens = Allergen::getAllergens(); //liste d'objets allergènes
		$courses = Dish::listCourses(); //liste de listes (id,name)
		$menus = Menu::getMenus();
		$menuMidi=$menus[0];
		$menuSoir = $menus[1];
		include './view/php/navAdmin.php';
		include './view/php/menus.php'; 
    }

else{
        include './view/php/connexion_form.php';
    } 

?>