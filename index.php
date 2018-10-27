<?php
   session_start();
    include_once "connection.php";
   $log_stmt="select * from `utilisateurs`";
   $result=mysqli_query($connection,$log_stmt) or die("Probleme with sql statement");
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
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <?php   include_once 'menu.php';?>
    <div id='container' style="width:auto;margin:0 auto;">
		<a href="login.php" class="link"><span>&larr;</span> <label>LogOut</label></a><br>
		<table class="table" width="600" border="1" cellpadding="1" cellspacing="1" style="
    text-align: center;
    margin-left:  auto;
    margin-right:  auto;
    margin-top: 30px;
">
            <tr>
				<th>Nom</th>
                <th>Matricule</th>
                <th>Password</th>
                <th>Email</th>
                <th>Date</th>
				<th>Image</th>
            </tr>
            <?php
                while($row =mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>".$row['nom']."</td>";
					echo "<td>".$row['Matricule']."</td>";
                    echo "<td>".$row['passaword']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['dates']."</td>";
					echo "<td>".$row['image']."</td>";
                    echo "<td> <a style='text-decoration: none;padding: 13px; text-align: center;background-color: rebeccapurple;color: white;text-transform: uppercase;' href='edit.php?edit=$row[id]'>edit<br /></td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>