<?php

	include_once("myparam.inc.php");
	$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 
	$i = 1;

	while ( $i <= 150) {
	 	$i = $i+1;

	 	$age =  random_int(5, 100);
	 	if ($age < 18) {
	 		$etu = "non";
	 		$tarif = 0;
	 	} elseif ($age < 30) {	
	 		$j = random_int(0, 1);
	 		if ($j==0) {
	 			$etu = "oui";
	 			$tarif = 9;
	 		} else {
	 			$etu = "non";
	 			$tarif = 14;
	 		}
	 	} else {
	 		$etu = "non";
	 		$tarif = 14;
	 	}

		$sql = 	"INSERT INTO `visiteurs` (`id_expo`, `age`, `etu`, `tarif`, `dates`) VALUES 
				('1', '$age', '$etu', '$tarif', '2018-02-12');";

		$result=mysqli_query ($base,$sql);
		if(!$result){
			echo("Error description: " . mysqli_error($base));
		}
	}

	mysqli_close($base);
	header("Location: index.php?inter=visiteurs");
 

?>