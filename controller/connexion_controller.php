<?php 



if(isset($_POST['mail'], $_POST['password']))	
{
	$mail = htmlspecialchars($_POST['mail'], ENT_QUOTES, 'UTF-8');
	$password = md5(htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8'));
	
	// Vérification de la validité des identifiants
	$admin = Admin::signIn($mail,$password);
	if($admin!=null) 
	{	
		// Enregistrement de l'administrateur en session	
		$_SESSION['admin'] = $admin;
		header('Location: index.php?uc=admin');	
	}
		
		// Redirection vers la page d'accueil
	else
	{
		header('Location: index.php?uc=admin');		
	}
}

 ?>