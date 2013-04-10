<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
 <head>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
     
   <title>Ejercicios mysqli</title>
   
</head>
<body>

<a name = "inicio"><h1>Countries of the World</h1></a>
<a href="http://dev.mysql.com/doc/" target="blank_"> MySQL Documentation </a><br><br>
<?php
	require("security.php");
	include("navigation.php");
	include("connection_info.php");
	
	$linkID1 = new mysqli($dbhost,$dbuser,$dbpass,$db);
	
	if($linkID1->connect_error){
		echo "Connection Error ($linkID1->connect_errno)$linkID1->connect_error\n";
		exit;
	}
	
	$query_results = $linkID1->query("SELECT Code,Name FROM Country");
	
	
	if(!$query_results){
		echo "Query Error: $linkID1->error";
		exit;
	}
	
	while ($row = $query_results->fetch_assoc()){
		$nombre = $row['Name'];
		$nombrewiki = str_replace(" ","_",$row['Name']);
		$code = $row['Code'];
		$dir = "country.php?code=".$row['Code'];

		echo $row["Name"]," | ","<a name='$code' href=".$dir.">",$row['Code'],"</a><br/>";
	}
	
	$query_results->close();
	
	$linkID1->close();
?>

<br><a href="#inicio">Go to the top of the page</a>

</body>
</html>
