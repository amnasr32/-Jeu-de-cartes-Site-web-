<DOCTYPE!html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Déconnexion</title>
<style>
body{
	background-color:#20B2AA ;
  color: gold;
}
a{
	text-align: center;
	font-family: italic;
	font-size: 25px;
	color:#696969;
}
</style>
</head>
<body>

<center>
<h1> Vous êtes à present déconnectés</h1>


<img src="./acceuil2.jpg" width="600" height="250" >
</center>
</br>
<center>
<i><a href="login.php" > Connectez-vous </a></i></br>
<i><a href="PageDAcceuil.php" > Retour à la page d'acceuil </a></i>
</center>

</body>
</head>
</html>
<?php
session_start();
session_destroy();
header('Loction: login.php');



exit;





?>


