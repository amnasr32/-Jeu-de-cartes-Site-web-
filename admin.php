<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">

    	<title>Administration</title>
		<style>
		
		
  body{
	background-color:#20B2AA ;
  color: gold;
 }
 form input{
	 width: 10%;
	overflow: hidden;
	font-size: 15px;
	padding: 8px 0;888
	
	margin: 8px 0 ;
	font-family: sans-serif;
	border-bottom: 20 px solid;
	
	 
 }
 h3 {
  color: #696969;
  	font-family: sans-serif;
  
 }
 select{
	 width: 28%;
	 color: #696969;
	 margin: 8px 0 ;
	font-family: sans-serif;
	border-bottom: 20 px solid;
 }
  p{
	 font-family: sans-serif;
	 font-align:italic;
	 font-size:20px;
	 
 }
 form {
	 color:gold;
	 
 }
 input{
	 color: grey;
 }
 a{
	 color: #696969;
  	font-family: sans-serif;
 }
 
 </style>
    </head>
    <body>
	<?php 
session_start();
?>
	<h2> Bienvenu <?php echo $_SESSION['username'];?>  dans l'espace Administration ! </h2>
	<hr/>
	<h3> <div style="font-style:italic; color:gold"> <a href="membre.php"> Retour à la page précedente </a></div></h3>
