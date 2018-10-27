 <?php
	include_once('connection.php');
	if( isset($_GET['edit']) )
	{
		$id = $_GET['edit'];
		$res= mysqli_query($connection,"SELECT * FROM utilisateurs WHERE id='$id'");
		$row= mysqli_fetch_array($res);
	}
	if( isset($_POST['newName'])||isset($_POST['newemail'])||isset($_POST['newpass'])||isset($_POST['newdates']))
	{
        $newName = $_POST['newName'];
        $newemail = $_POST['newemail'];
        $newpass = md5($_POST['newpass']);
        $newdates = $_POST['newdates'];
		$newMat = $_POST['Newmatric'];
		$newavatar = $_POST['Newavatar'];
		$id  	 = $_POST['id'];
		$sql     = "UPDATE `utilisateurs` SET `nom`='".$newName."',`passaword`='".$newpass."',`email`='".$newemail."',`dates`='".$newdates."','".$newMat."','".$newavatar."' WHERE id='$id'";
		$res 	 = mysqli_query($connection,$sql) or die("Could not update".mysql_error());
		echo "<meta http-equiv='refresh' content='0;url=index.php'>";
	}
	session_start();
    if(!isset($_SESSION['logUser'])){
        header("Location:login.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Modification</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
	<div id='container' >
		<h3 style="text-align: center;">Modification!</h3>
		<a href="index.php" class="link"><span>&larr;</span> <label>Back!</label></a><br>
		<form action="edit.php" method="POST">
				Nom	 : <input type="text" name="newName" maxlength="100" max="100" required><br>
				Matricule	 : <input type="text" name="Newmatric" maxlength="100" max="25" required><br>
				Email		 : <input type="email" name="newemail" maxlength="100" max="100" required><br>
				date		 : <input type="date" name="newdates"  required><br>
				Image : 		<input type="file"  name="Newavatar" accept="image/*" required><br>
				Mot de pass	 : <input type="password" name="newpass" maxlength="100" max="100" required ><br>
				
				<input type="hidden" name="id" value="<?php echo $row[0]; ?>"/>
				<input type="submit" value=" Update "/>
		</form>
	</div>
</body>
</html>