<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
     
   <title>MySQL and PHP</title>
   
</head>
<body>
<h1>Cities of the world</h1>
<?php
	include("navigation.php");
	require("connection_cities.php");
	while ($row = $query_results->fetch_assoc()){
		$dir = "city.php?id=".$row['ID'];
		echo $row["ID"]," - ","<a href=".$dir.">",$row['Name'],"</a><br/>";
	}
	
	$query_results->close();
	
	$linkID1->close();
?>

</body>
</html>
