<?php
	$host="localhost";
	$username="root";
	$password="";
	$connection= mysqli_connect($host,$username,$password,"fatiha");
	if($connection){
	
	}else{
		die("can't connect");
	}
	$imageFileType=$image_path=$matric=$nom=$password=$email=$date=$password=$password_confirm=$x="";
		
	function test_input($data){
		$data= trim($data);
		$data =stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}

?>
