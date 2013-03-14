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
	$id=$_GET["id"];
	
	$conexion = new mysqli($dbhost,$dbuser,$dbpass,$db);
	
	if($conexion->connect_error){
		echo "Connection Error (conexion->connect_errno)$conexion->connect_error\n";
		exit;
	}
	
	$query=$conexion->query("DELETE FROM City WHERE ID=$id");
	
	

	if(!$query){
		echo "Query Error: $conexion->error";
		exit;
	}
	else{
		echo "<h1>Ciudad eliminada correctamente</h1>";
		$id_ciudad=1;
		echo "<a href = 'http://localhost/project/cities.php?id=$id_ciudad'> Cities </a>";
	}

	$conexion->close();
	?>

</body>
</html>
