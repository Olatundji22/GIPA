<?php
session_start();

$bdd = new PDO('mysql:host=localhost;dbname=gipa', 'root', '');


$hostname = "localhost";
$username = "root";
$password ="";
$databaseName = "gipa";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);
$reqpers = "SELECT * FROM personnel";
$resultat = mysqli_query($connect, $reqpers);

if (isset($_POST["Modifier"]))
{
	$requete = "UPDATE personnel SET Matricule= '".$_POST["Mat"]."' , NomPerso= '".$_POST["nom"]."', PrenPerso= '".$_POST["prenom"]."',TelPerso= '".$_POST["mobile"]."', AdressPerso= '".$_POST["adresse"]."', CodeService= '".$_POST["Service"]."'  WHERE Matricule= '".$_POST["Matri"]."' ";
	$result = mysqli_query($connect, $requete);
	header('location: Personnel.php');
}



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
								<a href="#" title="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">PERSONNEL<span class="caret"></span></a>
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
		</header><br>
		
		<div class="container">
			<div class="btn-toolbar">
				<a href="Formulaire Personnel.php"><button class="btn btn-primary">Nouveau</button></a>
			</div><br>
			<div class="well">
				<table class="table">
					<thead>
						<tr>
							<th>Matricule</th>
							<th>Nom</th>
							<th>Prénom</th>
							<th>Téléphone</th>
							<th>Adresse</th>
							<th>Service</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						
						<?php while($row1 = mysqli_fetch_array($resultat)):;?>
						<tr>
							<td><?php echo $row1["Matricule"]; ?></td>
							<td><?php echo $row1[1]; ?></td>
							<td><?php echo $row1[2]; ?></td>
							<td><?php echo $row1[3]; ?></td>
							<td><?php echo $row1[4]; ?></td>
							<td><?php echo $row1[5]; ?></td>
							<td><a href="ModifierPersonnel.php?Matri=<?= $row1["Matricule"]?>"><button type="button" class="btn btn-warning">Modifier</button></a>
							<a href="Supprimer.php?Mat=<?= $row1["Matricule"]?>"><button type="button" class="btn btn-danger">Supprimer</button></a></td>
						</tr>
						<?php endwhile; ?>
						
					</tbody>
				</table>
			</div>

			
		</div>
		
   </body>
   

</html>