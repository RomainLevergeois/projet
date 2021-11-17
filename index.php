<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Projet LGS: Index</title>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js">
    </script>
</head>

<body>
    <div class="container">
    		<div class="row">
    			<?php
     				if ( !empty($_REQUEST['inter'])) {
     					$_POST['id_table']=$_REQUEST['inter'];
     				}      				
    				if (!empty($_POST)){
    					echo '<h1>Index '.$_POST['id_table'].'</h1>';
    				} else {
    					echo '<h1>Index</h1>';
    				}
    			?>
      		</div>
			<div class="row">
				<p>
                <form action="index.php" method="post">
                    <select name="id_table" id="yo">
                        <option value=" " selected>--Choisissez une table--</option>
                        <option value="visiteurs">Visiteurs</option>
                        <option value="oeuvres">Oeuvres</option>
                        <option value="souvenirs">Souvenirs</option>
                        <option value="expositions">Expositions</option>
                    </select>
               		</br>
                    <input type="submit" value="Go" title="valider pour aller à la table sélectionnée" />
                </p>
                </form>
                <?php
       
					/* on vérifie que l'information "id_table" existe ET qu'elle n'est pas vide : */
     				
     				if ( isset($_POST['id_table']) && !empty($_POST['id_table'])) {

						if ( $_POST['id_table']==" ") {
	     					echo '<p style="color:red;">Veuillez choisir une table</p>';

     					} elseif ( $_POST['id_table']=="visiteurs") {
   							echo '<table class="table table-striped table-bordered">';
	            			echo '<thead>';
	               			echo '<tr>';
	            			echo '<th>Identifiant</th>';
	               			echo '<th>Identifiant Expo</th>';
		                	echo '<th>Age</th>';
		               		echo '<th>Étudiant</th>';
		           			echo '<th>Tarif</th>';
		         			echo '<th>Date</th>';
	                		echo '</tr>';
		              		echo '</thead>';
		              		echo '<tbody>';
						              
							include_once("myparam.inc.php");
							$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
							if (mysqli_connect_errno()){
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
								}
				                        	                        
							$sql = 'SELECT * FROM visiteurs';
							$result=mysqli_query ($base,$sql);
									
										
							if(!$result){
 								echo("Error description: " . mysqli_error($base));
							}else{ 
								$nbcol=mysqli_num_fields($result); $nbmod=mysqli_num_rows($result);
								while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
					   				echo '<tr>';
						   			echo '<td>'. $row['id_visit'] . '</td>';
						   			echo '<td>'. $row['id_expo'] . '</td>';
						   			echo '<td>'. $row['age'] .' ans </td>';
						   			echo '<td>'. $row['etu'] . '</td>';
						   			echo '<td>'. $row['tarif'] .' € </td>';
						   			echo '<td>'. substr($row['dates'], 8, 2).'/'.substr($row['dates'], 5, 2).'/'.substr($row['dates'], 0, 4). '</td>';
						  			echo '<td width=250>';
						   			echo '<a class="btn" href="read.php?table=visiteurs&id='.$row['id_visit'].'">Lire</a>';
						   			echo '&nbsp;';
						   			echo '<a class="btn btn-success" href="update.php?table=visiteurs&id='.$row['id_visit'].'">Modifier</a>';
						   			echo '&nbsp;';
						   			echo '<a class="btn btn-danger" href="delete.php?table=visiteurs&id='.$row['id_visit'].'">Supprimer</a>';
						 			echo '</td>';
						   			echo '</tr>';
								}
							}
							mysqli_close($base);

						}elseif($_POST['id_table']=="oeuvres"){
							
   							echo '<table class="table table-striped table-bordered">';
            				echo '<thead>';
           					echo '<tr>';
           					echo '<th>Identifiant Oeuvre</th>';
           					echo '<th>Type</th>';
           					echo '<th>Titre</th>';           					
                			echo '<th>Artiste</th>';
           					echo '<th>Date de réalisation</th>';
         					echo '<th>Prix de la location</th>';
               				echo '</tr>';
	              			echo '</thead>';
	              			echo '<tbody>';

							include_once("myparam.inc.php");
							$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
							if (mysqli_connect_errno()){
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
				                        				                        
							$sql = 'SELECT * FROM oeuvres';
							$result=mysqli_query ($base,$sql);
									
								
							if(!$result){
 								echo("Error description: " . mysqli_error($base));
							}else{ 
								$nbcol=mysqli_num_fields($result); $nbmod=mysqli_num_rows($result);
								while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
					   				echo '<tr>';
						   			echo '<td>'. $row['id_oeuvre'] . '</td>';
						   			echo '<td>'. $row['type'] . '</td>';
						   			echo '<td>'. $row['titre'] . '</td>';						   			
						   			echo '<td>'. $row['artiste'] . '</td>';
						   			echo '<td>'. substr($row['date_real'], 8, 2).'/'.substr($row['date_real'], 5, 2).'/'.substr($row['date_real'], 0, 4). '</td>';
						   			echo '<td>'. $row['prix_loc'] . ' € </td>';
						  			echo '<td width=250>';
						   			echo '<a class="btn" href="read.php?table=oeuvres&id='.$row['id_oeuvre'].'">Lire</a>';
						   			echo '&nbsp;';
						   			echo '<a class="btn btn-success" href="update.php?table=oeuvres&id='.$row['id_oeuvre'].'">Modifier</a>';
						   			echo '&nbsp;';
						   			echo '<a class="btn btn-danger" href="delete.php?table=oeuvres&id='.$row['id_oeuvre'].'">Supprimer</a>';
						 			echo '</td>';
						   			echo '</tr>';
								}
							}
							mysqli_close($base);
     					}elseif($_POST['id_table']=="souvenirs"){
				
   							echo '<table class="table table-striped table-bordered">';
            				echo '<thead>';
           					echo '<tr>';
           					echo '<th>Identifiant Objet</th>';
           					echo '<th>Identifiant Acheteur</th>';
                			echo '<th>Classe</th>';
           					echo '<th>Date de vente</th>';
         					echo '<th>Prix achat</th>';
         					echo '<th>Prix de vente</th>';
               				echo '</tr>';
	              			echo '</thead>';
	              			echo '<tbody>';

							include_once("myparam.inc.php");
							$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
							if (mysqli_connect_errno()){
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
				                        				                        
							$sql = 'SELECT * FROM souvenirs';
							$result=mysqli_query ($base,$sql);
									
								
							if(!$result){
 								echo("Error description: " . mysqli_error($base));
							}else{ 
								$nbcol=mysqli_num_fields($result); $nbmod=mysqli_num_rows($result);
								while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
					   				echo '<tr>';
						   			echo '<td>'. $row['id_objet'] . '</td>';
						   			echo '<td>'. $row['id_visit'] . '</td>';
						   			echo '<td>'. $row['classe'] . '</td>';
						   			echo '<td>'. substr($row['date_vente'], 8, 2).'/'.substr($row['date_vente'], 5, 2).'/'.substr($row['date_vente'], 0, 4). '</td>';
						   			echo '<td>'. $row['prix_achat'] . ' € </td>';
						   			echo '<td>'. $row['prix_vente'] . ' € </td>';
						  			echo '<td width=250>';
						   			echo '<a class="btn" href="read.php?table=souvenirs&id='.$row['id_objet'].'">Lire</a>';
						   			echo '&nbsp;';
						   			echo '<a class="btn btn-success" href="update.php?table=souvenirs&id='.$row['id_objet'].'">Modifier</a>';
						   			echo '&nbsp;';
						   			echo '<a class="btn btn-danger" href="delete.php?table=souvenirs&id='.$row['id_objet'].'">Supprimer</a>';
						 			echo '</td>';
						   			echo '</tr>';
								}
							}
							mysqli_close($base);
     					}elseif($_POST['id_table']=="expositions"){
					
   							echo '<table class="table table-striped table-bordered">';
            				echo '<thead>';
           					echo '<tr>';
           					echo '<th>Identifiant Expo</th>';
           					echo '<th>Thème</th>';
           					echo '<th>Date expo</th>';
         					echo '<th>Côut expo</th>';
               				echo '</tr>';
	              			echo '</thead>';
	              			echo '<tbody>';

							include_once("myparam.inc.php");
							$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
							if (mysqli_connect_errno()){
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
				                        				                        
							$sql = 'SELECT * FROM expositions';
							$result=mysqli_query ($base,$sql);
									
								
							if(!$result){
 								echo("Error description: " . mysqli_error($base));
							}else{ 
								$nbcol=mysqli_num_fields($result); $nbmod=mysqli_num_rows($result);
								while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
					   				echo '<tr>';
						   			echo '<td>'. $row['id_expo'] . '</td>';
						   			echo '<td>'. $row['theme'] . '</td>';
						   			echo '<td>'. substr($row['date_expo'], 8, 2).'/'.substr($row['date_expo'], 5, 2).'/'.substr($row['date_expo'], 0, 4). '</td>';
						   			echo '<td>'. $row['cout_expo'] . ' € </td>';
						  			echo '<td width=250>';
						   			echo '<a class="btn" href="read.php?table=expositions&id='.$row['id_expo'].'">Lire</a>';
						   			echo '&nbsp;';
						   			echo '<a class="btn btn-success" href="update.php?table=expositions&id='.$row['id_expo'].'">Modifier</a>';
						   			echo '&nbsp;';
						   			echo '<a class="btn btn-danger" href="delete.php?table=expositions&id='.$row['id_expo'].'">Supprimer</a>';
						 			echo '</td>';
						   			echo '</tr>';
								}
							}
							mysqli_close($base);
     					}
     				}		
				?>
				     </tbody>
	          	</table>
	          	<?php
	          		if (!empty($_POST['id_table']) && $_POST['id_table']!=" ") {
	          			echo '<p><a href="create.php?table='.$_POST['id_table'].'" class="btn btn-success">Créer</a></p>';
	          		}
	          	?>
    		</div>
    </div> <!-- /container -->
  </body>
</html>
