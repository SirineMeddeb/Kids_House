<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=kidshouse;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
$nom = $_POST['nom'];
$prenom = $_POST['prenom']; 
$mail = $_POST['mail'];
$pseudo = $_POST['login'];
$pass = $_POST['password'];
// echo $nom, $prenom, $mail, $pseudo, $pass; 
	
	$req = $bdd->prepare("INSERT INTO utilisateur (login, password, nom, prenom, mail) VALUES (:l, :pas, :n, :p, :m);");
	if($req->execute(array(
		'l' => $pseudo,
		'pas' => $pass,
		'n' => $nom,
		'p' => $prenom,
		'm' => $mail
		)))
		{
		//echo "<script>alert(\"Bien enregistrée!!\")</script>"; 
		 header('Location: connexion.php?Verif=1');
		
	} else {
		//Vider les champs
		 //echo "<script>alert(\"Impossible d'ajouter!!\")</script>"; 
		header('Location: registre.php?test=1');
		
	}
	$req->closeCursor();

?>