<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>
      <?php 
      include './modele/bddconnector.php'; 

      if (!isset($_SESSION))
      {
        session_start();
      }
      if (isset($_GET['uc'])) {
      }else{
          echo "accueil"; 
      }
      ?>
  </title>

  <link rel="stylesheet" href="./vue/style.css">

<!-- Polices -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700;900&family=Work+Sans:ital,wght@0,100;0,300;0,800;0,900;1,100;1,300&display=swap" rel="stylesheet">
<!-- End Polices -->

</head>

<body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

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

  <script src="./vue/script.js"></script>

  <!-- FIN -->
  
</body>
</html>
