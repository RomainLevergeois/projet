<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script language="javascript">
    </script>
</head>

<body>

	<?php
		include_once("myparam.inc.php");
		$id = null;		
		$table = null;
		if ( !empty($_GET['table'])) {
			$table = $_REQUEST['table'];
			$id = $_REQUEST['id'];

		}
		
		if ( null==$table ) {
			header("Location: index.php");
		}elseif ($table == "visiteurs") {

			$check1="checked";
			$check2="";
			$etu="non";


				if ( !empty($_POST)) {
					// keep track validation errors
					$id_expoError = null;
					$ageError = null;
					$etuError = null;
					$tarifError = null;
					$datesError = null;		
					
					// keep track post values
					$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
					$sql = "SELECT * FROM visiteurs where id_visit = $id";
					$result=mysqli_query ($base,$sql);
					if(!$result){
				 		echo("Error description: " . mysqli_error($base));
					}
					$data=mysqli_fetch_array($result,MYSQLI_ASSOC);
					$id_visit = $data['id_visit'];
					mysqli_close($base);

					$id_expo = $_POST['id_expo'];
					$age = $_POST['age'];
					$tarif = $_POST['tarif'];
					$dates = $_POST['ddd'];
					
					if (!empty($_POST['etu'])) {
						$etu = $_POST['etu'];
						if ($_POST['etu']=='oui') {
							$check1="";
							$check2="checked";
						}
					}

					// validate input
					$valid = true;
				

				
					if (empty($id_expo)) {
						$id_expoError = 'Entrer l\'identifiant de l\'exposition';
						$valid = false;
					}
					
					if (empty($age)) {
						$ageError = 'Entrer l\'age du visiteur';
						$valid = false;
					}
					
					if (empty($etu)) {
						$etuError = 'Entrer si vous êtes étudiant';
						$valid = false;
					}

					if (empty($tarif)) {
						$tarifError = 'Entrer le tarif (0-100)';
						$valid = false;
					}

					if (empty($dates)) {
						$datesError = 'Entrer une date';
						$valid = false;
					} else if ( checkdate($dates[1], $dates[2], $dates[3]) ) {
						$datesError = 'Please enter a valid Date';
						$valid = false;						
					}

					// update data
					if ($valid) {
						$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
				    	$sql = "UPDATE visiteurs SET id_expo = '$id_expo', `age` = '$age', `etu` = '$etu', `tarif` = '$tarif', `dates` = '$dates' WHERE `visiteurs`.`id_visit` = $id";
						$result=mysqli_query ($base,$sql);
						if(!$result){
		 					echo("Error description: " . mysqli_error($base));
					  	}
						mysqli_close($base);	
						header("Location: index.php?inter=$table");
					}
				} else {
					$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
				    $sql = "SELECT * FROM visiteurs where id_visit = $id";
					$result=mysqli_query ($base,$sql);
					if(!$result){
			 				echo("Error description: " . mysqli_error($base));
					}
				    $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
				    $id_visit=$data['id_visit'];
					$id_expo = $data['id_expo'];
					$age = $data['age'];
					$etu = $data['etu'];					
					$tarif = $data['tarif'];
					$dates = $data['dates'];
					if ($data['etu']=="oui") {
						$check1="";
						$check2="checked";
					}					
					mysqli_close($base);				
				}
			

			echo '<div class="container">';
    
    			echo '<div class="span10 offset1">';
    				echo '<div class="row">';
		    			echo '<h1>Modifier un '.rtrim($_GET['table'], 's').'</h1>';
		    			    			
		    		echo '</div>';
    		
	    			echo '<form class="form-horizontal" action="update.php?table='.$table.'&id='.$id.'" method="post">';
					  echo '<div class="control-group '; echo !empty($id_visit)?'error':'">';
					    echo '<label class="control-label">Id visiteur</label>';
					    echo '<div class="controls">';
					      	echo "<input name=\"id_expo\" type=\"text\" readonly=\"readonly\" value=\"";
					      	if (!empty($id_visit)) {
					      		echo "$id_visit\"/>";
					      	} else {
					      		echo '"/>';
					      	}
					      	if (!empty($id_visitError)){ 
					      		echo '<span class="help-inline">'.$id_visitError.'</span>';
					      	}
					    echo '</div>';	    			  
					  echo '<div class="control-group '; echo !empty($id_expo)?'error':'">';
					    echo '<label class="control-label">Id expositon</label>';
					    echo '<div class="controls">';
					      	echo "<input name=\"id_expo\" type=\"number\" min=\"1\" max =\"10000\" placeholder=\"1\" value=\"";
					      	if (!empty($id_expo)) {
					      		echo "$id_expo\"/>";
					      	} else {
					      		echo '"/>';
					      	}
					      	if (!empty($id_expoError)){ 
					      		echo '<span class="help-inline">'.$id_expoError.'</span>';
					      	}
					    echo '</div>';
					  echo '</div>';
					  echo '<div class="control-group ';echo !empty($age)?$age:'">';
					    echo '<label class="control-label">Age</label>';
					    echo '<div class="controls">';
					      	echo "<input name=\"age\" type=\"number\" min=\"1\" max =\"150\" placeholder=\"18\" value=\"";
					      	if (!empty($id_expo)) {
					      		echo "$age\"/> ans";
					      	} else {
					      		echo '"/> ans';
					      	}
					      	if (!empty($ageError)){
					      		echo '<span class="help-inline">'.$ageError.'</span>';
					      	}
					    echo '</div>';
					  echo '</div>';

						

				


					  echo '<div class="control-group ';echo !empty($etu)?$etu:'">';;
					    echo '<label class="control-label">Étudiant</label>';
					    echo '<div class="controls" style="margin-left: 220px">';
					    		
					    	  	echo '<input type="radio" class="btn btn-danger " style="padding: 7px 14px;font-size: 16px;cursor: pointer;" name="etu" id="etu1" value="non" '.$check1.'>Non';

								echo '<input type="radio" class="btn" style="border: 2px solid #5bb65b;padding: 7px 14px;font-size: 16px;cursor: pointer;border-color: #5bb65b;color: #5bb65b;" name="etu" id="etu2" value="oui" '.$check2.'>Oui';
								if (!empty($etuError)){
					      		echo '<span class="help-inline">'.$etuError.'</span>';
					      	}
					    echo '</div>';
					  echo '</div>';
					  echo '<div class="control-group ';echo !empty($tarif)?$tarif:'">';
					    echo '<label class="control-label">Tarif</label>';
					    echo '<div class="controls">';
					      	echo "<input name=\"tarif\" type=\"number\" min=\"-0.01\" max=\"100.00\" step=\"0.01\"placeholder=\"14\" value=\"";
					      	if (!empty($tarif)) {
					      		echo "$tarif\"/> €";
					      	} else {
					      		echo '"/> €';
					      	}
					      	if (!empty($tarifError)) {
					      		echo '<span class="help-inline">'.$tarifError.'</span>';
					      	}
					    echo '</div>';
					  echo '</div>';					  
					  echo '<div class="control-group ';echo !empty($dates)?$dates:'">';
					    echo '<label class="control-label">Date</label>';
					    echo '<div class="controls">';
					      	echo "<input name=\"ddd\" type=\"date\" value=\"";
					      	if (!empty($dates)) {
					      		echo "$dates\"/>";
					      	} else {
					      		echo '"/>'; 
					      	}
					      	if (!empty($datesError)) {
					      		echo '<span class="help-inline">'.$datesError.'</span>';
					      	}
					    echo '</div>';
					  echo '</div>';
					  echo '<div class="form-actions">';
						  echo '<button type="submit" class="btn btn-success">Modifier</button>';
						  echo '<a class="btn" href="index.php?inter='.$table.'">Retour</a>';
						echo '</div>';
					echo '</form>';
				echo '</div>';
    		echo '</div> <!-- /container -->';				

		}elseif ($table == "oeuvres") {

			if ( !empty($_POST)) {
				// keep track validation errors
				$typeError = null;
				$titreError = null;
				$artisteError = null;
				$date_realError = null;
				$prix_locError = null;		
				
				// keep track post values
				$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
				$sql = "SELECT * FROM oeuvres where id_oeuvre = $id";
				$result=mysqli_query ($base,$sql);
				if(!$result){
			 		echo("Error description: " . mysqli_error($base));
				}
				$data=mysqli_fetch_array($result,MYSQLI_ASSOC);
				$id_oeuvre = $data['id_oeuvre'];
				mysqli_close($base);

				$type = $_POST['type'];
				$titre = $_POST['titre'];
				$artiste = $_POST['artiste'];
				$date_real = $_POST['date_real'];
				$prix_loc = $_POST['prix_loc'];								
				
				// validate input
				$valid = true;
				if (empty($type)) {
					$typeError = 'Entrer le type';
					$valid = false;
				}
				
				if (empty($titre)) {
					$titreError = 'Entrer le tirre';
					$valid = false;
				}
				
				if (empty($artiste)) {
					$artisteError = 'Entrer l\'artiste';
					$valid = false;
				}

				if (empty($date_real)) {
					$date_realError = 'Entrer la date de ralisation';
					$valid = false;
				} else if ( checkdate($date_real[1], $date_real[2], $date_real[3]) ) {
					$date_realError = 'Entrer une date valide';
					$valid = false;						
				}

				if (empty($prix_loc)) {
					$prix_locError = 'Entrer le prix de la location';
					$valid = false;
				}

					// update data
					if ($valid) {
						$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
				    	$sql = "UPDATE oeuvres SET type = '$type', `titre` = '$titre', `artiste` = '$artiste', `date_real` = '$date_real', `prix_loc` = '$prix_loc' WHERE `oeuvres`.`id_oeuvre` = $id";
						$result=mysqli_query ($base,$sql);
						if(!$result){
		 					echo("Error description: " . mysqli_error($base));
					  	}
						mysqli_close($base);	
						header("Location: index.php?inter=$table");
					}
				} else {
					$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
				    $sql = "SELECT * FROM oeuvres where id_oeuvre = $id";
					$result=mysqli_query ($base,$sql);
					if(!$result){
			 				echo("Error description: " . mysqli_error($base));
					}
				    $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
				    $id_oeuvre = $data['id_oeuvre'];
					$type = $data['type'];
					$titre = $data['titre'];
					$artiste = $data['artiste'];					
					$date_real = $data['date_real'];
					$prix_loc = $data['prix_loc'];
				
					mysqli_close($base);				
				}

			echo '<div class="container">';
    
    			echo '<div class="span10 offset1">';
    				echo '<div class="row">';
		    			echo '<h1>Modifier une '.rtrim($_GET['table'], 's').'</h1>';
		    			    			
		    		echo '</div>';
    		
	    			echo '<form class="form-horizontal" action="update.php?table='.$table.'&id='.$id.'" method="post">';
					  echo '<div class="control-group '; echo !empty($id_oeuvre)?'error':'">';
					    echo '<label class="control-label">Id oeuvre</label>';
					    echo '<div class="controls">';
					      	echo "<input name=\"id_oeuvre\" type=\"text\" readonly=\"readonly\" value=\"";
					      	if (!empty($id_oeuvre)) {
					      		echo "$id_oeuvre\"/>";
					      	} else {
					      		echo '"/>';
					      	}
					      	if (!empty($id_oeuvreError)){ 
					      		echo '<span class="help-inline">'.$id_oeuvreError.'</span>';
					      	}
					    echo '</div>';		    			
					  echo '<div class="control-group '; echo !empty($type)?'error':'">';
					    echo '<label class="control-label">Type</label>';
					    echo '<div class="controls">';
					      	echo "<input name=\"type\" type=\"text\" placeholder=\"Huile sur toile\" value=\"";
					      	if (!empty($type)) {
					      		echo "$type\"/>";
					      	} else {
					      		echo '"/>';
					      	}
					      	if (!empty($typeError)){ 
					      		echo '<span class="help-inline">'.$typeError.'</span>';
					      	}
					    echo '</div>';
					  echo '</div>';
					  echo '<div class="control-group ';echo !empty($titre)?$titre:'">';
					    echo '<label class="control-label">Titre</label>';
					    echo '<div class="controls">';
					      	echo "<input name=\"titre\" type=\"text\" placeholder=\"Titre\" value=\"";
					      	if (!empty($titre)) {
					      		echo "$titre\"/>";
					      	} else {
					      		echo '"/>';
					      	}
					      	if (!empty($titreError)){
					      		echo '<span class="help-inline">'.$titreError.'</span>';
					      	}
					    echo '</div>';
					  echo '</div>';
					  echo '<div class="control-group ';echo !empty($artiste)?$artiste:'">';
					    echo '<label class="control-label">Artiste</label>';
					    echo '<div class="controls">';
					      	echo "<input name=\"artiste\" type=\"text\" placeholder=\"Dupont\" value=\"";
					      	if (!empty($artiste)) {
					      		echo "$artiste\"/>";
					      	} else {
					      		echo '"/>';
					      	}
					      	if (!empty($artisteError)) {
					      		echo '<span class="help-inline">'.$artisteError.'</span>';
					      	}
					    echo '</div>';
					  echo '</div>';
					  echo '<div class="control-group ';echo !empty($date_real)?$date_real:'">';
					    echo '<label class="control-label">Date de réalisation</label>';
					    echo '<div class="controls">';
					      	echo "<input name=\"date_real\" type=\"date\" value=\"";
					      	if (!empty($date_real)) {
					      		echo "$date_real\"/>";
					      	} else {
					      		echo '"/> ';
					      	}					      	
					      	if (!empty($date_realError)) {
					      		echo '<span class="help-inline">'.$date_realError.'</span>';
					      	}
					    echo '</div>';
					  echo '</div>';					  
					  echo '<div class="control-group ';echo !empty($prix_loc)?$prix_loc:'">';
					    echo '<label class="control-label">Prix de la location</label>';
					    echo '<div class="controls">';
					     	echo "<input name=\"prix_loc\" type=\"number\" min=\"0.00\" max=\"1000000.00\" step=\"0.01\" placeholder=\"0\" value=\"";
					      	if (!empty($prix_loc)) {
					      		echo "$prix_loc\"/> €";
					      	} else {
					      		echo '"/> €';
					      	}
					      	if (!empty($prix_locError))	{				      		
					      		echo '<span class="help-inline">'.$prix_locError.'</span>';
					      	}
					    echo '</div>';
					  echo '</div>';
					  echo '<div class="form-actions">';
						  echo '<button type="submit" class="btn btn-success" >Modifier</button>';
						  echo '<a class="btn" href="index.php?inter='.$table.'">Retour</a>';
						echo '</div>';
					echo '</form>';
				echo '</div>';
    		echo '</div> <!-- /container -->';
    	}elseif ($table == "souvenirs") {

			if ( !empty($_POST)) {
				// keep track validation errors
				$id_visitError = null;
				$classeError = null;
				$date_venteError = null;
				$prix_achatError = null;
				$prix_venteError = null;		
				
				// keep track post values
				$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
				$sql = "SELECT * FROM souvenirs where id_objet = $id";
				$result=mysqli_query ($base,$sql);
				if(!$result){
			 		echo("Error description: " . mysqli_error($base));
				}
				$data=mysqli_fetch_array($result,MYSQLI_ASSOC);
				$id_objet = $data['id_objet'];
				mysqli_close($base);

				$id_visit = $_POST['id_visit'];
				$classe = $_POST['classe'];
				$date_vente = $_POST['date_vente'];
				$prix_achat = $_POST['prix_achat'];
				$prix_vente = $_POST['prix_vente'];								
				
				// validate input
				$valid = true;
				if (empty($id_visit)) {
					$id_visitError = 'Entrer l\'identifiant de l\'acheteur';
					$valid = false;
				}
				
				if (empty($classe)) {
					$classeError = 'Entrer la classe del\'objet';
					$valid = false;
				}
				
				if (empty($date_vente)) {
					$date_venteError = 'Entrer la date de vente';
					$valid = false;
				} else if ( checkdate($date_vente[1], $date_vente[2], $date_vente[3]) ) {
					$date_venteError = 'Entrer une date valide';
					$valid = false;	
				}

				if (empty($prix_achat)) {
					$prix_achatError = 'Entrer le prix d\'achat';
					$valid = false;
				}

				if (empty($prix_vente)) {
					$prix_vente= 'non définie';
					$valid = false;
				}

					// update data
					if ($valid) {
						$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
				    	$sql = "UPDATE souvenirs SET id_visit = '$id_visit', `classe` = '$classe', `date_vente` = '$date_vente', `prix_achat` = '$prix_achat', `prix_vente` = '$prix_vente' WHERE `souvenirs`.`id_objet` = $id";
						$result=mysqli_query ($base,$sql);
						if(!$result){
		 					echo("Error description: " . mysqli_error($base));
					  	}
						mysqli_close($base);	
						header("Location: index.php?inter=$table");
					}
					
			} else {
				$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
			    $sql = "SELECT * FROM souvenirs where `souvenirs`.`id_objet` = $id";
				$result=mysqli_query ($base,$sql);
				if(!$result){
					echo("Error description: " . mysqli_error($base));
				}
			    $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
			    $id_objet = $data['id_objet'];
				$id_visit = $data['id_visit'];
				$classe = $data['classe'];
				$date_vente = $data['date_vente'];					
				$prix_achat = $data['prix_achat'];
				$prix_vente = $data['prix_vente'];
				
				mysqli_close($base);				
				
			}

			echo '<div class="container">';
    
    			echo '<div class="span10 offset1">';
    				echo '<div class="row">';
		    			echo '<h1>Modifier un objet</h1>';
		    			    			
		    		echo '</div>';
    		
	    			echo '<form class="form-horizontal" action="update.php?table='.$table.'&id='.$id.'" method="post">';
					  echo '<div class="control-group '; echo !empty($id_objet)?'error':'">';
					    echo '<label class="control-label">Id objet</label>';
					    echo '<div class="controls">';
					      	echo "<input name=\"id_objet\" type=\"text\" readonly=\"readonly\" value=\"";
					      	if (!empty($id_objet)) {
					      		echo "$id_objet\"/>";
					      	} else {
					      		echo '"/>';
					      	}
					      	if (!empty($id_objetError)){ 
					      		echo '<span class="help-inline">'.$id_objetError.'</span>';
					      	}
					    echo '</div>';

					  echo '<div class="control-group '; echo !empty($id_visit)?'error':'">';
					    echo '<label class="control-label">Identifiant de l\'acheteur</label>';
					    echo '<div class="controls">';
					      	echo "<input name=\"id_visit\" type=\"number\" min=\"1\" max=\"10000000\" placeholder=\"Type\" value=\"";
					      	if (!empty($id_visit)) {
					      		echo "$id_visit\"/>";
					      	} else {
					      		echo '"/>';
					      	}
					      	if (!empty($id_visitError)){ 
					      		echo '<span class="help-inline">'.$id_visitError.'</span>';
					      	}
					    echo '</div>';
					  echo '</div>';
					  echo '<div class="control-group ';echo !empty($classe)?$classe:'">';
					    echo '<label class="control-label">Classe</label>';
					    echo '<div class="controls">';
					      	echo "<input name=\"classe\" type=\"text\" placeholder=\"Carte Postale\" value=\"";
					      	if (!empty($classe)) {
					      		echo "$classe\"/>";
					      	} else {
					      		echo '"/>';
					      	}
					      	if (!empty($classeError)){
					      		echo '<span class="help-inline">'.$classeError.'</span>';
					      	}
					    echo '</div>';
					  echo '</div>';
					  echo '<div class="control-group ';echo !empty($date_vente)?$date_vente:'">';
					    echo '<label class="control-label">Date de vente</label>';
					    echo '<div class="controls">';
					      	echo "<input name=\"date_vente\" type=\"date\" value=\"";
					      	if (!empty($date_vente)) {
					      		echo "$date_vente\"/>";
					      	} else {
					      		echo '"/>';
					      	}
					      	if (!empty($date_venteError)) {
					      		echo '<span class="help-inline">'.$date_venteError.'</span>';
					      	}
					    echo '</div>';
					  echo '</div>';
					  echo '<div class="control-group ';echo !empty($prix_achat)?$prix_achat:'">';
					    echo '<label class="control-label">Prix d\'achat par l\'entreprise</label>';
					    echo '<div class="controls">';
					      	echo "<input name=\"prix_achat\" type=\"number\" min=\"0\" max=\"1000000\" step=\"0.01\" placeholder=\"0\" value=\"";
					      	if (!empty($prix_achat)) {
					      		echo "$prix_achat\"/> €";
					      	} else {
					      		echo '"/> €';
					      	}					      	
					      	if (!empty($prix_achatError)) {
					      		echo '<span class="help-inline">'.$prix_achatError.'</span>';
					      	}
					    echo '</div>';
					  echo '</div>';					  
					  echo '<div class="control-group ';echo !empty($prix_vente)?$prix_vente:'">';
					    echo '<label class="control-label">Prix de de vente au client</label>';
					    echo '<div class="controls">';
					     	echo "<input name=\"prix_vente\" type=\"number\" min=\"0\" max=\"1000000\" step=\"0.01\" placeholder=\"0\" value=\"";		
					      	if (!empty($prix_vente)) {
					      		echo "$prix_vente\"/> €";
					      	} else {
					      		echo '"/> €';
					      	}
					      	if (!empty($prix_venteError))	{				      		
					      		echo '<span class="help-inline">'.$prix_venteError.'</span>';
					      	}
					    echo '</div>';
					  echo '</div>';
					  echo '<div class="form-actions">';
						  echo '<button type="submit" class="btn btn-success">Modifier</button>';
						  echo '<a class="btn" href="index.php?inter='.$table.'">Back</a>';
						echo '</div>';
					echo '</form>';
				echo '</div>';
    		echo '</div> <!-- /container -->';
    	} elseif ($table == "expositions") {

			if ( !empty($_POST)) {
				// keep track validation errors
				$themeError = null;
				$date_expodebutError = null;
				$date_expofinError = null;				
				$cout_expoError = null;	
				
				// keep track post values
				$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
				$sql = "SELECT * FROM expositions where id_expo = $id";
				$result=mysqli_query ($base,$sql);
				if(!$result){
			 		echo("Error description: " . mysqli_error($base));
				}
				$data=mysqli_fetch_array($result,MYSQLI_ASSOC);
				$id_expo = $data['id_expo'];
				mysqli_close($base);
				$theme = $_POST['theme'];
				$date_expodebut = $_POST['date_expodebut'];
				$date_expofin = $_POST['date_expofin'];				
				$cout_expo = $_POST['cout_expo'];
				
				// validate input
				$valid = true;
				if (empty($theme)) {
					$themeError = 'Entrer le thème';
					$valid = false;
				}
				
				if (empty($date_expodebut)) {
					$date_expodebutError = 'Entrer la date de début de l\'exposition';
					$valid = false;
				}else if ( checkdate($date_expodebut[1], $date_expodebut[2], $date_expodebut[3]) ) {
					$date_expodebutError = 'Entrer une date valide';
					$valid = false;						
				}

				if (empty($date_expofin)) {
					$date_expofinError = 'Entrer la date de fin de l\'exposition';
					$valid = false;
				}else if ( checkdate($date_expofin[1], $date_expofin[2], $date_expofin[3]) ) {
					$date_expofinError = 'Entrer une date valide';
					$valid = false;						
				}

				if (empty($cout_expo)) {
					$cout_expoError = 'Entrer le cout total de l\exposition';
					$valid = false;
				} 

					// update data
				if ($valid) {
					$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
				   	$sql = "UPDATE expositions SET `theme` = '$theme', `date_expodebut` = '$date_expodebut', `date_expofin` = '$date_expofin', `cout_expo` = '$cout_expo' WHERE `expositions`.`id_expo` = $id";
					$result=mysqli_query ($base,$sql);
					if(!$result){
		 				echo("Error description: " . mysqli_error($base));
					}
					mysqli_close($base);	
					header("Location: index.php?inter=$table");
				}	
					
			} else {
				$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
			    $sql = "SELECT * FROM expositions where id_expo = $id";
				$result=mysqli_query ($base,$sql);
				if(!$result){
					echo("Error description: " . mysqli_error($base));
				}
			    $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
			    $id_expo = $data['id_expo'];
				$theme = $data['theme'];
				$date_expodebut = $data['date_expodebut'];
				$date_expofin = $data['date_expofin'];
				$cout_expo = $data['cout_expo'];					

				mysqli_close($base);				
			}

			echo '<div class="container">';
    
    			echo '<div class="span10 offset1">';
    				echo '<div class="row">';
		    			echo '<h1>Modifier une '.rtrim($_GET['table'], 's').'</h1>';
		    			    			
		    		echo '</div>';
    		
	    			echo '<form class="form-horizontal" action="update.php?table='.$table.'&id='.$id.'" method="post">';
					  echo '<div class="control-group '; echo !empty($id_expo)?'error':'">';
					    echo '<label class="control-label">Id expo</label>';
					    echo '<div class="controls">';
					      	echo "<input name=\"id_expo\" type=\"text\" readonly=\"readonly\" value=\"";
					      	if (!empty($id_expo)) {
					      		echo "$id_expo\"/>";
					      	} else {
					      		echo '"/>';
					      	}
					      	if (!empty($id_expoError)){ 
					      		echo '<span class="help-inline">'.$id_expoError.'</span>';
					      	}
					    echo '</div>';

					  echo '<div class="control-group '; echo !empty($theme)?'error':'">';
					    echo '<label class="control-label">Thème</label>';
					    echo '<div class="controls">';
					      	echo "<input name=\"theme\" type=\"text\" placeholder=\"Arts modernes\" value=\"";
					      	if (!empty($theme)) {
					      		echo "$theme\"/>";
					      	} else {
					      		echo '"/>';
					      	}
					      	if (!empty($themeError)){ 
					      		echo '<span class="help-inline">'.$themeError.'</span>';
					      	}
					    echo '</div>';
					  echo '</div>';
					  echo '<div class="control-group ';echo !empty($date_expodebut)?$date_expodebut:'">';
					    echo '<label class="control-label">Date du debut de l\'exposition</label>';
					    echo '<div class="controls">';
					      	echo "<input name=\"date_expodebut\" type=\"date\" value=\"";
					      	if (!empty($date_expodebut)) {
					      		echo "$date_expodebut\"/>";
					      	} else {
					      		echo '"/>';
					      	}
					      	if (!empty($date_expodebutError)){
					      		echo '<span class="help-inline">'.$date_expodebutError.'</span>';
					      	}
					    echo '</div>';
					  echo '</div>';
					  echo '<div class="control-group ';echo !empty($date_expofin)?$date_expofin:'">';
					    echo '<label class="control-label">Date de fin de l\'exposition</label>';
					    echo '<div class="controls">';
					      	echo "<input name=\"date_expofin\" type=\"date\" value=\"";
					      	if (!empty($date_expofin)) {
					      		echo "$date_expofin\"/>";
					      	} else {
					      		echo '"/>';
					      	}
					      	if (!empty($date_expofinError)){
					      		echo '<span class="help-inline">'.$date_expofinError.'</span>';
					      	}
					    echo '</div>';
					  echo '</div>';					  
					  echo '<div class="control-group ';echo !empty($cout_expo)?$cout_expo:'">';
					    echo '<label class="control-label">Cout total de l\'exposition (sans loc oeuvre)</label>';
					    echo '<div class="controls">';
					      	echo "<input name=\"cout_expo\" type=\"number\" min=\"0\" max=\"10000000\" step=\"0.01\" placeholder=\"0\" value=\"";
					      	if (!empty($cout_expo)) {
					      		echo "$cout_expo\"/> €";
					      	} else {
					      		echo '"/> €';
					      	}
					      	if (!empty($cout_expoError)) {
					      		echo '<span class="help-inline">'.$cout_expoError.'</span>';
					      	}
					    echo '</div>';
					  echo '</div>';
					  echo '<div class="form-actions">';
						  echo '<button type="submit" class="btn btn-success">Modifier</button>';
						  echo '<a class="btn" href="index.php?inter='.$table.'">Back</a>';
						echo '</div>';
					echo '</form>';
				echo '</div>';
    		echo '</div> <!-- /container -->';
    	}
	?>
</body>
</html>
