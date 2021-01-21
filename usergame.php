<?php 
session_start();


?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title> Modification</title>
<style>
  body{
	background-color:#20B2AA ;
  color: gold;
 }
 select{
	 width: 28%;
	 color: #696969;
	 margin: 8px 0 ;
	font-family: sans-serif;
	border-bottom: 20 px solid;
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
  p{
	 font-family: sans-serif;
	 font-align:italic;
	 font-size:20px;
	 
 }
 input{
	 color: grey;
 }
 a{
	 font-size: 25px;
	 color:gold;
 }
</style>
 </head>
<body>
<?php
//session_start();
echo"USER"." ".$_SESSION['username'];
?>
<hr/>
   
         <form method="post" action="usergame.php">
<b> Choisissez un thème</b><br>
<div style="position:absolute;left=300px"><br>
</div><br>
<select name="theme">
<option value="1">Cartes de mathématique
<option value="2">Cartes d'histoire et géographie
<option value="3">Cartes d'anglais
<option value="4">Cartes de cuisine
<option value="5">Cartes du sport
</select>
<p>
	Quelle est la question que vous souhaitez ajouter ?<br/>
<input type="text" size="50" name="question"  placeholder="Quelle est la question que vous souhaitez ajouter ?" required><br/>
<br/>
<br/>
Indiquez la réponse à la question <br/>
<input type="text" size="50" name="reponse"  placeholder="Indiquez la réponse à la question" required><br/>
<br/>
<br/>

<input type="submit" value="Envoyer" name="formsend2" id="formsend2">
 </form>

<?php
if(isset($_SESSION['username'])){
	if(isset($_POST['formsend2'])){

		$theme = htmlspecialchars(trim($_POST['theme']));
		$question =htmlspecialchars(trim( $_POST['question']));
		$reponse = htmlspecialchars(trim($_POST['reponse']));
echo $theme;
		if(!empty($theme)&&!empty($question) && !empty($reponse) ){
			switch($theme){
				case 1: $tab="cartes_math";break;
				case 2: $tab="cartes_histoire_geo";break;
				case 3: $tab="cartes_anglais";break;
				case 4: $tab="cartes_cuisine";break;
				case 5: $tab="cartes_sport";break;
			}
			echo $tab;
			 $connect = mysqli_connect('localhost','root','','amira_base');
			 
			 if(!$connect){
			 echo mysqli_connect_error($connex);exit;
			 }else echo"echec";
			 mysqli_set_charset($connect,"utf8");
			 $req="INSERT INTO $tab VALUES('0','$question','$reponse')";
			 echo $req;
 		 $res=mysqli_query($connect,$req);
		 echo mysqli_error($connect);
		if(!$res){
			echo "ERREUR";
		}else{
			 $_SESSION['succes']="Modification terminée ";
			header('Location:membre.php');
			}
		} echo "Veuiller remplir les champs";
	}
} 
?>
	<div> <a href="membre.php"> Retour à la page précedente</div>

</body>

</html>