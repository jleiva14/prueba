<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
     
   <title>Edit City</title>
   
</head>
<body>
<?php
	include("navigation.php");
	
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '123';
	$db = 'world';
	
	//recoger datos POST
	$code=$_GET["code"];
	
	$conexion = new mysqli($dbhost,$dbuser,$dbpass,$db);
	
	if($conexion->connect_error){
		echo "Connection Error (conexion->connect_errno)$conexion->connect_error\n";
		exit;
	}
	
	$query=$conexion->query("DELETE FROM Country WHERE Code='$code'");
	
	

	if(!$query){
		echo "Query Error: $conexion->error";
		exit;
	}
	else{
		echo "<h1>Ciudad eliminada correctamente</h1>";
		$code="ARG";
		echo "<a href = 'http://localhost/project/countries.php?id=$code'> Countries </a>";
	}

	$conexion->close();
	?>

</body>
</html>
