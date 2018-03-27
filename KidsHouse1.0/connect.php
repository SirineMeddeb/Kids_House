<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=kidshouse;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

$pseudo = $_POST['login'];
$pass = $_POST['password'];

$req = $bdd->prepare("SELECT login,password FROM utilisateur where login=:l AND password=:p");
$req->bindValue(':l', $pseudo, PDO::PARAM_STR);
$req->bindValue(':p', $pass, PDO::PARAM_STR);
$req->execute();
//$req->execute(array($pseudo, $pass));
 $red = $req->fetchAll();
 
 if (count($red)==1){ 
	 header('Location: Backoffice_Admin/index.html');
} else {
	//Vider les champs
	header('Location: connexion.php');
}

$req->closeCursor();

?>