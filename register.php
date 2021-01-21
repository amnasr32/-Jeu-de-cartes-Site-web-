<!--J'ai ajouté cette portion du html pour la mise en page-->
<DOCTYPE!html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Page de Connexion</title>
  <link rel="stylesheet" href=" formulaire.css ">
  <style>
   a{
	  font-family: italic;
	  color: white;
  }
  </style>
</head>
<body>

<?php
//si l'utilisateur clique sur le bouton:
if(isset($_POST['submit']))
{
	//htmlentities pour virer tous les tags succeptibles de pirater notre base de données et trim pour virer les espaces
	$username=htmlentities(trim($_POST['username']));
	$password=htmlentities(trim($_POST['password']));
	$repeatpassword=htmlentities(trim($_POST['repeatpassword']));
	//tester si tous les champs sont remplis
	if($username&&$password&&$repeatpassword)
	{
		// tester si le password est bien repeté
		if($password==$repeatpassword)
		{
			//Pour le hashage du mot de passe 
			$password=md5($password);
			//Pour se connecter à ma base de donnée déja crée sur Phpmyadmin sinon le die arrete tt les codes ci dessous
		 $connect = mysqli_connect('localhost','root','','amira_base') or die('Error');
		
		 $roq="SELECT * FROM utilisateurs WHERE username='$username'";
		 // Pour qu'un utilisateur ne tape pas un pseudo déja utilisé
		 $reg=mysqli_query($connect,$roq);
		 $rows=mysqli_num_rows($reg);
		 if ($rows==0){
			//inserer les informations dans la base des données déjà créé
 		 $query=mysqli_query($connect,"INSERT INTO utilisateurs VALUES(0,'user','$username','$password')");
		 die("Inscription terminée <a href='login.php'> Connectez</a> Vous");
		 //si l'utilisateur tape un pseudo déja utilisé
		 }else echo "Ce pseudo a déjà étè utilisé";
		 //Si les 2 passwords ne sont pas identiques
		}else echo"Attention! Les deux passwords doivent etes identiques";
		//si l'utilisateur ne remplit pas tous les champs
	}else echo"Veuillez remplir tous les champs";
}

	?>

<!--Ceci est pour le formulaire d'inscription -->
<form method="POST" action="register.php">
<p>Votre Pseudo:</p>
<input type ="text" name="username" placeholder="Indiquez votre pseudo" required>
<p> Votre password:</p>
<input type="password" name="password" placeholder="Réindiquez votre pseudo" required>
<p>Repetez votre password:</p>
<input type="password" name="repeatpassword" placeholder="Repetez votre password" required><br/><br/>
<input type="submit" value="S'inscrire" name="submit">
</form>
<div style="text-align:bouton"> <a href="PageDAcceuil.php"> Retour à La page principale </div> 
</body>
</head>
</html>