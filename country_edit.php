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
	
	$conexion = new mysqli($dbhost,$dbuser,$dbpass,$db);
	
	if($conexion->connect_error){
		echo "Connection Error (conexion->connect_errno)$conexion->connect_error\n";
		exit;
	}
	
	$code = $_GET["code"];
	
	$query = $conexion->query("SELECT Code,Name,Continent,Population,Capital FROM Country WHERE Code='$code'");
	
	

	if(!$query){
		echo "Query Error: $conexion->error";
		exit;
	}

	while ($row = $query->fetch_assoc()){
		$code = $row["Code"];
		$name = $row["Name"];
		$continent = $row["Continent"];
		$population = $row["Population"];
	}
	?>

	<form action="country_save.php" method="POST">
		Code: <input type="text" name="codigo_pais" value="<?php echo $code ?>" /><br />
		Name: <input type="text" name="nombre_pais" value="<?php echo $name ?>" /><br />
		Continent: <input type="text" name="nombre_continente" value="<?php echo $continent; ?>" /><br />
		Population: <input type="text" name="poblacion_pais" value="<?php echo $population; ?>" /><br />
		<input type="submit" value="Modificar" name="modificar" />
	</form>

	<?php
	$query->close();
	
	$conexion->close();
	?>

</body>
</html>
