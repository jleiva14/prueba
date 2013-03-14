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
	
	$query_results = $linkID1->query("SELECT ID,Name FROM City");
	
	if(!$query_results){
		echo "Query Error: $linkID1->error";
		exit;
	}
?>