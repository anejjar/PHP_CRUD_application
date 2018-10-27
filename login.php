<?php 
session_start();
include_once 'connection.php';
$em=$passw=$id=$sesiion='';
define($id,'');
if(isset($_POST['log_sub'])){
    $em=test_input($_POST['loguser']);
    $passw=md5(test_input($_POST['passlog']));
	
	$log_stmt="select * from `utilisateurs` where `email`='".$em."' and `passaword`='".$passw."'"; 
    $result=mysqli_query($connection,$log_stmt) or die("Probleme with sql statement");
	
	$count=mysqli_num_rows($result);
		if ($count==1) {
			$_SESSION['logUser'] = $em;	
			while($row =mysqli_fetch_assoc($result)){
				$id=$_SESSION['userid']=$row['id'];
				echo "{$_SESSION['userid']}";
			}
		}
}
?>
		<?php
		include_once 'menu.php';
			    if(!isset($_SESSION['logUser'])){
					//$id=$_SESSION['userid'];
					$sesiion=$_SESSION['logUser'];
					$stmt ="INSERT INTO `sission`( `date`, `id_session`, `id_user`) VALUES (now(),'".$sesiion."','".$id."')";
					//echo "$stmt ";
					$x = mysqli_query($connection,$stmt);
					if($x){
						//echo "done";
						$_SESSION['logout']=true;
						header('location:index.php');
					}else{
						echo "couldn't insert data";
					}
				}
			?>
