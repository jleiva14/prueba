<?php 
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
?>