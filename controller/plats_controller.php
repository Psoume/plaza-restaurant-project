<?php  

?>

<?php 

if (isset($_SESSION['admin']))
    {
		$plats = Dish::getDishes(); //liste d'objets Dish
		$allergens = Allergen::getAllergens(); //liste d'objets allergènes
		$courses = Dish::listCourses(); //liste de listes (id,name)
		include './view/php/navAdmin.php';
		include './view/php/plats.php'; 
    }

else{
        include './view/php/connexion_form.php';
    } 

?>