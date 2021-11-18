<?php 
	include_once("myparam.inc.php");
	$id = null;
	$table = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
		$table = $_REQUEST['table'];

	}
	
	if ( null==$id || null==$table ) {
		header("Location: index.php");
	}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
    
    			<div class="span10 offset1">
		    		<?php
		    			if ($table == "visiteurs" ) {
		    				$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
							  $sql = "SELECT * FROM $table where id_visit = $id";
							  $result=mysqli_query ($base,$sql);
							  if(!$result){
						 			echo("Error description: " . mysqli_error($base));
							  }
							  $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
							  mysqli_close($base);

		    				echo '<div class="row">';
		    					echo '<h1>Lire un visiteur</h1>';
		    				echo '</div>';		    				
			    			echo '<div class="form-horizontal" >';
							  echo '<div class="control-group">';
							    echo '<label class="control-label">Visiteur n° :</label>';
							    echo '<div class="controls">';
								    echo '<label class="checkbox">';
								     	echo $data['id_visit'];
								    echo '</label>';
							    echo '</div>';
							  echo '</div>';
							  echo '<div class="control-group">';
							    echo '<label class="control-label">Age :</label>';
							    echo '<div class="controls">';
							      	echo '<label class="checkbox">';
								     	echo $data['age'].' ans';
								    echo '</label>';
							    echo '</div>';
							  echo '</div>';
							  echo '<div class="control-group">';
							    echo '<label class="control-label">Étudiant :</label>';
							    echo '<div class="controls">';
							      	echo '<label class="checkbox">';
								     	echo $data['etu'];
								    echo '</label>';
							    echo '</div>';
							  echo '</div>';
							  echo '<div class="control-group">';
							    echo '<label class="control-label">Tarif :</label>';
							    echo '<div class="controls">';
							      	echo '<label class="checkbox">';
								     	echo $data['tarif'].' €';
								    echo '</label>';
							    echo '</div>';
							  echo '</div>';
							  echo '<div class="control-group">';
							    echo '<label class="control-label">Date :</label>';
							    echo '<div class="controls">';
							      	echo '<label class="checkbox">';
								     	echo  substr($data['dates'], 8, 2).'/'.substr($data['dates'], 5, 2).'/'.substr($data['dates'], 0, 4);
								    echo '</label>';
							    echo '</div>';
							  echo '</div>';				  
							    echo '<div class="form-actions">';
								  echo '<a class="btn" href="index.php?inter='.$table.'">Retour</a>';
							   echo '</div>';			 
							echo '</div>';

						} elseif ($table == "oeuvres" ) {

							  $base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
							  $sql = "SELECT * FROM $table where id_oeuvre = $id";
							  $result=mysqli_query ($base,$sql);
							  if(!$result){
						 			echo("Error description: " . mysqli_error($base));
							  }
							  $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
							  mysqli_close($base);

		    				echo '<div class="row">';
		    					echo '<h1>Lire une oeuvre</h1>';
		    				echo '</div>';								
			    			echo '<div class="form-horizontal" >';
							  echo '<div class="control-group">';
							    echo '<label class="control-label">Oeuvre n° :</label>';
							    echo '<div class="controls">';
								    echo '<label class="checkbox">';
								     	echo $data['id_oeuvre'];
								    echo '</label>';
							    echo '</div>';
							  echo '</div>';
							  echo '<div class="control-group">';
							    echo '<label class="control-label">Type :</label>';
							    echo '<div class="controls">';
							      	echo '<label class="checkbox">';
								     	echo $data['type'];
								    echo '</label>';
							    echo '</div>';
							  echo '</div>';
							  echo '<div class="control-group">';
							    echo '<label class="control-label">Titre :</label>';
							    echo '<div class="controls">';
							      	echo '<label class="checkbox">';
								     	echo $data['titre'];
								    echo '</label>';
							    echo '</div>';
							  echo '</div>';
							  echo '<div class="control-group">';
							    echo '<label class="control-label">Artiste :</label>';
							    echo '<div class="controls">';
							      	echo '<label class="checkbox">';
								     	echo $data['artiste'];
								    echo '</label>';
							    echo '</div>';
							  echo '</div>';
							  echo '<div class="control-group">';
							    echo '<label class="control-label">Date de réalisation :</label>';
							    echo '<div class="controls">';
							      	echo '<label class="checkbox">';
								     	echo substr($data['date_real'], 8, 2).'/'.substr($data['date_real'], 5, 2).'/'.substr($data['date_real'], 0, 4);
								    echo '</label>';
							    echo '</div>';
							  echo '</div>';
							  echo '<div class="control-group">';
							    echo '<label class="control-label">Prix de la location :</label>';
							    echo '<div class="controls">';
							      	echo '<label class="checkbox">';
								     	echo $data['prix_loc'].' €';
								    echo '</label>';
							    echo '</div>';
							  echo '</div>';							  				  
							    echo '<div class="form-actions">';
								  echo '<a class="btn" href="index.php?inter='.$table.'">Retour</a>';
							   echo '</div>';			 
							echo '</div>';

						} elseif ($table == "souvenirs" ) {

							  $base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
							  $sql = "SELECT * FROM $table where id_objet = $id";
							  $result=mysqli_query ($base,$sql);
							  if(!$result){
						 			echo("Error description: " . mysqli_error($base));
							  }
							  $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
							  mysqli_close($base);


		    				echo '<div class="row">';
		    					echo '<h1>Lire un objet</h1>';
		    				echo '</div>';								
			    			echo '<div class="form-horizontal" >';
							  echo '<div class="control-group">';
							    echo '<label class="control-label">Objet n° :</label>';
							    echo '<div class="controls">';
								    echo '<label class="checkbox">';
								     	echo $data['id_objet'];
								    echo '</label>';
							    echo '</div>';
							  echo '</div>';
							  echo '<div class="control-group">';
							    echo '<label class="control-label">Classe objet :</label>';
							    echo '<div class="controls">';
								    echo '<label class="checkbox">';
								     	echo $data['classe'];
								    echo '</label>';
							    echo '</div>';
							  echo '</div>';
							  echo '<div class="control-group">';
							    echo '<label class="control-label">Acheté par entreprise au prix de :</label>';
							    echo '<div class="controls">';
								    echo '<label class="checkbox">';
								     	echo $data['prix_achat'].' €';
								    echo '</label>';
							    echo '</div>';
							  echo '</div>';							  
							  echo '<div class="control-group">';
							    echo '<label class="control-label">Acheté par le visiteur n° :</label>';
							    echo '<div class="controls">';
							      	echo '<label class="checkbox">';
								     	echo $data['id_visit'];
								    echo '</label>';
							    echo '</div>';
							  echo '</div>';
							  echo '<div class="control-group">';
							    echo '<label class="control-label">Le :</label>';
							    echo '<div class="controls">';
							      	echo '<label class="checkbox">';
								     	echo substr($data['date_vente'], 8, 2).'/'.substr($data['date_vente'], 5, 2).'/'.substr($data['date_vente'], 0, 4);
								    echo '</label>';
							    echo '</div>';
							  echo '</div>';
							  echo '<div class="control-group">';
							    echo '<label class="control-label">Au prix de :</label>';
							    echo '<div class="controls">';
							      	echo '<label class="checkbox">';
								     	echo $data['prix_vente'].' €';
								    echo '</label>';					  				  
							    echo '<div class="form-actions">';
								  echo '<a class="btn" href="index.php?inter='.$table.'">Retour</a>';
							   echo '</div>';			 
							echo '</div>';

						} elseif ($table == "expositions" ) {

							  $base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
							  $sql = "SELECT * FROM $table where id_expo = $id";
							  $result=mysqli_query ($base,$sql);
							  if(!$result){
						 			echo("Error description: " . mysqli_error($base));
							  }
							  $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
							  mysqli_close($base);

		    				echo '<div class="row">';
		    					echo '<h1>Lire une exposition</h1>';
		    				echo '</div>';								
			    			echo '<div class="form-horizontal" >';
							  echo '<div class="control-group">';
							    echo '<label class="control-label">Exposition n° :</label>';
							    echo '<div class="controls">';
								    echo '<label class="checkbox">';
								     	echo $data['id_expo'];
								    echo '</label>';
							    echo '</div>';
							  echo '</div>';
							  echo '<div class="control-group">';
							    echo '<label class="control-label">Thème :</label>';
							    echo '<div class="controls">';
							      	echo '<label class="checkbox">';
								     	echo $data['theme'];
								    echo '</label>';
							    echo '</div>';
							  echo '</div>';
							  echo '<div class="control-group">';
							    echo '<label class="control-label">Date exposition :</label>';
							    echo '<div class="controls">';
							      	echo '<label class="checkbox">';
								     	echo 'Du '.substr($data['date_expodebut'], 8, 2).'/'.substr($data['date_expodebut'], 5, 2).'/'.substr($data['date_expodebut'], 0, 4).' au '.substr($data['date_expofin'], 8, 2).'/'.substr($data['date_expofin'], 5, 2).'/'.substr($data['date_expofin'], 0, 4);
								    echo '</label>';
							    echo '</div>';
							  echo '</div>';
							  echo '<div class="control-group">';
							    echo '<label class="control-label">Côut total exposition (sans loc oeuvre):</label>';
							    echo '<div class="controls">';
							      	echo '<label class="checkbox">';
								     	echo $data['cout_expo'].' €';
								    echo '</label>';
							    echo '</div>';
							  echo '</div>';
				  
							    echo '<div class="form-actions">';
								  echo '<a class="btn" href="index.php?inter='.$table.'">Retour</a>';
							   echo '</div>';			 
							echo '</div>';
						}						
					?>
				</div>
				
    </div> <!-- /container -->
  </body>
</html>
