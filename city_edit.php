<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
     
   <title>Edit City</title>
   
</head>
<body>
<?php
	include("navigation.php");
	require("connection_edit_city.php");

	while ($row = $query_ciudad->fetch_assoc()){
		$nombre = $row["Name"];
		$countryCode = $row["CountryCode"];
		$distrito = $row["District"];
		$poblacion = $row["Population"];
		$id = $row["ID"];
	}
	?>

	<form action="city_save.php" method="POST">
		Country: <select name="pais" size=1>
					<?php
						while ($row = $query_pais->fetch_assoc()){
							$code = $row["Code"];
							$nombrePais = $row["Name"];
							
							if($code == $countryCode){
								echo "<option value=$code selected>$nombrePais</option>";
							}
							else{
								echo "<option value=$code>$nombrePais</option>";
							}
						}
					?>	
				 </select><br />
		City Name: <input type="text" name="nombre_ciudad" value="<?php echo $nombre ?>" /><br />
		City District: <input type="text" name="nombre_distrito" value="<?php echo $distrito; ?>" /><br />
		City Population: <input type="text" name="poblacion_ciudad" value="<?php echo $poblacion; ?>" /><br />
		<input type="hidden" name="id_ciudad" value = "<?php echo $id ?>" />
		<input type="submit" value="Modificar" name="modificar" />
	</form>

	<?php
	$query_ciudad->close();
	$query_pais->close();

	$conexion->close();
	?>

</body>
</html>
