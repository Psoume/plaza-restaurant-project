<?php 

include $_SERVER['DOCUMENT_ROOT'].'/model/bddconnector.php';
include $_SERVER['DOCUMENT_ROOT'].'/model/dish.php';
include $_SERVER['DOCUMENT_ROOT'].'/model/allergen.php';


if (isset($_REQUEST['id']))
{
    $dish = Dish::getDishbyID($_REQUEST['id']);

    echo json_encode($dish);  

}

 ?>