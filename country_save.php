<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
     
   <title>Edit City</title>
   
</head>
<body>
<?php
	require("security.php");
	include("navigation.php");
	include("connection_info.php");
	
	//recoger datos POST
	$codigo_pais=$_POST["codigo_pais"];
	$nombre_pais = $_POST["nombre_pais"];
	$nombre_continente = $_POST["nombre_continente"];
	$poblacion = $_POST["poblacion_pais"];
	
	$conexion = new mysqli($dbhost,$dbuser,$dbpass,$db);
	
	if($conexion->connect_error){
		echo "Connection Error (conexion->connect_errno)$conexion->connect_error\n";
		exit;
	}
	
	$query=$conexion->query("UPDATE Country SET Code='$codigo_pais',Name='$nombre_pais',
							Continent='$nombre_continente',Population=$poblacion WHERE Code='$codigo_pais'");
	
	

	if(!$query){
		echo "Query Error: $conexion->error";
		exit;
	}
	else{
		echo "<h1>Modificacion OK</h1>";
		echo "<a href = 'http://localhost/project/country.php?code=$codigo_pais'> Volver </a>";
	}

	$conexion->close();
	?>

</body>
</html>
