<?php

	try
	{
		// On se connecte à MySQL
		$bdd = new PDO('mysql:host=localhost;dbname=kidshouse;charset=utf8', 'root', '');
		echo("Connexion done!!");
	}
	catch(Exception $e)
	{
		// En cas d'erreur, on affiche un message et on arrête tout
			die('Erreur : '.$e->getMessage());
	}

	
	function upload_image()
	{
		if(isset($_FILES["user_image"]))
		{
			$extension = explode('.', $_FILES['user_image']['name']);
			$new_name = rand() . '.' . $extension[1];
			$destination = './upload/' . $new_name;
			move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);
			return $new_name;
		}
}

	echo ("First Name".$_POST["first_name"]."Last Name".$_POST["last_name"]);

		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		echo $image;
		$statement = $bdd->prepare("
			INSERT INTO enfant (nom, prenom, pboto,id_Parent) 
			VALUES (:nom, :prenom, :image,301)
		");
		$result = $statement->execute(
			array(
				':nom'	=>	$_POST["first_name"],
				':prenom'	=>	$_POST["last_name"],
				':image'		=>	$image
			)
		);
		//echo ($operation."First Name".$_POST["first_name"]."Last Name".$_POST["last_name"]);
		
?>