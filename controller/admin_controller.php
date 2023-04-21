<?php 

if (isset($_SESSION['admin']))
    {
        include './view/php/navAdmin.php';
    	include './view/php/panelAdmin.php';
    }

else{
        include './view/php/connexion_form.php';
    } 

?>