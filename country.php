<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
     
   <title>Country</title>
   
</head>
<body>

<?php
	include("navigation.php");
	$linkID1 = new mysqli("localhost","root","123","world");
	
	if($linkID1->connect_error){
		echo "Connection Error ($linkID1->connect_errno)$linkID1->connect_error\n";
		exit;
	}
	
	$code = $_GET["code"];
	
	$query_results = $linkID1->query("SELECT Code,Name,Continent,Population FROM Country 
									WHERE code='$code'");
									
	if(!$query_results){
		echo "Query Error: $linkID1->error";
		exit;
	}
	
	while ($row = $query_results->fetch_assoc()){
		$nombre = $row['Name'];
		$nombrewiki = str_replace(" ","_",$row['Name']);
		$CountryCode = $row['Code'];
		$poblacion = $row['Population'];
		$continente = $row['Continent'];
		$dirWiki = "http://en.wikipedia.org/wiki/".$nombrewiki;
		$dir = "#";	
			
		echo "<h1>$nombre</h1>";
		echo "<p>Country Code:<a name='$CountryCode' href=".$dir.">",$row['Code'],"</a></p>";
		echo "<p>Population:$poblacion</p>";
		echo "<p>Continente</p>";
		echo "<p>Wikipedia Link: <a target=_blank href=".$dirWiki.">",$row['Name'],"</a> </p>";
	}
	
	$query_results->close();
	
	$linkID1->close();
?>

</body>
</html>
