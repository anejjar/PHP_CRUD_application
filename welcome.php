<?php
session_start();
    if(!isset($_SESSION['reg'])){
        header("Location:login.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Merci!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div id="container">
		<a href="login.php" class="link"><span>&larr;</span> <label>Login</label></a><br>
		<h3 style="text-align: center;">Merci!</h3>
		<p style="text-align: center;"> Pour Voter Inscription</p>
	<div>
</body>
</html>