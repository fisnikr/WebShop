
	<?php
	$host="localhost";
	$user="root";
	$password="";

	$dbname="gameshop";

	$conn=mysqli_connect($host,$user,$password,$dbname);
	if(!$conn){
				die("error:Can not connect with mysql database");
				//break;
	}

	?>