<?php 
//variable session role déja créé dans le fichier login.php!
//Tester si le joueur est admin ou non
if(isset($_SESSION['role'])&& ($_SESSION['role']=='admin')){
	
	//se connecter à ma base de données
    $connexion= mysqli_connect('localhost','root','','amira_base');
	//si la connexion échoue:
    if(!$connexion){
    	echo mysqli_connect_error($connexion);exit();
    }
    //si l'administrateur veut supprimer un utilisateur/rédacteur
			$req="SELECT * FROM utilisateurs ORDER BY id DESC" ;
			$res=mysqli_query($connexion,$req);
			$rows_3=mysqli_num_rows($res);
	$n=0;
    	while($ligne=mysqli_fetch_assoc($res)){
		if(isset($_POST['supprime_user'][$n])){
						echo "[$n]";

    	$supprime= htmlspecialchars(trim($ligne['username'])); 
    	$reqsupp="DELETE FROM utilisateurs WHERE username='$supprime'";
    	$resultatsupp=mysqli_query($connexion,$reqsupp);
		
		}
		$n++;
    }
   
    
	//Les requettes pour l'affichage des utilisateurs et des cartes:
    $req1="SELECT * FROM utilisateurs WHERE (username!='amnasr32') ORDER BY id DESC";
    $req2="SELECT * FROM cartes_math ORDER BY id DESC";
	$req3="SELECT * FROM cartes_anglais ORDER BY id DESC ";
	$req4="SELECT * FROM cartes_histoire_geo ORDER BY id DESC ";
	$req5="SELECT * FROM cartes_cuisine  ORDER BY id DESC";
	$req6="SELECT * FROM cartes_sport ";
    $resultat=mysqli_query($connexion,$req1);
    $resultat2=mysqli_query($connexion,$req2);
	$resultat3=mysqli_query($connexion,$req3);
	$resultat4=mysqli_query($connexion,$req4);
	$resultat5=mysqli_query($connexion,$req5);
	$resultat6=mysqli_query($connexion,$req6);

?>
   
    	<div align="center">
    	
    </div>
	<!--Pour l'affichage des utilisateurs:-->
       
       	<h3> Utilisateurs du site </h3>
       	<ul>
       	  <?php $n=0;
		  while($ligne=mysqli_fetch_assoc($resultat)){
			  ?>
       	  	<li><p>
		
			<?= $ligne['id'] ?> : <?= $ligne['username']?> -<? =$ligne['id']?>
			<form method="POST" action="admin.php">
			
			<input type="submit" value="supprimer" name="supprime_user[]"></p></li>
			
       	  
		  <?php
 $n=$n+1;		  }
		  ?>
		 </form>
        </ul>
		
		
		
		
		
			<!--Pour l'affichage des cartes regroupés selons leurs themes:-->
       	  <h3> Les 	cartes du site crées par les utilisateurs </h3>
       	  	<ul>
			
			
			<h3>Cartes de math :</h3>
			
       	  	  <?php 
			  $n1=0;
			  while($ligne=mysqli_fetch_assoc($resultat2 )){?>
       	  	  <hr><hr>
            <li><p>
       	  	  <li> Question : <?= $ligne['question'],"<br><br>" ?> </li>
              <li> Réponse  : <?= $ligne['reponse'],"<br><br>"?></li>
			  <form method="POST" action="admin.php">
			<input type="submit" value="supprimer" name="supprime_carte_math[]"></p></li>
			
			
       	  </form>
             
          <?php
			  $n1=$n1+1;
			  }
			 
			  ?>
			   
			  <?php
			  //Pour supprimer les cartes de math:
			  $n1=0;

    $resultat2=mysqli_query($connexion,$req2);

			$rows2=mysqli_num_rows($resultat2);
			
    	while($ligne2=mysqli_fetch_assoc($resultat2)){
									

		if(isset($_POST['supprime_carte_math'][$n1])){
      

    	$question= htmlspecialchars(trim($ligne2['question']));
		$reponse= htmlspecialchars(trim($ligne2['reponse']));
	
    	$reqsupp="DELETE FROM cartes_math WHERE question='$question' AND reponse='$reponse'";
    	$resultatsupp=mysqli_query($connexion,$reqsupp);
		
		}
		$n++;
    }		  
		  
		  ?>
       	  	</ul>
			<ul>
			
			
			
			
			
			<h3>Cartes d'anglais :</h3>
       	  	  <?php 
			  $n3=0;
			  while($ligne=mysqli_fetch_assoc($resultat3 )){?>
       	  	  <hr><hr>
            
       	  	  <li> Question : <?= $ligne['question'],"<br><br>" ?> </li>
              <li> Réponse  : <?= $ligne['reponse'],"<br><br>"?></li>
			  <form method="POST" action="admin.php">
			<input type="submit" value="supprimer" name="supprime_carte_anglais[]"></p></li>
       	  
             
          <?php
			  $n3=$n3+1;
			  }
			  //Pour supprimer les cartes d'anglais:
			  $n3=0;

    $resultat3=mysqli_query($connexion,$req3);

			$rows3=mysqli_num_rows($resultat3);
			
    	while($ligne3=mysqli_fetch_assoc($resultat3)){
									

		if(isset($_POST['supprime_carte_anglais'][$n3])){
      

    	$question= htmlspecialchars(trim($ligne3['question']));
		$reponse= htmlspecialchars(trim($ligne3['reponse']));
	
    	$reqsupp3="DELETE FROM cartes_anglais WHERE question='$question' AND reponse='$reponse'";
    	$resultatsupp=mysqli_query($connexion,$reqsupp3);
		
		}
		$n++;
    }	
?>	
       	  	</ul>
			<ul>
			<h3>Cartes d'histoire et géographie :</h3>
       	  	  <?php 
			  $n4=0;
			  while($ligne=mysqli_fetch_assoc($resultat4 )){?>
       	  	  <hr><hr>
            <li><p>
       	  	  <li> Question : <?= $ligne['question'],"<br><br>" ?> </li>
              <li> Réponse  : <?= $ligne['reponse'],"<br><br>"?></li>
			  <form method="POST" action="admin.php">
			<input type="submit" value="supprimer" name="supprime_carte_histoire_geo[]"></p></li>
       	  
             
          <?php
			  $n4=$n4+1;
			  }
			  //Pour supprimer les cartes d'histoire_geo:
			  $n4=0;

    $resultat4=mysqli_query($connexion,$req4);

			$rows4=mysqli_num_rows($resultat4);
			
    	while($ligne4=mysqli_fetch_assoc($resultat4)){
									

		if(isset($_POST['supprime_carte_histoire_geo'][$n4])){
      

    	$question4= htmlspecialchars(trim($ligne4['question']));
		$reponse4= htmlspecialchars(trim($ligne4['reponse']));
	
    	$reqsupp4="DELETE FROM cartes_histoire_geo WHERE question='$question4' AND reponse='$reponse4'";
    	$resultatsupp4=mysqli_query($connexion,$reqsupp4);
		
		}
		$n++;
    }	
?>	
       	  	</ul>
			<ul>
			<h3>Cartes de cuisine :</h3>
       	  	  <?php 
			  $n5=0;
			  while($ligne=mysqli_fetch_assoc($resultat5 )){?>
       	  	  <hr><hr>
           
       	  	  <li> Question : <?= $ligne['question'],"<br><br>" ?> </li>
              <li> Réponse  : <?= $ligne['reponse'],"<br><br>"?></li>
			  <form method="POST" action="admin.php">
			<input type="submit" value="supprimer" name="supprime_carte_cuisine[]">
       	  </form>
             
          <?php
			  $n5=$n5+1;
			  }
			  //Pour supprimer les cartes cuisine:
			  

    $resultat5=mysqli_query($connexion,$req5);

			$rows5=mysqli_num_rows($resultat5);
			$n5=0;
    	while($ligne5=mysqli_fetch_assoc($resultat5)){
			echo"while";
		if(isset($_POST['supprime_carte_cuisine'][$n5])){
      
        echo "222";
    	$question5= htmlspecialchars(trim($ligne5['question']));
		$reponse5= htmlspecialchars(trim($ligne5['reponse']));
	
    	$reqsupp5="DELETE FROM cartes_cuisine WHERE question='$question5' AND reponse='$reponse5'";
    	$resultatsupp5=mysqli_query($connexion,$reqsupp5);
		
		}
		$n5++;
    }	
?>	
<!--affichage des cartes de sport-->
<h3>Cartes de sport :</h3>
       	  	  <?php 
			  $n6=0;
			  while($ligne=mysqli_fetch_assoc($resultat6 )){?>
       	  	  <hr><hr>
            
       	  	  <li> Question : <?= $ligne['question'],"<br><br>" ?> </li>
              <li> Réponse  : <?= $ligne['reponse'],"<br><br>"?></li>
			  <form method="POST" action="admin.php">
			<input type="submit" value="supprimer" name="supprime_carte_sport[]">
		
       	  
             
          <?php
			  $n6=$n6+1;
			  }
			  //Pour supprimer les cartes de sport:
			  $n6=0;

    $resultat6=mysqli_query($connexion,$req6);

			$rows6=mysqli_num_rows($resultat6);
			
    	while($ligne6=mysqli_fetch_assoc($resultat6)){

									

		if(isset($_POST['supprime_carte_sport'][$n6])){
    
echo"Prohjeezejbgr";
    	$question6= htmlspecialchars(trim($ligne6['question']));
		$reponse6= htmlspecialchars(trim($ligne6['reponse']));
	
    	$reqsupp6="DELETE FROM cartes_sport WHERE question='$question6' AND reponse='$reponse6'";
    	$resultatsupp6=mysqli_query($connexion,$reqsupp6);
		
		}
		$n++;
    }	
?>	
       	  	</ul>
			

   
 <?php

}else{
	?>
	<!--Message d'erreur si le joueur n'est pas défini admin il peut rien faire-->
	
	<h3>Vous n'êtes pas administrateur!</h3>
	<?php
} 
?>
</br>

 </body>
    </html> 