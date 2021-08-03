<?php

$bdd = new PDO('mysql:host=localhost;dbname=gipa', 'root', '');

if(isset($_POST['Valider']))
{
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$pass = htmlspecialchars($_POST['pass']);
	if(!empty($_POST))
	{
		$requser = $bdd->prepare("SELECT * FROM utilisateur WHERE Identifiant=? AND Password=?");
		$requser->execute(array($pseudo, $pass));
		$userexist = $requser->rowCount();
		if($userexist == 1)
		{
			header('location: Acceuil.php');
		}
		else
		{
			$erreur = "Mauvais indentifiant ou mot de passe!!!";
		}
		
		
	}
	else
		{
			$erreur = "Vous devez remplir tout!!!";
		}
	
}

?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Gestion Informatisée du Processus d'Archivage des Actes Administratifs</title>
    
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&amp;subset=latin-ext" rel="stylesheet">
    
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
    
   </head>
   
   <body>
		<div class="container">
			<div class="card card-container">
				<!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
				<img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
				<p id="profile-name" class="profile-name-card"></p>
				<form class="form-signin" role="form" action="#" method="POST">
					<span id="reauth-email" class="reauth-email"></span>
					<input type="texte" name="pseudo" class="form-control" placeholder="Votre identifiant" ><br>
					<input type="Password" name="pass" class="form-control" placeholder="Mot de passe" > <br>
					<?php
						if(isset($erreur))
						{
							echo $erreur;
						}
					?>
					<button class="btn btn-lg btn-primary btn-block btn-signin" name="Valider" type="submit">Valider</button>
				</form><!-- /form -->
			</div><!-- /card-container -->
		</div><!-- /container -->
   </body>
   

</html>