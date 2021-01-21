
<DOCTYPE!html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Profil</title>

  <style>
  body{
	background-color:#20B2AA ;
  color: gold;
  text-align:left;
  font-size: 20px;
  }
  form p{
	
	font-style: italic;
	font-size: 20px;
	font-weight:20;
	
	margin-bottom: 15px;
	padding:20 px 0 ; 
}
form input{
	 width: 35%;
	overflow: hidden;
	font-size: 15px;
	padding: 8px 0;
	margin: 8px 0 ;
	font-family: sans-serif;
	border-bottom: 20 px solid;
}
	input{
	 color: grey;
 }
 a{
	 font-style:italic;
	 color:gold;
	 
 }
	
	 
 
</style>
</head>
<body>

<?php
session_start();
if(isset($_SESSION['username'])){
			
echo" USER:"."".$_SESSION['username']; 
 

?>
<hr/>

</br>

<?php

	if(isset($_POST['submit'])){
		//mysqli_real_escape_string pour empecher les injection sql_regcase
		// htmlspecialchars pouch empecher les utilisateurs de coder html dans les zones de code text
		//trim : enlever tout les espaces de debut et de fin
		$pseudo=(htmlspecialchars(trim($_POST['pseudo'])));
	if(empty($pseudo)){
			echo"Veuillez complétez ce champs!";
		}else {
			 $connect= mysqli_connect('localhost','root','','amira_base');
	//si la connexion échoue:
    if(!$connect){
    	echo mysqli_connect_error($connect);exit();
    }
	$roq="SELECT * FROM utilisateurs WHERE username='{$_SESSION['username']}'";
	 // Pour qu'un utilisateur ne tape pas un pseudo déja utilisé
	 $reg=mysqli_query($connect,$roq);
	$rows=mysqli_num_rows($reg);
	if($rows==0){
		//Le traitement : changement du pseudo
		$query=mysqli_query($connect,"UPDATE utilisateurs SET username='$pseudo' WHERE username='{$_SESSION['username']}'")
		or die (mysqli_error());
		
		header("Location:login.php");
		
	} else echo "Ce pseudo est déjà utilisé! Veuillez choisir un autre";
		}
	}
		?>
		
<form method="POST">
<p> Votre nouveau pseudo</p>
<input type="text" name="pseudo" placeholder="Indiquez votre pseudo" required> 
<br/><br/>
<input type="submit" name="submit" value="changer">
</form>
<hr/>
<?php		
	
if(isset($_POST['subpass']))
	
{
	$o_password=htmlspecialchars(trim($_POST['o_password']));
	$n_password=htmlspecialchars(trim($_POST['n_password']));
	$r_password=htmlspecialchars(trim($_POST['r_password']));
	

	 //test de remplissage et identité des champs egaux
	if(empty($o_password))
	{
		echo"Veuillez saisir votre ancien mot de passe";
	} else if ($n_password!=$r_password)
	{
		echo"Vos nouveaux mots de passe sont différents";
	
	}else{
	$o_password=md5($o_password);
		//on se connecte à notre base de données
	$connect= mysqli_connect('localhost','root','','amira_base');
	//si la connexion échoue:
    if(!$connect){
    	echo mysqli_connect_error($connect);exit();
    }
	 // Pour qu'un utilisateur ne tape pas un password déja utilisé
	 $roq="SELECT * FROM utilisateurs WHERE username='{$_SESSION['username']}'AND password='$o_password'";
	$query=mysqli_query($connect,$roq)or die (mysqli_error());
	$rows=mysqli_num_rows($query);
	if($rows!=0){
     //Le traitement du nouveau mot de passe:
	    $n_password=md5($n_password);
		mysqli_query($connect,"UPDATE utilisateurs SET password='$n_password' WHERE username='{$_SESSION['username']}'");
		header("Location:login.php");
		}else {
		echo"L'ancien mot de passe est incorrect!";
		
}
}
}		
}

?>

	<hr/>
	

<form method="POST">
<p> Ancien mot de passe</p>
<input type="password" name="o_password" placeholder="Indiquez votre ancienne password" >
<p> Nouveau mot de passe </p> 
<input type="password" name="n_password"placeholder="Indiquez votre nouvelle password" >
<p> Répeter nouveau mot de passe </p>
<input type ="password" name="r_password"placeholder="Répeter votre password" >
<br/><br/>
<input type ="submit" name="subpass" value="changer de mot de passe">
</form>

</br>
	<hr/>
<div style="font-style:italic; color:gold"> <a href="membre.php"> Retour à la page précedente </div>

</body>

</html>