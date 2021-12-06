<?php 
	include_once("myparam.inc.php");
	#$dateajd = (date('Y', time())-1);
	$dateajd = "2018";
	if (!empty($_POST['annee'])){
		$dateajd = $_POST['annee'];
	} else {
		$dateajd = "2018";
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
    	<div class="row">
    		<form class="form-horizontal" action="tab_financier.php" method="post">
    		<h1>Tableau financier de l'année <?php echo '<input name="annee" type="number" min="1970" max="3000" value="'.$dateajd.'"/>'; echo '<button type="submit" class="btn btn-success" title ="Cliquer pour voir le tableau des finances">Go</button>';?> </h1>
    		</form>
    	</div>
    			<div class="row">
		    		<?php

		    			    echo '<table class="table table-striped table-bordered">';
            				echo '<thead>';
           					echo '<tr>';
           					echo '<th>Identifiant Exposition</th>';
           					echo '<th>Thème</th>';
           					echo '<th>Date de l\'exposition</th>';
           					echo '<th>Dépenses totales</th>';
           					echo '<th>Bénéfice</th>';
           					echo '<th>Gains</th>';
               				echo '</tr>';
	              			echo '</thead>';
	              			echo '<tbody>';

							$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
							if (mysqli_connect_errno()){
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}

							$sql = 'SELECT id_expo, SUM(tarif) FROM visiteurs GROUP BY id_expo';
							$result=mysqli_query ($base,$sql);
							$j=1;
							if(!$result){
 								echo("Error description: " . mysqli_error($base));
							}else{
								$nbcol=mysqli_num_fields($result); $nbmod=mysqli_num_rows($result);
								while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
									$array[$j] = $row['SUM(tarif)'];
									$j=$j+1;
								}
							}
								
							mysqli_close($base);

							$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
							if (mysqli_connect_errno()){
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
							$sql = 'SELECT DISTINCT a1.id_expo, a1.theme, a1.date_expodebut, a1.date_expofin, a1.cout_expo, SUM(prix_achat) AS sumprixachat, SUM(prix_vente) AS sumprixvente, SUM(prix_loc) AS sumprixloc, SUM(prix_achat)+SUM(prix_loc)+a1.cout_expo AS total FROM (expositions AS a1 LEFT JOIN (souvenirs NATURAL JOIN visiteurs) ON visiteurs.id_expo = a1.id_expo) LEFT JOIN (expositions AS a2 LEFT JOIN (oeuvres NATURAL JOIN participe) ON participe.id_expo = a2.id_expo) ON a1.id_expo = a2.id_expo WHERE a1.date_expodebut LIKE \'%'.$dateajd.'%\' GROUP BY a1.id_expo, a1.theme, a1.date_expodebut, a1.date_expofin, a1.cout_expo, id_objet';
							$result=mysqli_query ($base,$sql);
							
							
							$i = 1;			
								
							if(!$result){
 								echo("Error description: " . mysqli_error($base));
							}else{ 
								$nbcol=mysqli_num_fields($result); $nbmod=mysqli_num_rows($result);
								while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
					   				echo '<tr>';
						   			echo '<td>'. $row['id_expo'] . '</td>';
						   			echo '<td>'. $row['theme'] . '</td>';
						   			echo '<td> Du '. substr($row['date_expodebut'], 8, 2).'/'.substr($row['date_expodebut'], 5, 2).'/'.substr($row['date_expodebut'], 0, 4). ' </br>Au '. substr($row['date_expofin'], 8, 2).'/'.substr($row['date_expofin'], 5, 2).'/'.substr($row['date_expofin'], 0, 4). ' </td>';
						   			echo '<td> total de l\'achat des objets: '. round($row['sumprixachat'], 2);
						   			echo ' €<br/>total des locations: '.round($row['sumprixloc'], 2);
						   			echo ' €<br/>cout total de l\'expo (sans location): '.round($row['cout_expo'], 2);
						   			echo ' €<p style="font-weight: bold;font-size: 15px;color: blue;">Total: '.round($row['total'], 2) . ' €</p></td>';
						   			echo '<td> total de la vente des objets: '. round($row['sumprixvente'], 2);
						   			echo ' €<br/>Bénéfice sur la vente des objets: '.(round($row['sumprixvente'], 2)-round($row['sumprixachat'], 2));
						   			echo ' €<br/>total tarifs visiteurs : '.round($array[$i], 2);
						   			echo ' €<p style="font-weight: bold;font-size: 15px;color: blue;">Total: '.(round($row['sumprixvente'], 2)+round($array[$i], 2)).' €</p></td>';
						   			echo '<td>';
						   					$gain = ((round($row['sumprixvente'], 2)+round($array[$i], 2))-round($row['total'], 2));
						   					echo '<p style="font-weight: bold;font-size: 25px;color:';
						   					if ($gain<=0){
						   						echo 'red;">'.$gain.'€</p>';
						   					} else {
						   						echo 'green;">'.$gain.'€</p>';
						   					}
						   			echo '</td>';
						   			echo '</tr>';
						   			$i = $i+1;
						   			
								}
							}
							echo '</table>';
				echo '</div>';
				echo '<div class="row">';
							echo '<a class="btn" href="index.php">Retour</a>';
				echo '</div>';
						mysqli_close($base);	

					?>
				
				
    </div> <!-- /container -->
  </body>
</html>
