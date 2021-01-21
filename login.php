

<!--Ceci est pour le formulaire de connexion du membre -->
<form method="POST" action="login.php">
<p> <i>Pseudo:</i></p>
<input type ="text" name="username" placeholder="Indiquez votre pseudo" required>
<p>Password:</p>
<input type="password" name="password" placeholder="Indiquez votre password" required>

<input type="submit" value="Se connecter" name="submit" >

</form>
<DOCTYPE!html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Connexion</title>
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
//débuter une nouvelle session
session_start();
//si l'utilisateur clique sur le bouton se connecter
if (isset($_POST['submit']))
{

	$username=htmlspecialchars(trim($_POST['username']));
	$password=htmlspecialchars(trim($_POST['password']));
	//si tous les champs sont remplis
	if($username&&$password)
	{
		//Pour le cryptage du mot de passe 
		$password=md5($password);
		//Pour se connecter à ma base de donnée déja crée sur Phpmyadmin
		$connect=mysqli_connect('localhost','root','','amira_base');
		
		//Pour faire une requette
$roq="SELECT * FROM utilisateurs WHERE username='$username' AND password='$password'";
//vérifier les informations saisis existent   dans ma base de donnée 
		 $reg=mysqli_query($connect,$roq);
		 
		 $ligne=mysqli_fetch_assoc($reg);
		 //si on trouve ses indormations dans notre base 
		 if ($ligne)
		 {
			 $_SESSION['username']=$username;
			 if($ligne['role']=='admin'){
				 $_SESSION['role']='admin';
			 } else {
				 $_SESSION['role']='user';
			 }
				 
				 
			 //redirection vers la page du membre
			 header('Location:membre.php');
			 // si on le mdp et le pseudo ne figurent pas dans otre base  de données 
		 }else echo"Pseudo ou passord incorrect";
// si on remplis pas tous les champs
}else echo"Veuillez saisir tous les champs";
}
?>

<div style="text-align:bouton"> <a href="PageDAcceuil.php"> Retour à La page principale </div> 
</body>
</head>
</html>