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
<!-- <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Grenze:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inika:wght@400;700&display=swap" rel="stylesheet"> -->
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
