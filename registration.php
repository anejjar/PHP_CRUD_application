<?php

    require("connection.php");
	session_start();
	$_SESSION['messages']="";
	$_SESSION['reg']="";
	if($_SERVER['REQUEST_METHOD']=='POST'){
		
		if($_POST['pass']== $_POST['password_con']){
			$matric=test_input($_POST['matric']);	
			$nom=test_input($_POST['username']);
			$email=test_input($_POST['email']);
			$password=md5(test_input($_POST['pass']));
			$image_path="images/".basename($_FILES["avatar"]["name"]);
			$imageFileType = strtolower(pathinfo($image_path,PATHINFO_EXTENSION));
			$date =  date("Y/m/d");
					$stmt ="INSERT INTO `utilisateurs`( `nom`, `passaword`, `email`, `dates`, `Matricule`, `image`) VALUES ('".$nom."','".$password."','".$email."','".$date."','".$matric."','".$image_path."')";
					
					echo "$stmt";
					// Allow certain file formats
					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
					&& $imageFileType != "gif" ) {
						$_SESSION['messages']="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					}
					if(preg_match("!image!",$_FILES['avatar']['type'])){
						//copy selected image to images folder
						if(copy($_FILES['avatar']['tmp_name'],$image_path)){
							// check  if Matricle  exists
							if(mysqli_query($connection,"select * from utilisateurs where Matricule = '".$matric."' and image ='".$email."';")){
								$_SESSION['messages']="Matricule ou Email deja existe";
								//echo 'mysqli_query($connection,"select * from utilisateurs where Marticule = '".$matric."' and email ='".$email."';")';
							}else{
								if(mysqli_query($connection,$stmt)){
									$_SESSION['reg']="registration done";
									header("location:welcome.php");die();
								}else{
									$_SESSION['messages']="couldn't insert data";
								}
							}
							//$_SESSION['messages']="The file ". basename( $_FILES["avatar"]["name"]). " has been uploaded.";
						}else{
							$_SESSION['messages']="Could not copy the image";
						}
					}	
		}else{
			$_SESSION['messages']="Password not match";
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
		<meta content="text/html" charset="UTF-8" />
		<title>Registration</title>
		<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id="container">
					<p class="errors" style="background-color:red;color:#fff;">
					<?php echo $_SESSION['messages'];
					?>
				</p>
				<h3 style="text-align: center;">Registration!</h3>
			<form method="POST"  action="registration.php" enctype="multipart/form-data">
				Nom	 : <input type="text" name="username" maxlength="100" max="100" value="<?php echo "$nom" ?>" required><br>
				Matricule	 : <input type="text" name="matric" maxlength="100" max="25" value="<?php echo "$matric" ?>" required><br>
				Email		 : <input type="email" name="email" maxlength="100" max="100" value="<?php echo "$email" ?>" required><br>
				Image : 		<input type="file"  name="avatar" accept="image/*" value="<?php echo "$image_path" ?>"required><br>
				Mot de pass 	 : <input type="password" name="pass" maxlength="100" max="100" required ><br>
				Confirmer Pass  : <input type="password"  name="password_con" maxlength="100" max="100" required ><br>
				<input class="sub_btn" type="submit" name="btn_submite" value="Submit"><a href="login.php" class="link" style:"text-decoration: none;padding: 3px;" class="sub_btn">Login </a>
			</form>
	</div>
</body>
</html>