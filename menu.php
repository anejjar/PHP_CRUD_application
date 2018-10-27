
    <header>
        <nav>
			<div class="topnav">
				 <a class="active" href="#home">Home</a>
				 <a href="#news">News</a>
				 <a href="#contact">Contact</a>
				<div class="topnav-right">
				<?php 
					if(!isset($_SESSION['logUser'])){
				
						echo '<div class="nav-login">
						<form action="login.php" method="post" autocomplete="off">
                            <input type="text" name="loguser" max="20" placeholder="Nom" required>
                            <input type="password" name="passlog" placeholder="Matricule"  required>
                            <button name="submit"type="submit">Login</button>
						</form>
						<a href="registration.php">Sign Up</a>
						</div>';
				
					}else{
						echo '<form action="logout.php" method="post" >
                            <button name="Submit"type="submit">Logout</button>
						</form>';
					}
					?>
				</div>
			</div>
        </nav>
    </header>
