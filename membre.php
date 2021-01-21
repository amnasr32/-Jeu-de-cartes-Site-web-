<?php 
//Démarrer une nouvelle session
session_start();
//message de bienvenue pour le membre
if(isset($_SESSION['username'])){
echo "Bienvenue ".$_SESSION['username'];

	
?>
<hr/>

<!--J'ai ajouté du html ici pour la mise en page (j'ai mis lien vers un fihier css dedans-->
<DOCTYPE!html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Mon Profil</title>
   <link rel="stylesheet" href=" membre.css ">
   <style>
   table, th, td {
	border : 1px solid grey;
}
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
	height: 50px;
    text-align: center;
    vertical-align: middle;
    color: green;
}
tr:hover {
	background-color: rgba(241, 76, 156, 0.3);
}


  p {
	  text-align: left;
	  font-family: italic;
	  font-size: 5px;
	  color:#696969;
	  font-size: 20px;
	
  }
  caption{
	  font-family: sans-serif;
	text-align: center;
	font-family: italic;
	font-size: 25px;
}
a{
	text-align: center;
	 font-family: sans-serif;
	font-size: 25px;
	color:#696969;
}
</style>
</head>
  <body>
	
  <p>
  <a href="admin.php" >Portail d'admin</a></br>
  <a href="profil.php" >Modifier votre profil</a></br>
   <a href="usergame.php" > Modifier vos cartes</a></br>
 <a href="deconnexion.php" > Déconnexion</a></p>




<center>
<img src="./acceuil2.jpg" width="650" height="200" >
</center>
<table border="1">

<caption> Veuillez choisir un Théme de jeux </caption>
<tr><td><a href="cartes_math.php" > Cartes de mathématique  </a>  Difficulté: <meter max="100" value="70"></meter></td> </tr><br/>
<tr><td><a href="cartes_histoire_géo.php" > Cartes d'histoire et géographie </a> Difficulté: <meter max="100" value="90"></meter></td></tr><br/>
<tr><td><a href="cartes_anglais.php" > Cartes d'anglais</a> Difficulté: <meter max="100" value="59"></meter></td></tr></br>
<tr><td><a href="cartes_cuisine.php" > Cartes de cuisine</a> Difficulté: <meter max="100" value="35"></meter></td></tr></br>
<tr><td><a href="cartes_sport.php" > Cartes du sport</a> <meter max="100" value="20"></meter></td></tr></br>


<?php
} else {
	header("Location:login.php");
}


?>
</body>
</head>
</html>
