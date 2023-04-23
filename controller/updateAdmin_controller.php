<?php 

if(isset($_POST['mailAdmin'],$_POST['password'], $_POST['name'],$_POST['firstName']))  
{
    $idAdmin = htmlspecialchars($_SESSION['admin']->getIdAdmin(), ENT_QUOTES, 'UTF-8');
    $mailAdmin=htmlspecialchars($_POST['mailAdmin'], ENT_QUOTES, 'UTF-8');
    $password = md5(htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8')); 
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $firstName = htmlspecialchars($_POST['firstName'], ENT_QUOTES, 'UTF-8'); 
    
   $_SESSION['admin']->setMail($mailAdmin);
   $_SESSION['admin']->setPassword($password);
   $_SESSION['admin']->setName($name);
   $_SESSION['admin']->setFirstName($firstName);

   $_SESSION['admin']->changeMail();
   $_SESSION['admin']->changePassword();
   $_SESSION['admin']->changeName();
   $_SESSION['admin']->changeFirstName();


   // on change l'email dans json.config (changement dans le footer du site)
    $jsonString = file_get_contents('./config.json');
    $data = json_decode($jsonString, true);
    $data["email"] = $mailAdmin;
    $newJsonString = json_encode($data,JSON_PRETTY_PRINT);
    file_put_contents('./config.json', $newJsonString);

    header('Location: index.php?uc=profil'); 
}

else
{

    header('Location: index.php?uc=profil');     
}
 ?>