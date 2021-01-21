<?php 
//Démarrer une nouvelle session
session_start();
if(isset($_SESSION['username'])){
//message de bienvenue pour le membre
echo"USER:"."   ".$_SESSION['username'];
?>

<DOCTYPE!html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title> Math </title>
  <link rel="stylesheet" href=" jeu.css ">
 <style>
  a{
	text-align: center;
	font-family: italic;
	font-size: 25px;
	color:#696969;
}
p{
color:#696969;
font-size: 20px;
font-family: italic;
font-family: sans-serif;
}
h2{
	color:gold;
}
</style>
</head>
<body>
<hr/>
<h2> Bienvenue dans les cartes de mathématiques <br></h2>
 <a href="membre.php" > <i> <div style="text-align:left">retour aux cartes </div></i></a> 
 <hr/>

<?php
			//si l'utilisateur clique sur le bouton
    if(isset($_POST['submit_check2'])){
		//se connecter à la base
		$connexion=mysqli_connect('localhost','root','','amira_base');
		//selectionner tt dans ma table
			$req="SELECT * FROM cartes_math" ;
			
			$res=mysqli_query($connexion,$req);
			//rows est le nombre de lignes
			$rows_1=mysqli_num_rows($res);?>
		</br>
		<h2>Vos réponses sont  :</h2>
		</br>
		<?php 
		//réafficher les réponses saisi par le joueur
				$score=0;
			$cond=1;
			//parcourir le tableau de réponse et les afficher:
		for ($i = 0; $i < $rows_1; $i++) {
			
        if (strlen($_POST["reponse_carte_math"][$i]) !== 0) {
            ?>
            <p> Votre réponse à la question <?php echo $i; ?> est la suivante: </br><?php echo $_POST["reponse_carte_math"][$i]; 
				
			 echo"</br>";
			?>
			
                <?php
            } else {
                ?>
            <p><?php // si l'utilisateur oublie de saisir une réponse il sera au courant
			echo"Question ".$i; $cond =0; ?> Vous avez pas saisi votre réponse</p>
            <?php
			} 
		}
		
		?>
		</br>
		<h2>Le résultat est  :</h2>
		</br>
		
		<?php
		//affichage des résultat
		$score=0;
		$score_finale=$score;
		//echo " begin cond".$cond;
		if  ( $cond ==1) {
			
			//on commence à calculer le score
		
			
       $n=0;
			
    	while($ligne=mysqli_fetch_assoc($res)){
						//echo "parcourir le tableau des réponses et les comparer avec celles dans ma BDD";

    		if((htmlspecialchars($ligne['reponse']))==$_POST["reponse_carte_math"][$n]){
				//echo " rep correct";
    			$score=$score+1;
    			$_SESSION["correct$n"]="Bonne réponse !";
				$_SESSION["sol$n"] = "la bonne réponse est : "."  ".$ligne['reponse'];
    		}else{
    			$_SESSION["correct$n"]="Mauvaise réponse";
    			$_SESSION["sol$n"]="En effet, la bonne réponse est : "."  ".$ligne['reponse'];
    		}
    		$_SESSION["reponse_carte_math"]=$_POST["reponse_carte_math"][$n];
			//affichage du résultat de la réponse de l'utilisateur:
			?>
		
			<p>Résultat  <?php echo $n; echo":"; echo $_SESSION["correct$n"];echo"</br>"; echo $_SESSION["sol$n"];?></p>
			<?php
    		$n++;
			
			
			
			echo"</br>";

    	}
        $score_finale=$score*100/($rows_1);
    	
		
		
	}
	if($score_finale==100){
    		$_SESSION['complet']="Félicitations! vous avez la note complète, votre score est $score_finale%";
    	}else{
    		$_SESSION['complet']="Bien tenté, on vous conseille de réessayer, votre score est $score_finale%";
    	}
	?>
	<hr/>
	<h2>
	<?php
	//affichage du score 
	
	echo $_SESSION['complet'];
	
	}
	
	
		?></h2>
    
		
		
		
		
		
	

<?php
//se connecter à notre base de donnée:
			$connect=mysqli_connect('localhost','root','','amira_base');
			// Le chargement des cartes:
			$roq="SELECT * FROM cartes_math" ;
			$reg=mysqli_query($connect,$roq);
			$rows=mysqli_num_rows($reg);
			
			// $i=0;
			$a=0;
			while($ligne=mysqli_fetch_assoc($reg)){
					$a++;
					echo"<hr>";
					echo"Question ".$a.":";
					echo "<br/>";
					?>
					
					<p><?php echo $ligne['question'];
					echo "<br/>";
?></p>
<!--Le formulaire de la réponse-->
	<form method="POST" action="cartes_math.php">
	<p>Votre réponse:</p>
	<input type ="text" name="reponse_carte_math[]" placeholder="Indiquez votre réponse" > 
			
<?php
// $i++;
}
echo"<hr>";}
			?>
		 <input type="submit" size="20"  value="vérifier" name="submit_check2">
			</form>
			
			
			
			
			
    

  

</body>
</html>
