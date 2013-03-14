<?php 
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '123';
	$db = 'world';
	
	$conexion = new mysqli($dbhost,$dbuser,$dbpass,$db);
	
	if($conexion->connect_error){
		echo "Connection Error (conexion->connect_errno)$conexion->connect_error\n";
		exit;
	}
	
	$id_ciudad = $_GET["id"];
	
	$query_ciudad = $conexion->query("SELECT ID,CountryCode,Name,District,Population FROM City Where ID=$id_ciudad");
	$query_pais = $conexion->query("SELECT Code,Name FROM Country ORDER BY Name");
	
	

	if(!$query_ciudad){
		echo "Query Error: $conexion->error";
		exit;
	}

	if(!$query_pais){
		echo "Query Error: $conexion->error";
		exit;
	}
?>