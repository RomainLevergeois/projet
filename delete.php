<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
	<?php 
		include_once("myparam.inc.php");
		$id = null;
		$table = null;
		
		if ( !empty($_GET['id'])) {
			$id = $_REQUEST['id'];
			$table = $_REQUEST['table'];		
		}

		if ( null==$table ) {
			header("Location: index.php");
		}elseif ($table == "visiteurs") {	
		
			if ( !empty($_POST)) {
				// keep track post values
				$id2 = $_POST['id2'];
				
				// delete data
			    $base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
			    $sql = "DELETE FROM visiteurs  WHERE id_visit = $id";
				$result=mysqli_query ($base,$sql);
			  if(!$result){
		 			echo("Error description: " . mysqli_error($base));
			  }
			    mysqli_close($base);
				header("Location: index.php?inter=$table");
			}
	   		echo '<div class="container">';
	    
	    		echo '<div class="span10 offset1">';
	    			echo '<div class="row">';
			    		echo '<h3>Supprimer un visiteur</h3>';
			    	echo '</div>';				
				
		}elseif ($table == "oeuvres") {	
		
			if ( !empty($_POST)) {
				// keep track post values
				$id2 = $_POST['id2'];
				
				// delete data
			    $base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
			    $sql = "DELETE FROM oeuvres  WHERE id_oeuvre = $id";
				$result=mysqli_query ($base,$sql);
			  if(!$result){
		 			echo("Error description: " . mysqli_error($base));
			  }
			    mysqli_close($base);
				header("Location: index.php?inter=$table");
			}
	   		echo '<div class="container">';
	    
	    		echo '<div class="span10 offset1">';
	    			echo '<div class="row">';
			    		echo '<h3>Supprimer une oeuvre</h3>';
			    	echo '</div>';				
							
		} elseif ($table == "souvenirs") {	
		
			if ( !empty($_POST)) {
				// keep track post values
				$id2 = $_POST['id2'];
				
				// delete data
			    $base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
			    $sql = "DELETE FROM souvenirs  WHERE id_objet = $id";
				$result=mysqli_query ($base,$sql);
			  if(!$result){
		 			echo("Error description: " . mysqli_error($base));
			  }
			    mysqli_close($base);
				header("Location: index.php?inter=$table");
			}
	   		echo '<div class="container">';
	    
	    		echo '<div class="span10 offset1">';
	    			echo '<div class="row">';
			    		echo '<h3>Supprimer un souvenirs</h3>';
			    	echo '</div>';				
		
		} elseif ($table == "expositions") {	
		
			if ( !empty($_POST)) {
				// keep track post values
				$id2 = $_POST['id2'];
				
				// delete data
			    $base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 					   
			    $sql = "DELETE FROM expositions  WHERE id_expo = $id";
				$result=mysqli_query ($base,$sql);
			  if(!$result){
		 			echo("Error description: " . mysqli_error($base));
			  }
			    mysqli_close($base);
				header("Location: index.php?inter=$table");
			}			
		
	   		echo '<div class="container">';
	    
	    		echo '<div class="span10 offset1">';
	    			echo '<div class="row">';
			    		echo '<h3>Supprimer une exposition</h3>';
			    	echo '</div>';
		}
	?>    		
	    		<form class="form-horizontal" action="delete.php?table=<?php echo $table; ?>&id=<?php echo $id; ?>" method="post">
	    		    <input type="hidden" name="id2" value="<?php echo $id2;?>"/>
				    <p class="alert alert-error">Êtes-vous sûr de vouloir supprimer le <?php echo rtrim($table, 's') ?> n°<?php echo $id ?> ?</p>
					<div class="form-actions">
					    <button type="submit" class="btn btn-danger">Oui</button>
					    <a class="btn" href="index.php?inter=<?php echo $table; ?>">Non</a>
					</div>
				</form>
			</div>		
    	</div> <!-- /container -->
  </body>
</html>
