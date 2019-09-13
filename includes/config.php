<?php

	$username='root';
	$password='';
	$host='localhost';
	$db_name='calculator';
	
	//Kreiramo konekciju na bazu
	$connection=mysqli_connect($host, $username, $password, $db_name); 
	
	//Provjeravamo da li je konekcija moguca
	if(!$connection){
		die("ERROR: Could not connect to database!");
	}
	
	/* Provjeravamo da li šaljemo ikakve podatke post metodom, ako šaljemo izvršava se sql upit,
	 * a ako nema podataka završava se izvršenje i preusmjerava ponovo na link u header-u
	 */
	if (isset($_POST['factor1']) && isset($_POST['factor2'])&& isset($_POST['result']))
	{   
		$factor1 = mysqli_real_escape_string ($connection, $_POST['factor1']);
		$factor2 = mysqli_real_escape_string ($connection, $_POST['factor2']);
		$result = mysqli_real_escape_string ($connection, $_POST['result']);
		$date = date('Y-m-d h:i:s');
		
		$sql_query = "INSERT INTO multiplication (factor1, factor2, result, operation_date) VALUES	
			    ('$factor1', '$factor2', '$result', '$date')";
		
		if(mysqli_query($connection, $sql_query)){
			echo "Records added successfully.";
		} else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
		}
	}else{
		die("Post is not set!");
		header("Location: http://localhost/test-infomedia/index.php");

	}
	
	// Zatvaramo konekciju
	mysqli_close($connection);

?>