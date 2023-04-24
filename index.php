<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>
      Projet Plaza
  </title>
<?php 
      include './model/bddconnector.php'; 
      include './model/admin.php';

      include './model/allergen.php';
      include './model/dish.php'; 

      include './model/menu.php'; 
 
      if (!isset($_SESSION))
      {
        session_start();
        $_SESSION['config']=json_decode(file_get_contents('./config.json'),true);
      }

      ?>
 <link rel="stylesheet" media="screen and (min-width: 800px)" href="./view/style.css">
<link rel="stylesheet" media="screen and (max-width: 800px)" href="./view/styleMobile.css">

<!-- Polices -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700;900&family=Work+Sans:ital,wght@0,100;0,300;0,800;0,900;1,100;1,300&display=swap" rel="stylesheet">
<!-- End Polices -->
<script src="https://kit.fontawesome.com/af6c2eb4a4.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>

<body>

 <?php 

 if (isset($_GET['uc'])) 
 {
   include "./controller/".$_GET['uc']."_controller.php"; 
 }
 else
 {
   include "./controller/accueil_controller.php"; 
 }
 ?>

  <script src="./view/script.js"></script>

  <!-- FIN -->
  
</body>
</html>
