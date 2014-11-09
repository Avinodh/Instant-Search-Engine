<?php

	$database = "search"; 
	$username = "root"; 
	$password = "root"; 
	mysql_connect(localhost,$username,$password) or die("Error connecting to host"); 
	mysql_select_db($database); 

	if(isset($_POST['search'])){
		$keyword = $_POST['search']; 
		$keyword = preg_replace("#[^0-9a-z]#i", "", $keyword);
		$query = "SELECT * FROM users WHERE firstname LIKE '%$keyword%' OR lastname LIKE '%$keyword%'";
		$result = mysql_query($query) or die("Error in connection"); 
		$num_results = mysql_num_rows($result); 

		if($num_results == 0){
			$response = "Search returned no results."; 
		}

		else{
			while($row = mysql_fetch_array($result)){
				$firstname = $row['firstname'];
				$lastname = $row['lastname']; 

				$response .= '<div>'.$firstname.' '.$lastname.'</div>'; 
			}
		}
	}

	echo($response); 
?>
