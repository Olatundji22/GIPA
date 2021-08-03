<?php
$hostname = "localhost";
$username = "root";
$password ="";
$databaseName = "gipa";

$connect = mysqli_connect($hostname, $username, $password, $databaseName);

if (isset($_GET["CodeDir"]))
{
	$requete = "DELETE FROM direction WHERE CodeDirection= '".$_GET["CodeDir"]."'";
	$result = mysqli_query($connect, $requete);
	header('location: Direction.php');

}

elseif (isset($_GET["Mat"]))
{
	$requete = "DELETE FROM personnel WHERE Matricule= '".$_GET["Mat"]."'";
	$result = mysqli_query($connect, $requete);
	header('location: Personnel.php');

}

elseif (isset($_GET["Serv"]))
{
	$requete = "DELETE FROM service WHERE CodeService= '".$_GET["Serv"]."'";
	$result = mysqli_query($connect, $requete);
	header('location: Service.php');

}

elseif (isset($_GET["Type"]))
{
	$requete = "DELETE FROM type_document WHERE CodeTypeDoc= '".$_GET["Type"]."'";
	$result = mysqli_query($connect, $requete);
	header('location: Type de document.php');

}

elseif (isset($_GET["Doc"]))
{
	$requete = "DELETE FROM document WHERE CodeDoc= '".$_GET["Doc"]."'";
	$result = mysqli_query($connect, $requete);
	header('location: Document.php');

}

elseif (isset($_GET["Dem"]))
{
	$requete = "DELETE FROM demande WHERE NumDemande= '".$_GET["Dem"]."'";
	$result = mysqli_query($connect, $requete);
	header('location: Demande.php');

}

?>