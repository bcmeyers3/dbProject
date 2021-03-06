<!DOCTYPE html>
<head>
	<title> Login </title>
	<link rel="stylesheet" type="text/css" href="camping_style1.css">
	<script src="script.js"></script>
	<script src="validateLogin.js"></script>
</head>

<body onload="startTime()">
	<div id="heading">
		<h1> Login </h1>
		<div id="txt"></div>

	<div class="center">
		<ul>
			<li><input type="button" value="Home" id="button" onclick="window.location.href='camping_home.html'">
			</li>
			<li><input type="button" value="Login" id="button" onclick="window.location.href='camping_login.php'">
			</li>
			<li><input type="button" value="Register" id="button" onclick="window.location.href='camping_register.php'">
			</li>
			<li><input type="button" value="Groups" id="button" onclick="window.location.href='camping_group.html'">
			</li>
			<li><input type="button" value="Group Members" id="button" onclick="window.location.href='camping_members.html'">
			</li>
			<li><input type="button" value="Lottery" id="button" onclick="window.location.href='camping_lottery.html'">
			</li>
		</ul>
	</div>
	<div id="border1"></div>
	<div class="background">
	<div class="login">
	<?php
		Session_start();
			if ($_SERVER['REQUEST_METHOD']=='POST') {
				$username = $_POST["username"];
				$password = $_POST["passwordInput"];
				$err = array();
				
				if (empty($username))
					$err[] = "Username is required";
			
				$c=mysqli_connect("mysql.eecs.ku.edu", "bmeyers", "bmeyers", "bmeyers"); 
				
				if (mysqli_connect_errno($c)) { 
					echo "Failed to connect to MySQL: " . mysqli_connect_error();
				}
		
					$query = mysqli_query($c,"SELECT Username FROM Members WHERE Username = '$username'");
					$result = mysqli_query($query);
					
					if(mysqli_num_rows($query) == 0){
					 echo "<div align='center'>Not valid. Please SignUp.</div>";
					}
					else {
					$query = mysqli_query($c,"SELECT Password FROM Members WHERE Password = '$password' AND Username = '$username'");
					$result = mysqli_query($query);
					//mysqli_fetch_array($query) or die(mysql-error())
					//($c,"SELECT PASSWORD FROM UserData WHERE USERRNAME = '$username'");
						if(mysqli_num_rows($query) !== 0){
						echo header('Location: http://people.eecs.ku.edu/~abenway/camping_home.html');
						}
						else { 
						echo"<div align='center'>Invalid Password</div>";
							}		
					}
					mysqli_close($c);
					} else {
			}
	?>
	<form name="signupForm" onSubmit="return validateForm()" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post"  class="bootstrap-frm">
		<h1>Login
			<span>If you have not registered, please use the link below to Register.</span>
		</h1>
		<label id= "usernameError">
			<span>Username: </span>
			<input id="username" type="text" name="username"/>
		</label>
		<label>
			<span>Password: </span>
			<input id="passwordInput" type="password" name="passwordInput"/>
		</label>
		<label>
			<span>&nbsp;</span>
			<input type="submit" class="register" value="Login"/>
		</label>
		<a href="camping_register.php">Register</a>
	</form>
	</div>
	</div>
	</div>
</body>
