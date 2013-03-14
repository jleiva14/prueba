<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
     
   <title>Cities of the world</title>
   
</head>
<body>

<a href="http://dev.mysql.com/doc/" target="blank_"> MySQL Documentation </a><br><br>
<?php
	include("navigation.php");
	
	
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '123';
	$db = 'world';
	
	$linkID1 = new mysqli($dbhost,$dbuser,$dbpass,$db);
	
	if($linkID1->connect_error){
		echo "Connection Error ($linkID1->connect_errno)$linkID1->connect_error\n";
		exit;
	}
	
	$id_ciudad = $_GET["id"];
	
	$query_results = $linkID1->query("SELECT ID,CountryCode,Name,Population,District FROM City WHERE ID=$id_ciudad");
	
	if(!$query_results){
		echo "Query Error: $linkID1->error";
		exit;
	}
	
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
		echo "<p>Distrito: $distrito</p>";
		echo "<p>Wikipedia Link: <a target=_blank href=".$dirWiki.">",$row['Name'],"</a> </p>";
		echo "<br /><p><a href=city_edit.php?id=".$id_ciudad.">Edit</a> </p>";
		echo "<p><a href=city_delete.php?id=".$id_ciudad.">Delete</a> </p>";
	}
	
	$query_results->close();
	
	$linkID1->close();
?>

</body>
</html>
