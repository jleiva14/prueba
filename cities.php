<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
     
   <title>MySQL and PHP</title>
   
</head>
<body>
<h1>Cities of the world</h1>
<?php
	require("security.php");
	include("navigation.php");
	include("connection_info.php");
	
	$linkID1 = new mysqli($dbhost,$dbuser,$dbpass,$db);
	
	if($linkID1->connect_error){
		echo "Connection Error ($linkID1->connect_errno)$linkID1->connect_error\n";
		exit;
	}
	
	$query_results = $linkID1->query("SELECT ID,Name FROM City");
	
	if(!$query_results){
		echo "Query Error: $linkID1->error";
		exit;
	}
	
	
	while ($row = $query_results->fetch_assoc()){
		$dir = "city.php?id=".$row['ID'];
		echo $row["ID"]," - ","<a href=".$dir.">",$row['Name'],"</a><br/>";
	}
	
	$query_results->close();
	
	$linkID1->close();
?>

</body>
</html>
