<?php
	session_start();
	
	if(isset($_POST["access_requested"])&& $_POST["access_requested"]=="Yes"){
		include("connection_info.php");
	
		$linkID1 = new mysqli($dbhost,$dbuser,$dbpass,$db);
		
		if($linkID1->connect_error){
			echo "Connection Error ($linkID1->connect_errno)$linkID1->connect_error\n";
			exit;
		}
		$consulta="SELECT customerEmail FROM customers WHERE passwd=sha('".$_POST['pword']."')";
		
		$query_results = $linkID1->query($consulta);
		
		$row = $query_results->fetch_assoc();
			$user = $row['customerEmail'];
		
		if(!$query_results){
			echo "Query Error: $linkID1->error";
			exit;
		}
	
		if($_POST["uname"]==$user && !empty($row)){
			$_SESSION["Approved"]="Yes";
		}
		else{
			echo "<p> Incorrect Username and/or Password,please try again</p>";
			$_SESSION["Approved"]="No";
		}
	}
	
	if(isset($_SESSION["Approved"]) && $_SESSION["Approved"]=="Yes"){
		echo "<!-- Comentario no visible -->";
	}
	else{
		$req_URL = $_SERVER["REQUEST_URI"];
	
print <<<GROUP1
<form action='$req_URL' method="POST">
<p>Username: <input type="text" name="uname"></p>
<p>Password: <input type="password" name="pword"></p>
<input type="hidden" name="access_requested" value="Yes">
<p><input type="submit" value="Login"></p>
</form>
GROUP1;
	exit;
	}
?>