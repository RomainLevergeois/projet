<?php

	include_once("myparam.inc.php");
	$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME); 
	$i = 1;

	while ( $i <= 150) {
	 	$i = $i+1;

	 	$age =  random_int(5, 100);
	 	$a = random_int(1, 3);
	 	if ($age < 18) {
	 		$etu = "non";
	 		$tarif = 0;
	 	} elseif ($age < 30) {	
	 		$j = random_int(0, 1);
	 		if ($j==0) {
	 			$etu = "oui";
	 			$tarif = 19;
	 		} else {
	 			$etu = "non";
	 			$tarif = 24;
	 		}
	 	} else {
	 		$etu = "non";
	 		$tarif = 24;
	 	}
	 	if ($a = 1) {
	 		$date= "2021-11-29";
	 	}elseif ($a = 2) {
	 		$date= "2021-11-30";
	 	}elseif ($a = 3) {
	 		$date= "2021-12-01";
	 	}

		$sql = 	"INSERT INTO `visiteurs` (`id_expo`, `age`, `etu`, `tarif`, `dates`) VALUES 
				('5', '$age', '$etu', '$tarif', '$date');";

		$result=mysqli_query ($base,$sql);
		if(!$result){
			echo("Error description: " . mysqli_error($base));
		}
	}

	mysqli_close($base);
	header("Location: index.php?inter=visiteurs");
 

?>