<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=gipa', 'root', '');
if(isset($_POST['Enregistrer']))
{
	$Mat = htmlspecialchars($_POST['Mat']);
	$nom = htmlspecialchars($_POST['nom']);
	$prenom = htmlspecialchars($_POST['prenom']);
	$mobile = htmlspecialchars($_POST['mobile']);
	$adresse = htmlspecialchars($_POST['adresse']);
	$Service = htmlspecialchars($_POST['Service']);
	if(!empty($_POST))
	{
		$reqPersonel = $bdd->prepare("SELECT * FROM personnel WHERE Matricule=?");
		$reqPersonel->execute(array($Mat));
		$Matexist = $reqPersonel->rowCount();
		if($Matexist == 0)
		{
			$insertperso=$bdd->prepare("INSERT INTO personnel(Matricule, NomPerso, PrenPerso, TelPerso, AdressPerso, CodeService) VALUES(?, ?, ?, ?, ?, ?)");
			$insertperso->execute(array($Mat, $nom, $prenom, $mobile, $adresse, $Service));
			header('location: Personnel.php');
			
		}
		else
		{
			$erreur = "Ce Matricule existe deja dans la base de donnés!!!";
		}
	}
}

$hostname = "localhost";
$username = "root";
$password ="";
$databaseName = "gipa";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$reqcomboserv = "SELECT * FROM service";
$resultat = mysqli_query($connect, $reqcomboserv);

?>
<html class="ola">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Gestion Informatisée du Processus d'Archivage des Actes Administratifs</title>
    
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&amp;subset=latin-ext" rel="stylesheet">
    
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
    
   </head>
   
   <body class="ola">
		<header>
		<div class="top">
				<div class="container">
					<div class="row">
						<div class="col-sm-6">
							<p>Gestion Informatisée du Processus d'Archivage des Actes Administratifs</p>
						</div>
					</div>
				</div>
			</div>
		
		
   			<nav class="navbar navbar-default">
				<div class="container">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-navbar-collapse">
						<span class="sr-only">Toggle Navigation</span>
						<i class="fa fa-bars"></i>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-navbar-collapse">
						<ul class="nav navbar-nav main-navbar-nav">
							<li><a href="Acceuil.php" title="">ACCEUIL</a></li>
							<li class="active" class="dropdown">
								<a href="Personnel.php" title="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PERSONNEL<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="Personnel.php" title="">Les Personnels</a></li>
									<li><a href="Formulaire Personnel.php" title="">Enrégistrer un Personnel</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" title="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">DIRECTION<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="Direction.php" title="">Les Directions</a></li>
									<li><a href="Formulaire Direction.php" title="">Enrégistrer une Direction</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" title="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">SERVICE<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="Service.php" title="">Les Services</a></li>
									<li><a href="Formulaire Service.php" title="">Enrégistrer un Service</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" title="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">DOCUMENT<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="Document.php" title="">Les Documents</a></li>
									<li><a href="Formulaire Document.php" title="">Enrégistrer un Document</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" title="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">TYPE DE DOCUMENT<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="Type de document.php" title="">Les Types de Documents</a></li>
									<li><a href="Formulaire Type de document.php" title="">Enrégistrer un Type de Document</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" title="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">DEMANDE<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="Demande.php" title="">Les Demandes</a></li>
									<li><a href="Formulaire Demande.php" title="">Enrégistrer une Demande</a></li>
								</ul>
							</li>
						</ul>                           
					</div><!-- /.navbar-collapse -->                
					<!-- END MAIN NAVIGATION -->
				</div>
			</nav>
		</header>
		<div class="container">
			<div class="col-md-5">
				<div class="form-area">  
					<form role="form" action="#" method="POST">
						<br style="clear:both">
						<h3 style="margin-bottom: 25px; text-align: center;">Enregistrer un Personnel</h3>
						<div class="form-group">
							<input type="text" class="form-control" id="Mat" name="Mat" placeholder="Matricule" value="<?php if(isset($Mat)) { echo $Mat; } ?>" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" value="<?php if(isset($nom)) { echo $nom; } ?>" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" value="<?php if(isset($prenom)) { echo $prenom; } ?>" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Tel" value="<?php if(isset($mobile)) { echo $mobile; } ?>" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse" value="<?php if(isset($adresse)) { echo $adresse; } ?>" required>
						</div>
						<select class="form-control" name="Service">
							<?php while($row1 = mysqli_fetch_array($resultat)):;?>
							<option value="<?php echo $row1[0]; ?>"><?php echo $row1[0]; ?></option>
							<?php endwhile; ?>
						</select><br>
            
						<button type="submit" name="Enregistrer" class="btn btn-primary pull-right">Enrégistrer</button>
					</form>
					<?php
						if(isset($erreur))
						{
							echo $erreur;
						}
					?>
				</div>
			</div>
		</div>
   </body>
   

</html>