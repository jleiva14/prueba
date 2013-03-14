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
	$id_ciudad=$_POST["id_ciudad"];
	$nombre_ciudad = $_POST["nombre_ciudad"];
	$nombre_distrito = $_POST["nombre_distrito"];
	$poblacion = $_POST["poblacion_ciudad"];
	$countryCode = $_POST["pais"];
	
	$conexion = new mysqli($dbhost,$dbuser,$dbpass,$db);
	
	if($conexion->connect_error){
		echo "Connection Error (conexion->connect_errno)$conexion->connect_error\n";
		exit;
	}
	
	$query=$conexion->query("UPDATE City SET CountryCode='$countryCode',Name='$nombre_ciudad',
							District='$nombre_distrito',Population=$poblacion WHERE ID=$id_ciudad");
	
	

	if(!$query){
		echo "Query Error: $conexion->error";
		exit;
	}
	else{
		echo "<h1>Modificacion OK</h1>";
	}

	$conexion->close();
	?>

</body>
</html>
