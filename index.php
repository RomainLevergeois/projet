<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Projet LGS: Index</title>
	<style>
		select[id='select2'] {
	      width: 150px;
	    }
	    select[id='select3'] {
	      width: 150px;
	    }
	    select[id='select4'] {
	      width: 150px;
	    }
	    select[id='select5'] {
	      width: 150px;
	    }
	    select[id='select5b'] {
	      width: 150px;
	    }
	    select[id='select6'] {
	      width: 150px;
	    }
	    select[id='select7'] {
	      width: 150px;
	    }


		input[id='myRange1'] {
	      width: 150px;
	    }
		input[id='myRange2'] {
	      width: 150px;
	    }
		input[id='myRange3'] {
	      width: 150px;
	    }
		input[id='myRange4'] {
	      width: 150px;
	    }
	    input[id='myRange5'] {
	      width: 150px;
	    }
	    input[id='myRange6'] {
	      width: 150px;
	    }
	    input[id='myRange7'] {
	      width: 150px;
	    }
	    input[id='myRange8'] {
	      width: 150px;
	    }

	    input[id='datedeb'] {
	      width: 100px;
	    }
	    input[id='datefin'] {
	      width: 100px;
	    }
	    input[id='daterealdeb'] {
	      width: 100px;
	    }
	    input[id='daterealfin'] {
	      width: 100px;
	    }
	    input[id='date_ventedeb'] {
	      width: 100px;
	    }
	    input[id='date_ventefin'] {
	      width: 100px;
	    }	    	    	    

	</style>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
    <script language="javascript">
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
			<div class="row" style="border-bottom: 2px solid black">
				<p>
                <form action="index.php" method="post">
                    <select name="id_table" id="yo">
                        <option value=" " selected>--Choisissez une table--</option>
                        <option value="visiteurs">Visiteurs</option>
                        <option value="oeuvres">Oeuvres</option>
                        <option value="souvenirs">Souvenirs</option>
                        <option value="expositions">Expositions</option>                      
                    </select>
                    	<a class="btn btn-primary" href="tab_financier.php" title="Cliquer pour accéder aux tableaux financiers">Tableaux financiers</a>
               		</br>
                    <input type="submit" value="Go" title="valider pour aller à la table sélectionnée" />
                </p>
                </form>
            </div>
        	</br>
   			<div class="row">
    
                <?php
       
					/* on vérifie que l'information "id_table" existe ET qu'elle n'est pas vide : */
     				
     				if ( isset($_POST['id_table']) && !empty($_POST['id_table'])) {
     					$table=$_POST['id_table'];
						if ( $_POST['id_table']==" ") {
	     					echo '<p style="color:red;">Veuillez choisir une table</p>';

     					} elseif ( $_POST['id_table']=="visiteurs") {
     						echo '<form class="form-horizontal" action="index.php?inter='.$table.'" method="post">';
     						echo '<table class="table table-dark table-bordered" style="background-color: #5A5E6B;color: white;">';
     						echo '<tr>';
						   	echo '<td>Trier par:</td>';
						   	echo '<td>
						   			<div class="form-check">
									  <input class="form-check-input" type="checkbox" value="1" name="tri_idexpo"> Identifiant exposition
									</div>
								  </td>';
						   	echo '<td>
						   			<div class="form-check">
									  <input class="form-check-input" type="checkbox" value="2" name="tri_age"> âge
									</div> 
								  </td>';
							echo '<td>
						   			<div class="form-check">
									  <input class="form-check-input" type="checkbox" value="3" name="tri_etu"> Étudiant
									</div> 
								  </td>';
							echo '<td>
						   			<div class="form-check">
									  <input class="form-check-input" type="checkbox" value="4" name="tri_TARIF"> Tarif
									</div> 
								  </td>';
							echo '<td>
						   			<div class="form-check">
									  <input class="form-check-input" type="checkbox" value="5" name="tri_date"> Date
									</div> 
								  </td>';
						   	echo'</tr>';
						   	echo '<tr>';
						   	echo '<td>';
						   		echo '<button type="submit" class="btn btn-success" title ="Cliquer pour le tri">Go</button>';
						   	echo '</td>';
						   	echo '<td>';
						   			include_once("myparam.inc.php");
									$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
									if (mysqli_connect_errno()){
										echo "Failed to connect to MySQL: " . mysqli_connect_error();
										}
						                        	                        
									$sql = 'SELECT DISTINCT id_expo FROM visiteurs ORDER BY id_expo';
									$result=mysqli_query ($base,$sql);
											
												
									if(!$result){
		 								echo("Error description: " . mysqli_error($base));
									}else{ 
										$nbcol=mysqli_num_fields($result); $nbmod=mysqli_num_rows($result);
										echo '<select class="form-select" name="table_idexpo" id="select2" >';
										echo '<option value="" selected> </option>';
										while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
											echo '<option value='.$row['id_expo'].'>'. $row['id_expo'] . '</option>';
										}
										echo '</select>';
									}
									mysqli_close($base);
							echo '</td>';
							echo '<td align="center">
									<center><div class="slidecontainer">
									  <center>Entre</center>
									  <p> <span id="demo1"> </span> ans
									  <input type="range" min="1" max="100" value="1" class="slider" name ="myRange1" id="myRange1" /></p>
									  <center>Et</center>
									  <p> <input type="range" min="1" max="100" value="50" class="slider1" name ="myRange2" id="myRange2" />
									  <span id="demo2"> </span> ans</p></center>
									</div>

									<script>
										var slider1 = document.getElementById("myRange1");
										var output1 = document.getElementById("demo1");
										output1.innerHTML = slider1.value;
										
										const el1 = document.querySelector("#myRange2");
										el1.addEventListener("input", function(){
																		if (Number(slider2.value)-Number(slider1.value)<=1){
																	 		slider1.value=Number(slider2.value);
																	 		output1.innerHTML = slider1.value;}
																		});

										slider1.oninput = function() {
										  output1.innerHTML = this.value;
										}
										var slider2 = document.getElementById("myRange2");
										var output2 = document.getElementById("demo2");
										output2.innerHTML = slider2.value;

										const el2 = document.querySelector("#myRange1");
										el2.addEventListener("input", function(){
																		if (Number(slider2.value)-Number(slider1.value)<=1){
																	 		slider2.value=Number(slider1.value);
																	 		output2.innerHTML = slider2.value;}
																		});
										slider2.oninput = function() {
										  output2.innerHTML = this.value;
										}										
									</script>';
							echo '</td>';
							echo '<td>
								    <input type="radio" value="oui" class="btn btn-radio" name="btnradetu" id="btnradetu1">Oui</input><br/>
								    <input type="radio" value="non" class="btn btn-radio" name="btnradetu" id="btnradetu2">Non</input>
							      </td>';
							echo '<td>
									<center><div class="slidecontainer">
									  <center>Entre</center>
									  <p> <span id="demo3"> </span> €
									  <input type="range" min="1" max="100" value="1" class="slider" name ="myRange3" id="myRange3" /></p>
									  <center>Et</center>
									  <p> <input type="range" min="1" max="100" value="50" class="slider" name ="myRange4" id="myRange4" />
									  <span id="demo4"> </span> €</p></center>
									</div>

									<script>
										var slider3 = document.getElementById("myRange3");
										var output3 = document.getElementById("demo3");
										output3.innerHTML = slider3.value;
										
										const el3 = document.querySelector("#myRange4");
										el3.addEventListener("input", function(){
																		if (Number(slider4.value)-Number(slider3.value)<=1){
																	 		slider3.value=Number(slider4.value);
																	 		output3.innerHTML = slider3.value;}
																		});

										slider3.oninput = function() {
										  output3.innerHTML = this.value;
										}
										var slider4 = document.getElementById("myRange4");
										var output4 = document.getElementById("demo4");
										output4.innerHTML = slider4.value;

										const el4 = document.querySelector("#myRange3");
										el4.addEventListener("input", function(){
																		if (Number(slider4.value)-Number(slider3.value)<=1){
																	 		slider4.value=Number(slider3.value);
																	 		output4.innerHTML = slider4.value;}
																		});
										slider4.oninput = function() {
										  output4.innerHTML = this.value;
										}										
									</script>
							      </td>';
							echo '<td>
									<p> Du <input type="date" value="datedeb" class="input date" name="datedeb" id="datedeb" /></p>
								    <p>Au <input type="date" value="datefin" class="input date" name="datefin" id="datefin" /> </p>
							      </td>';
						   	echo'</tr>';
						   	echo '</table>';
						   	echo '</form>';

							include_once("myparam.inc.php");
							$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
							if (mysqli_connect_errno()){
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
								}
							$operateurexpo = ">";
				            $id_expo = 0;
				            $agedeb = 1;
				            $agefin = 120;  
				            $etudeb = '"oui"';   
				            $etufin = '"non"'; 
				            $tarifdeb = 0;
				            $tariffin = 100;
				            $datdeb = "1970-01-01";
				            $datfin = '"'.date('Y-m-d', time()).'"';
				            $TRI="";

				            if ((isset($_POST['tri_idexpo']) && empty($_POST['table_idexpo'])) || (isset($_POST['tri_age']) && (empty($_POST['myRange1']) || empty($_POST['myRange2']))) || (isset($_POST['tri_etu']) && empty($_POST['btnradetu'])) || (isset($_POST['tri_TARIF']) && (empty($_POST['myRange3']) || empty($_POST['myRange4'])  )) || (isset($_POST['tri_date']) && (empty($_POST['datedeb']) || empty($_POST['datefin'])  ))) {
					            	echo "<script>alert(\"Il manque un paramètre pour le tri\")</script>";
					        }

				            if ( !empty($_POST)) {
				            	if ( !empty($_POST['table_idexpo']) && !empty($_POST['tri_idexpo'])) {
					            	$operateurexpo = "=";
					            	$id_expo = $_POST['table_idexpo'];
					            	$TRI = "Id exposition: ".$id_expo;
					            }
				            	if ( (!empty($_POST['myRange1']) && !empty($_POST['myRange2'])) && !empty($_POST['tri_age'])) {
						            $agedeb = $_POST['myRange1'];
						            $agefin = $_POST['myRange2'];
						            $TRI = $TRI.", âge entre ".$agedeb." ans et ".$agefin." ans"; 
					            } 
				            	if ( !empty($_POST['btnradetu']) && !empty($_POST['tri_etu'])) {
				            		$etudeb ='"'.$_POST['btnradetu'].'"';
				            		$etufin ='"'.$_POST['btnradetu'].'"';
				            		$TRI = $TRI.", étudiant : ".$etudeb; 
					            }
					            if ( (!empty($_POST['myRange3']) && !empty($_POST['myRange4'])) && !empty($_POST['tri_TARIF'])) {
						            $tarifdeb = $_POST['myRange3'];
						            $tariffin = $_POST['myRange4'];
						            $TRI = $TRI.", tarif entre ".$tarifdeb." € et ".$tariffin." €";  
					            }
					            if ( !empty($_POST['datedeb']) && !empty($_POST['datefin'])) {
					            	$datdeb = '"'.$_POST['datedeb'].'"';
					            	$datfin = '"'.$_POST['datefin'].'"';
					            	$TRI = $TRI.", dates entre ".substr($datdeb, 9, 2).'/'.substr($datdeb, 6, 2).'/'.substr($datdeb, 1, 4)." et ".substr($datfin, 9, 2).'/'.substr($datfin, 6, 2).'/'.substr($datfin, 1, 4); 
					            }  					            					             
				            } else {
					         	$operateurexpo = ">";
					            $id_expo = 0;
					            $agedeb = 1;
					            $agefin = 120;  
					            $etudeb = '"oui"';   
					            $etufin = '"non"'; 
					            $tarifdeb = 0;
					            $tariffin = 100;
					            $datdeb = "1970-01-01";
				            	$datfin = '"'.date('Y-m-d', time()).'"';


				            }

							$sql = 'SELECT COUNT(*) AS count FROM visiteurs WHERE id_expo'.$operateurexpo.$id_expo.' AND age BETWEEN '.$agedeb.' AND '.$agefin.' AND (etu = '.$etudeb.' OR etu = '.$etufin.') AND tarif BETWEEN '.$tarifdeb.' AND '.$tariffin.' AND dates>='.$datdeb.' AND dates<='.$datfin;

							$result=mysqli_query ($base,$sql);
										
							if(!$result){
 								echo("Error description: " . mysqli_error($base));
							}else{ 
								$nbcol=mysqli_num_fields($result); $nbmod=mysqli_num_rows($result);
								while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
						   			echo '<p>Tri: '.$row['count'].' résultats; '.$TRI.'</p>';
								}					
							}
							mysqli_close($base);

   							echo '<table class="table table-striped table-bordered">';
	            			echo '<thead class="thead-dark">';
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

							$sql = 'SELECT * FROM visiteurs WHERE id_expo'.$operateurexpo.$id_expo.' AND age BETWEEN '.$agedeb.' AND '.$agefin.' AND (etu = '.$etudeb.' OR etu = '.$etufin.') AND tarif BETWEEN '.$tarifdeb.' AND '.$tariffin.' AND dates>='.$datdeb.' AND dates<='.$datfin;
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
								echo '</table>';
	          	
					          	if (!empty($_POST['id_table']) && $_POST['id_table']!=" " && $_POST['id_table']!="requetes" ) {
					          		echo '<p><a href="create.php?table='.$_POST['id_table'].'" class="btn btn-success" title ="Cliquer pour créer un visiteur">Créer</a></p>';
					          	}								
							}
							mysqli_close($base);

						}elseif($_POST['id_table']=="oeuvres"){
							echo '<form class="form-horizontal" action="index.php?inter='.$table.'" method="post">';
     						echo '<table class="table table-dark table-bordered" style="background-color: #5A5E6B;color: white;">';
     						echo '<tr>';
						   	echo '<td>Trier par:</td>';
						   	echo '<td>
						   			<div class="form-check">
									  <input class="form-check-input" type="checkbox" value="1" name="tri_idexpo"> Id expo
									</div>
								  </td>';						   	
						   	echo '<td>
						   			<div class="form-check">
									  <input class="form-check-input" type="checkbox" value="1" name="tri_type"> Type
									</div>
								  </td>';
						   	echo '<td>
						   			<div class="form-check">
									  <input class="form-check-input" type="checkbox" value="2" name="tri_titre"> Titre
									</div> 
								  </td>';
							echo '<td>
						   			<div class="form-check">
									  <input class="form-check-input" type="checkbox" value="3" name="tri_artiste"> Artiste
									</div> 
								  </td>';
							echo '<td>
						   			<div class="form-check">
									  <input class="form-check-input" type="checkbox" value="4" name="tri_datereal"> Date de réalisation
									</div> 
								  </td>';
							echo '<td>
						   			<div class="form-check">
									  <input class="form-check-input" type="checkbox" value="5" name="tri_prixloc"> Prix de la location
									</div> 
								  </td>';
						   	echo'</tr>';
						   	echo '<tr>';
						   	echo '<td>';
						   		echo '<button type="submit" class="btn btn-success" title ="Cliquer pour le tri">Go</button>';
						   	echo '</td>';
							echo '<td>';
						   			include_once("myparam.inc.php");
									$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
									if (mysqli_connect_errno()){
										echo "Failed to connect to MySQL: " . mysqli_connect_error();
										}
						                        	                        
									$sql = 'SELECT DISTINCT id_expo FROM oeuvres NATURAL JOIN participe ORDER BY id_expo';
									$result=mysqli_query ($base,$sql);
											
												
									if(!$result){
		 								echo("Error description: " . mysqli_error($base));
									}else{ 
										$nbcol=mysqli_num_fields($result); $nbmod=mysqli_num_rows($result);
										echo '<select class="form-select" name="table_idexpo" id="select5b" >';
										echo '<option value="" selected> </option>';
										while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
											echo '<option value='.$row['id_expo'].'>'.$row['id_expo'].'</option>';
										}
										echo '</select>';
									}
									mysqli_close($base);
							echo '</td>';						   	
						   	echo '<td>';
						   			include_once("myparam.inc.php");
									$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
									if (mysqli_connect_errno()){
										echo "Failed to connect to MySQL: " . mysqli_connect_error();
										}
						                        	                        
									$sql = 'SELECT DISTINCT type FROM oeuvres ORDER BY type';
									$result=mysqli_query ($base,$sql);
											
												
									if(!$result){
		 								echo("Error description: " . mysqli_error($base));
									}else{ 
										$nbcol=mysqli_num_fields($result); $nbmod=mysqli_num_rows($result);
										echo '<select class="form-select" name="table_type" id="select3" >';
										echo '<option value="" selected> </option>';
										while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
											echo '<option value="'.$row['type'].'">'.$row['type'].'</option>';
										}
										echo '</select>';
									}
									mysqli_close($base);
							echo '</td>';
							echo '<td align="center">';
						   			include_once("myparam.inc.php");
									$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
									if (mysqli_connect_errno()){
										echo "Failed to connect to MySQL: " . mysqli_connect_error();
										}
						                        	                        
									$sql = 'SELECT DISTINCT titre FROM oeuvres ORDER BY titre';
									$result=mysqli_query ($base,$sql);
											
												
									if(!$result){
		 								echo("Error description: " . mysqli_error($base));
									}else{ 
										$nbcol=mysqli_num_fields($result); $nbmod=mysqli_num_rows($result);
										echo '<select class="form-select" name="table_titre" id="select4" >';
										echo '<option value="" selected> </option>';
										while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
											echo '<option value="'.$row['titre'].'">'.$row['titre'].'</option>';
										}
										echo '</select>';
									}
									mysqli_close($base);
							echo '</td>';
							echo '<td>';
						   			include_once("myparam.inc.php");
									$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
									if (mysqli_connect_errno()){
										echo "Failed to connect to MySQL: " . mysqli_connect_error();
										}
						                        	                        
									$sql = 'SELECT DISTINCT artiste FROM oeuvres ORDER BY artiste';
									$result=mysqli_query ($base,$sql);
											
												
									if(!$result){
		 								echo("Error description: " . mysqli_error($base));
									}else{ 
										$nbcol=mysqli_num_fields($result); $nbmod=mysqli_num_rows($result);
										echo '<select class="form-select" name="table_artiste" id="select5" >';
										echo '<option value="" selected> </option>';
										while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
											echo '<option value="'.$row['artiste'].'">'.$row['artiste'].'</option>';
										}
										echo '</select>';
									}
									mysqli_close($base);
							echo '</td>';
							echo '<td>
									<p> Du <input type="date" value="daterealdeb" class="input date" name="daterealdeb" id="daterealdeb" /></p>
								    <p>Au <input type="date" value="daterealfin" class="input date" name="daterealfin" id="daterealfin" /> </p>			
							      </td>';
							echo '<td>
									<center><div class="slidecontainer">
									  <center>Entre</center>
									  <p> <span id="demo3"> </span> €
									  <input type="range" min="1" max="10000" value="1" class="slider" name ="myRange3" id="myRange3" /></p>
									  <center>Et</center>
									  <p> <input type="range" min="1" max="10000" value="50" class="slider1" name ="myRange4" id="myRange4" />
									  <span id="demo4"> </span> €</p></center>
									</div>

									<script>
										var slider3 = document.getElementById("myRange3");
										var output3 = document.getElementById("demo3");
										output3.innerHTML = slider3.value;
										
										const el3 = document.querySelector("#myRange4");
										el3.addEventListener("input", function(){
																		if (Number(slider4.value)-Number(slider3.value)<=1){
																	 		slider3.value=Number(slider4.value);
																	 		output3.innerHTML = slider3.value;}
																		});

										slider3.oninput = function() {
										  output3.innerHTML = this.value;
										}
										var slider4 = document.getElementById("myRange4");
										var output4 = document.getElementById("demo4");
										output4.innerHTML = slider4.value;

										const el4 = document.querySelector("#myRange3");
										el4.addEventListener("input", function(){
																		if (Number(slider4.value)-Number(slider3.value)<=1){
																	 		slider4.value=Number(slider3.value);
																	 		output4.innerHTML = slider4.value;}
																		});
										slider4.oninput = function() {
										  output4.innerHTML = this.value;
										}										
									</script>
							      </td>';
						   	echo'</tr>';
						   	echo '</table>';
						   	echo '</form>';

							include_once("myparam.inc.php");
							$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
							if (mysqli_connect_errno()){
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
								}

							$operateurexpo = ">=";
				            $id_expo = 0;
				            $type = "";
				            $titre = "";
				            $artiste = "";  
				            $prixlocdeb = 0;
				            $prixlocfin = 10000;
				            $datrealdeb = "1970-01-01";
				            $datrealfin = '"'.date('Y-m-d', time()).'"';
				            $TRI="";

				            if ((isset($_POST['tri_idexpo']) && empty($_POST['table_idexpo'])) || (isset($_POST['tri_type']) && empty($_POST['table_type'])) || (isset($_POST['tri_titre']) && empty($_POST['table_titre'])) || (isset($_POST['tri_artiste']) && empty($_POST['table_artiste'])) || (isset($_POST['tri_prixloc']) && (empty($_POST['myRange3']) || empty($_POST['myRange4'])  )) || (isset($_POST['tri_datereal']) && (empty($_POST['daterealdeb']) || empty($_POST['daterealfin'])  ))) {
					            	echo "<script>alert(\"Il manque un paramètre pour le tri\")</script>";
					        }

				            if ( !empty($_POST)) {
				            	if ( !empty($_POST['table_idexpo']) && !empty($_POST['tri_idexpo'])) {
				            		$operateurexpo = "=";
					            	$id_expo = $_POST['table_idexpo'];
					            	$TRI = "Id expo: ".$_POST['table_idexpo'];
					            }
				            	if ( !empty($_POST['table_type']) && !empty($_POST['tri_type'])) {
					            	$type = " type = '".$_POST['table_type']."' AND ";
					            	$TRI = "Type: ".$_POST['table_type'];
					            }
				            	if ( !empty($_POST['table_titre']) && !empty($_POST['tri_titre'])) {
					            	$titre = " titre = '".$_POST['table_titre']."' AND ";
					            	$TRI = $TRI.", Titre: ".$_POST['table_titre'];
					            }
				            	if ( !empty($_POST['table_artiste']) && !empty($_POST['tri_artiste'])) {
					            	$artiste = " artiste = '".$_POST['table_artiste']."' AND ";
					            	$TRI = $TRI.", Artiste: ".$_POST['table_artiste'];
					            }
					            if ( (!empty($_POST['myRange3']) && !empty($_POST['myRange4'])) && !empty($_POST['tri_prixloc'])) {
						            $prixlocdeb = $_POST['myRange3'];
						            $prixlocfin = $_POST['myRange4'];
						            $TRI = $TRI.", prix de la location entre ".$prixlocdeb." € et ".$prixlocfin." €"; 
					            }
					            if ( !empty($_POST['daterealdeb']) && !empty($_POST['daterealfin'])) {
					            	$datrealdeb = '"'.$_POST['daterealdeb'].'"';
					            	$datrealfin = '"'.$_POST['daterealfin'].'"';
					            	$TRI = $TRI.", dates de réalisations entre ".substr($datrealdeb, 9, 2).'/'.substr($datrealdeb, 6, 2).'/'.substr($datrealdeb, 1, 4)." et ".substr($datrealfin, 9, 2).'/'.substr($datrealfin, 6, 2).'/'.substr($datrealfin, 1, 4);
					            }  					            					             
				            } else {

				            	$operateurexpo = ">=";
				          	    $id_expo = 0;
					            $type = "";
					            $titre = "";
					            $artiste = "";  
					            $prixlocdeb = 0;
					            $prixlocfin = 10000;
					            $datrealdeb = "1970-01-01";
					            $datrealfin = '"'.date('Y-m-d', time()).'"'; 

				            }

							$sql = 'SELECT COUNT(*) AS count FROM oeuvres NATURAL JOIN participe WHERE'.$type.$titre.$artiste.' id_expo'.$operateurexpo.$id_expo.' AND prix_loc BETWEEN '.$prixlocdeb.' AND '.$prixlocfin.' AND date_real>='.$datrealdeb.' AND date_real<='.$datrealfin;

							$result=mysqli_query ($base,$sql);
										
							if(!$result){
 								echo("Error description: " . mysqli_error($base));
							}else{ 
								$nbcol=mysqli_num_fields($result); $nbmod=mysqli_num_rows($result);
								while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
						   			echo '<p>Tri: '.$row['count'].' résultats; '.$TRI.'</p>';
								}					
							}
							mysqli_close($base);


   							echo '<table class="table table-striped table-bordered">';
            				echo '<thead>';
           					echo '<tr>';
           					echo '<th>Identifiant Oeuvre</th>';
           					echo '<th>Participe à l\'expo</th>';
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

							$sql = 'SELECT * FROM oeuvres NATURAL JOIN participe WHERE'.$type.$titre.$artiste.' participe.id_expo'.$operateurexpo.$id_expo.' AND prix_loc BETWEEN '.$prixlocdeb.' AND '.$prixlocfin.' AND date_real>='.$datrealdeb.' AND date_real<='.$datrealfin;
							$result=mysqli_query ($base,$sql);
									
								
							if(!$result){
 								echo("Error description: " . mysqli_error($base));
							}else{ 
								$nbcol=mysqli_num_fields($result); $nbmod=mysqli_num_rows($result);
								while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
					   				echo '<tr>';
						   			echo '<td>'. $row['id_oeuvre'] . '</td>';
						   			echo '<td>'. $row['id_expo'] . '</td>';
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
								echo '</table>';
	          	
					          	if (!empty($_POST['id_table']) && $_POST['id_table']!=" " && $_POST['id_table']!="requetes" ) {
					          		echo '<p><a href="create.php?table='.$_POST['id_table'].'" class="btn btn-success" title ="Cliquer pour créer une oeuvre">Créer</a></p>';
					          	}								
							}
							mysqli_close($base);
     					}elseif($_POST['id_table']=="souvenirs"){
							echo '<form class="form-horizontal" action="index.php?inter='.$table.'" method="post">';
     						echo '<table class="table table-dark table-bordered" style="background-color: #5A5E6B;color: white;">';
     						echo '<tr>';
						   	echo '<td>Trier par:</td>';
						   	echo '<td>
						   			<div class="form-check">
									  <input class="form-check-input" type="checkbox" value="1" name="tri_idacheteur"> Id acheteur
									</div>
								  </td>';
						   	echo '<td>
						   			<div class="form-check">
									  <input class="form-check-input" type="checkbox" value="2" name="tri_classe"> Classe
									</div> 
								  </td>';
							echo '<td>
						   			<div class="form-check">
									  <input class="form-check-input" type="checkbox" value="3" name="tri_datevente"> Date de vente
									</div> 
								  </td>';
							echo '<td>
						   			<div class="form-check">
									  <input class="form-check-input" type="checkbox" value="4" name="tri_prixachat"> Prix achat
									</div> 
								  </td>';
							echo '<td>
						   			<div class="form-check">
									  <input class="form-check-input" type="checkbox" value="5" name="tri_prixvente"> Prix de vente
									</div> 
								  </td>';
						   	echo'</tr>';
						   	echo '<tr>';
						   	echo '<td>';
						   		echo '<button type="submit" class="btn btn-success" title ="Cliquer pour le tri">Go</button>';
						   	echo '</td>';
						   	echo '<td>';
						   			include_once("myparam.inc.php");
									$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
									if (mysqli_connect_errno()){
										echo "Failed to connect to MySQL: " . mysqli_connect_error();
										}
						                        	                        
									$sql = 'SELECT DISTINCT id_visit FROM souvenirs ORDER BY id_visit';
									$result=mysqli_query ($base,$sql);
											
												
									if(!$result){
		 								echo("Error description: " . mysqli_error($base));
									}else{ 
										$nbcol=mysqli_num_fields($result); $nbmod=mysqli_num_rows($result);
										echo '<select class="form-select" name="table_idacheteur" id="select6" >';
										echo '<option value="" selected> </option>';
										while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
											echo '<option value='.$row['id_visit'].'>'.$row['id_visit'].'</option>';
										}
										echo '</select>';
									}
									mysqli_close($base);
							echo '</td>';
							echo '<td align="center">';
						   			include_once("myparam.inc.php");
									$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
									if (mysqli_connect_errno()){
										echo "Failed to connect to MySQL: " . mysqli_connect_error();
										}
						                        	                        
									$sql = 'SELECT DISTINCT classe FROM souvenirs ORDER BY classe';
									$result=mysqli_query ($base,$sql);
											
												
									if(!$result){
		 								echo("Error description: " . mysqli_error($base));
									}else{ 
										$nbcol=mysqli_num_fields($result); $nbmod=mysqli_num_rows($result);
										echo '<select class="form-select" name="table_classe" id="select7" >';
										echo '<option value="" selected> </option>';
										while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
											echo '<option value="'.$row['classe'].'">'.$row['classe'].'</option>';
										}
										echo '</select>';
									}
									mysqli_close($base);
							echo '</td>';
							echo '<td>
									<p> Du <input type="date" value="date_ventedeb" class="input date" name="date_ventedeb" id="date_ventedeb" /></p>
								    <p>Au <input type="date" value="date_ventefin" class="input date" name="date_ventefin" id="date_ventefin" /> </p>						   			
							     </td>';
							echo '<td>
									<center><div class="slidecontainer">
									  <center>Entre</center>
									  <p> <span id="demo5"> </span> €
									  <input type="range" min="0.01" max="1000" step="0.01" value="1" value="1" class="slider" name ="myRange5" id="myRange5" /></p>
									  <center>Et</center>
									  <p> <input type="range" min="0.01" max="1000" step="0.01" value="1" value="50" class="slider" name ="myRange6" id="myRange6" />
									  <span id="demo6"> </span> €</p></center>
									</div>

									<script>
										var slider5 = document.getElementById("myRange5");
										var output5 = document.getElementById("demo5");
										output5.innerHTML = slider5.value;
										
										const el5 = document.querySelector("#myRange6");
										el5.addEventListener("input", function(){
																		if (Number(slider6.value)-Number(slider5.value)<0.01){
																	 		slider5.value=Number(slider6.value);
																	 		output5.innerHTML = slider5.value;}
																		});

										slider5.oninput = function() {
										  output5.innerHTML = this.value;
										}
										var slider6 = document.getElementById("myRange6");
										var output6 = document.getElementById("demo6");
										output6.innerHTML = slider6.value;

										const el6 = document.querySelector("#myRange5");
										el6.addEventListener("input", function(){
																		if (Number(slider6.value)-Number(slider5.value)<0.01){
																	 		slider6.value=Number(slider5.value);
																	 		output6.innerHTML = slider6.value;}
																		});
										slider6.oninput = function() {
										  output6.innerHTML = this.value;
										}										
									</script>									
							      </td>';
							echo '<td>
									<center><div class="slidecontainer">
									  <center>Entre</center>
									  <p> <span id="demo7"> </span> €
									  <input type="range" min="0.01" max="1000" step="0.01" value="1" class="slider" name ="myRange7" id="myRange7" /></p>
									  <center>Et</center>
									  <p> <input type="range" min="0.01" max="1000" step="0.01" value="50" class="slider" name ="myRange8" id="myRange8" />
									  <span id="demo8"> </span> €</p></center>
									</div>

									<script>
										var slider7 = document.getElementById("myRange7");
										var output7 = document.getElementById("demo7");
										output7.innerHTML = slider7.value;
										
										const el7 = document.querySelector("#myRange8");
										el7.addEventListener("input", function(){
																		if (Number(slider8.value)-Number(slider7.value)<0.01){
																	 		slider7.value=Number(slider8.value);
																	 		output7.innerHTML = slider7.value;}
																		});

										slider7.oninput = function() {
										  output7.innerHTML = this.value;
										}
										var slider8 = document.getElementById("myRange8");
										var output8 = document.getElementById("demo8");
										output8.innerHTML = slider8.value;

										const el8 = document.querySelector("#myRange7");
										el8.addEventListener("input", function(){
																		if (Number(slider8.value)-Number(slider7.value)<0.01){
																	 		slider8.value=Number(slider7.value);
																	 		output8.innerHTML = slider8.value;}
																		});
										slider8.oninput = function() {
										  output8.innerHTML = this.value;
										}										
									</script>
							      </td>';
						   	echo'</tr>';
						   	echo '</table>';
						   	echo '</form>';

							include_once("myparam.inc.php");
							$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
							if (mysqli_connect_errno()){
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
								}
				            
				            $operateurvisit = ">";
				            $id_visit = 0;
				            $classe = "";
				            $artiste = "";  
				            $prixachatdeb = 0;
				            $prixachatfin = 1000;
				            $prixventedeb = 0;
				            $prixventefin = 1000;
				            $date_ventedeb = "1970-01-01";
				            $date_ventefin = '"'.date('Y-m-d', time()).'"';
				            $TRI="";

				            if ((isset($_POST['tri_idacheteur']) && empty($_POST['table_idacheteur'])) || (isset($_POST['tri_classe']) && empty($_POST['table_classe'])) || (isset($_POST['tri_prixachat']) && (empty($_POST['myRange5']) || empty($_POST['myRange6'])  )) || (isset($_POST['tri_prixvente']) && (empty($_POST['myRange7']) || empty($_POST['myRange8'])  )) || (isset($_POST['tri_datevente']) && (empty($_POST['date_ventedeb']) || empty($_POST['date_ventefin'])  ))) {
					            	echo "<script>alert(\"Il manque un paramètre pour le tri\")</script>";
					        }

				            if ( !empty($_POST)) {
				            	if ( !empty($_POST['table_idacheteur']) && !empty($_POST['tri_idacheteur'])) {
					            	$operateurvisit = "=";
					            	$id_visit = $_POST['table_idacheteur']." ";
					            	$TRI = "Id acheteur: ".$_POST['table_idacheteur'];
					            }
				            	if ( !empty($_POST['table_classe']) && !empty($_POST['tri_classe'])) {
					            	$classe = " AND classe = '".$_POST['table_classe']."'";
					            	$TRI = $TRI.", Titre: ".$_POST['table_classe'];
					            }
					            if ( (!empty($_POST['myRange5']) && !empty($_POST['myRange6'])) && !empty($_POST['tri_prixachat'])) {
						            $prixachatdeb = $_POST['myRange5'];
						            $prixachatfin = $_POST['myRange6'];
						            $TRI = $TRI.", prix d'achat entre ".$prixachatdeb." € et ".$prixachatfin." €"; 
					            }
					            if ( (!empty($_POST['myRange7']) && !empty($_POST['myRange8'])) && !empty($_POST['tri_prixvente'])) {
						            $prixventedeb = $_POST['myRange7'];
						            $prixventefin = $_POST['myRange8'];
						            $TRI = $TRI.", prix de vente entre ".$prixventedeb." € et ".$prixventefin." €"; 
					            }					            
					            if ( !empty($_POST['date_ventedeb']) && !empty($_POST['date_ventefin'])) {
					            	$date_ventedeb = '"'.$_POST['date_ventedeb'].'"';
					            	$date_ventefin = '"'.$_POST['date_ventefin'].'"';
					            	$TRI = $TRI.", dates de ventes entre ".substr($date_ventedeb, 9, 2).'/'.substr($date_ventedeb, 6, 2).'/'.substr($date_ventedeb, 1, 4)." et ".substr($date_ventefin, 9, 2).'/'.substr($date_ventefin, 6, 2).'/'.substr($date_ventefin, 1, 4);
					            }  					            					             
				            } else {

					            $operateurvisit = ">";
					            $id_visit = 0;
					            $classe = "";
					            $artiste = "";  
					            $prixachatdeb = 0;
					            $prixachatfin = 1000;
					            $prixcentedeb = 0;
					            $prixcentefin = 1000;
					            $date_ventedeb = "1970-01-01";
					            $date_ventefin = '"'.date('Y-m-d', time()).'"';
					            $TRI="";

				            }

							$sql = 'SELECT COUNT(*) AS count FROM souvenirs WHERE id_visit'.$operateurvisit.$id_visit.$classe.' AND prix_achat BETWEEN '.$prixachatdeb.' AND '.$prixachatfin.' AND prix_vente BETWEEN '.$prixventedeb.' AND '.$prixventefin.' AND date_vente>='.$date_ventedeb.' AND date_vente<='.$date_ventefin;

							$result=mysqli_query ($base,$sql);
										
							if(!$result){
 								echo("Error description: " . mysqli_error($base));
							}else{ 
								$nbcol=mysqli_num_fields($result); $nbmod=mysqli_num_rows($result);
								while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
						   			echo '<p>Tri: '.$row['count'].' résultats; '.$TRI.'</p>';
								}					
							}
							mysqli_close($base);

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
				                        				                        
							$sql = 'SELECT * FROM souvenirs WHERE id_visit'.$operateurvisit.$id_visit.$classe.' AND prix_achat BETWEEN '.$prixachatdeb.' AND '.$prixachatfin.' AND prix_vente BETWEEN '.$prixventedeb.' AND '.$prixventefin.' AND date_vente>='.$date_ventedeb.' AND date_vente<='.$date_ventefin;
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
								echo '</table>';
	          	
					          	if (!empty($_POST['id_table']) && $_POST['id_table']!=" " && $_POST['id_table']!="requetes" ) {
					          		echo '<p><a href="create.php?table='.$_POST['id_table'].'" class="btn btn-success" title ="Cliquer pour créer un objet">Créer</a></p>';
					          	}								
							}
							mysqli_close($base);
     					}elseif($_POST['id_table']=="expositions"){
							echo '<form class="form-horizontal" action="index.php?inter='.$table.'" method="post">';
     						echo '<table class="table table-dark table-bordered" style="background-color: #5A5E6B;color: white;">';
     						echo '<tr>';
						   	echo '<td>Trier par:</td>';
						   	echo '<td>
						   			<div class="form-check">
									  <input class="form-check-input" type="checkbox" value="1" name="tri_theme"> Thème
									</div>
								  </td>';
						   	echo '<td>
						   			<div class="form-check">
									  <input class="form-check-input" type="checkbox" value="2" name="tri_dateexpo"> Date de l\'exposition
									</div> 
								  </td>';
							echo '<td>
						   			<div class="form-check">
									  <input class="form-check-input" type="checkbox" value="3" name="tri_coutexpo"> Cout de l\'exposition
									</div> 
								  </td>';
						   	echo'</tr>';
						   	echo '<tr>';
						   	echo '<td>';
						   		echo '<button type="submit" class="btn btn-success" title ="Cliquer pour le tri">Go</button>';
						   	echo '</td>';
						   	echo '<td>';
						   			include_once("myparam.inc.php");
									$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
									if (mysqli_connect_errno()){
										echo "Failed to connect to MySQL: " . mysqli_connect_error();
										}
						                        	                        
									$sql = 'SELECT DISTINCT theme FROM expositions ORDER BY theme';
									$result=mysqli_query ($base,$sql);
											
												
									if(!$result){
		 								echo("Error description: " . mysqli_error($base));
									}else{ 
										$nbcol=mysqli_num_fields($result); $nbmod=mysqli_num_rows($result);
										echo '<select class="form-select" name="table_theme" id="select8" >';
										echo '<option value="" selected> </option>';
										while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
											echo '<option value="'.$row['theme'].'">'.$row['theme'].'</option>';
										}
										echo '</select>';
									}
									mysqli_close($base);
							echo '</td>';
							echo '<td align="center">
									<p> <input type="date" value="date_expodeb" class="input date" name="date_expo" id="date_expo" /></p>
							     </td>';
							echo '<td>
									<center><div class="slidecontainer">
									  <center>Entre</center>
									  <p> <span id="demo9"> </span> €
									  <input type="range" min="1" max="100000" value="1" class="slider" name ="myRange9" id="myRange9" /></p>
									  <center>Et</center>
									  <p> <input type="range" min="1" max="100000" value="50" class="slider" name ="myRange10" id="myRange10" />
									  <span id="demo10"> </span> €</p></center>
									</div>

									<script>
										var slider9 = document.getElementById("myRange9");
										var output9 = document.getElementById("demo9");
										output9.innerHTML = slider9.value;
										
										const el9 = document.querySelector("#myRange10");
										el9.addEventListener("input", function(){
																		if (Number(slider10.value)-Number(slider9.value)<1){
																	 		slider9.value=Number(slider10.value);
																	 		output9.innerHTML = slider9.value;}
																		});

										slider9.oninput = function() {
										  output9.innerHTML = this.value;
										}
										var slider10 = document.getElementById("myRange10");
										var output10 = document.getElementById("demo10");
										output10.innerHTML = slider10.value;

										const el10 = document.querySelector("#myRange9");
										el10.addEventListener("input", function(){
																		if (Number(slider10.value)-Number(slider9.value)<1){
																	 		slider10.value=Number(slider9.value);
																	 		output10.innerHTML = slider10.value;}
																		});
										slider10.oninput = function() {
										  output10.innerHTML = this.value;
										}										
									</script>						   			
							     </td>';
						   	echo'</tr>';
						   	echo '</table>';
						   	echo '</form>';

							include_once("myparam.inc.php");
							$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
							if (mysqli_connect_errno()){
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
								}
				            
				            $theme = " ";  
				            $coutexpodeb = 0;
				            $coutexpofin = 100000;
				            $date_expo = "";
				            $TRI="";

				            if ((isset($_POST['tri_classe']) && empty($_POST['table_classe'])) || (isset($_POST['tri_coutexpo']) && (empty($_POST['myRange9']) && ($_POST['myRange10']) )) || (isset($_POST['tri_dateexpo']) && (empty($_POST['date_expo']) ))) {
					            	echo "<script>alert(\"Il manque un paramètre pour le tri\")</script>";
					        }

				            if ( !empty($_POST)) {
				            	if ( !empty($_POST['table_theme']) && !empty($_POST['tri_theme'])) {
					            	$theme = " theme = '".$_POST['table_theme']."' AND ";
					            	$TRI = "Thème: ".$_POST['table_theme'];
					            }
					            if ( (!empty($_POST['myRange9']) && !empty($_POST['myRange10'])) && !empty($_POST['tri_coutexpo'])) {
						            $coutexpodeb = $_POST['myRange9'];
						            $coutexpofin = $_POST['myRange10'];
						            $TRI = $TRI.", cout d'exposition entre ".$coutexpodeb." € et ".$coutexpofin." €"; 
					            }					            
					            if ( !empty($_POST['date_expo'])) {
					            	$date_expo = " AND date_expodebut <= \"".$_POST['date_expo']."\"";
					            	$date_expo = $date_expo." AND date_expofin >= \"".$_POST['date_expo']."\"";
					            	$TRI = $TRI.", date d'exposition: ".substr($_POST['date_expo'], 8, 2).'/'.substr($_POST['date_expo'], 5, 2).'/'.substr($_POST['date_expo'], 0, 4);
					            }  					            					             
				            } else {

					            $theme = " ";  
					            $coutexpodeb = 0;
					            $coutexpofin = 100000;
					            $date_expo ="";
					            $TRI="";

				            }

							$sql = 'SELECT COUNT(*) AS count FROM expositions WHERE'.$theme.'cout_expo BETWEEN '.$coutexpodeb.' AND '.$coutexpofin.$date_expo;

							$result=mysqli_query ($base,$sql);
										
							if(!$result){
 								echo("Error description: " . mysqli_error($base));
							}else{ 
								$nbcol=mysqli_num_fields($result); $nbmod=mysqli_num_rows($result);
								while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
						   			echo '<p>Tri: '.$row['count'].' résultats; '.$TRI.'</p>';
								}					
							}
							mysqli_close($base);

   							echo '<table class="table table-striped table-bordered">';
            				echo '<thead>';
           					echo '<tr>';
           					echo '<th>Identifiant Expo</th>';
           					echo '<th>Thème</th>';
           					echo '<th>Date expo</th>';
         					echo '<th>Côut expo (sans loc oeuvre)</th>';
               				echo '</tr>';
	              			echo '</thead>';
	              			echo '<tbody>';

							include_once("myparam.inc.php");
							$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
							if (mysqli_connect_errno()){
								echo "Failed to connect to MySQL: " . mysqli_connect_error();
							}
				                        				                        
							$sql = 'SELECT * FROM expositions WHERE'.$theme.'cout_expo BETWEEN '.$coutexpodeb.' AND '.$coutexpofin.$date_expo;

							$result=mysqli_query ($base,$sql);
									
								
							if(!$result){
 								echo("Error description: " . mysqli_error($base));
							}else{ 
								$nbcol=mysqli_num_fields($result); $nbmod=mysqli_num_rows($result);
								while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
					   				echo '<tr>';
						   			echo '<td>'. $row['id_expo'] . '</td>';
						   			echo '<td>'. $row['theme'] . '</td>';
						   			echo '<td>Du '. substr($row['date_expodebut'], 8, 2).'/'.substr($row['date_expodebut'], 5, 2).'/'.substr($row['date_expodebut'], 0, 4). ' au '. substr($row['date_expofin'], 8, 2).'/'.substr($row['date_expofin'], 5, 2).'/'.substr($row['date_expofin'], 0, 4). '</td>';
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
								echo '</table>';
	          	
					          	if (!empty($_POST['id_table']) && $_POST['id_table']!=" " && $_POST['id_table']!="requetes" ) {
					          		echo '<p><a href="create.php?table='.$_POST['id_table'].'" class="btn btn-success" title ="Cliquer pour créer une exposition">Créer</a></p>';
					          	}
							}
							mysqli_close($base);
     					}
     				}		
				?>
				     </tbody>
	          	
	          	
    		</div>
    </div> <!-- /container -->
  </body>
</html>
