<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
     
   <title>Cities of the world</title>
   
</head>
<body>

<a name = "inicio"><h1>Cities of the World</h1></a>
<a href="http://dev.mysql.com/doc/" target="blank_"> MySQL Documentation </a><br><br>
<?php
	require("connection_info.php");
	
	while ($row = $query_results->fetch_assoc()){
		$nombre = $row['Name'];
		$nombrewiki = str_replace(" ","_",$row['Name']);
		$CountryCode = $row['CountryCode'];
		$poblacion = $row['Population'];
		$distrito = $row['District'];
		//$dirWiki = "mysqli_GETwiki.php?code=".$row['Code']."&wiki=".$nombrewiki;
		$dirWiki = "http://en.wikipedia.org/wiki/".$nombrewiki;
		$dir = "#";

		echo "<h1>$nombre</h1>";
		echo "<p>Country Code:<a name='$CountryCode' href=".$dir.">",$row['CountryCode'],"</a></p>";
		echo "<p>Population:$poblacion</p>";
		echo "<p>Distrito</p>";
		echo "<p>Wikipedia Link: <a target=_blank href=".$dirWiki.">",$row['Name'],"</a> </p>";
	}
	
	$query_results->close();
	
	$linkID1->close();
?>

<br><a href="#inicio">Go to the top of the page</a>

</body>
</html>
