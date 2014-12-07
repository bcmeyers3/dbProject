<!DOCTYPE html>
<head>
	<title> Register </title>
	<link rel="stylesheet" type="text/css" href="camping_style1.css">
	<script src="script.js"></script>
	<script src="validateForm.js"></script>
</head>

<body onload="startTime()">
	<div id="heading">
		<h1> Register </h1>
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
	<div class="transbox">
		<?php
		session_start();
			if ($_SERVER['REQUEST_METHOD']=='POST') {
				$name = $_POST["member_name"];
				$username = $_POST["username"];
				$password = $_POST["passwordInput"];
				$err = array();
				
				if (empty($username))
					$err[] = "Username is required";
			
				$c=mysqli_connect("mysql.eecs.ku.edu", "bmeyers", "bmeyers", "bmeyers"); 
					
				// Check connection 
				if (mysqli_connect_errno($c)) { 
					echo "Failed to connect to MySQL: " . mysqli_connect_error(); 
				} else 
					echo "Connected.";
				$query = mysqli_query($c,"SELECT Username FROM Members WHERE Username = '$username'");
					
					if(mysqli_num_rows($query) == 0){
					 header('Location: http://people.eecs.ku.edu/~abenway/camping_home.html');
					 $x = mysqli_query($c,"INSERT INTO Members (Username, Name, Password) VALUES ('$username', '$name', '$password')"); 
					}
					else{
					echo "<div align='center'>Choose a different username.</div>";}
			
				mysqli_close($c);
			} else {
				$form['username'] = $form['passwordInput'] = '';
			}
		?> 
	<form name="signupForm" onSubmit="return validateForm()" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post"  class="bootstrap-frm">
		<h1>Register
			<span>If you are already registered, please use the link below to Login.</span>
		</h1>
		<label>
			<span>Name: </span>
			<input id="member_name" type="text" name="member_name"/>
		</label>
		<label>
			<span>Username: </span>
			<input id="username" type="text" name="username"/>
		</label>
		<label>
			<span>Password: </span>
			<input id="passwordInput" type="password" name="passwordInput"/>
		</label>
		<label id="passwordErrorLabel">
			<span>Retype Password: </span>
			<input id="retypepassword" type="password" name="retypepassword"/>
		</label>
		<label>
			<span>&nbsp;</span>
			<input type="submit" class="register" value="Register"/>
		</label>
		<a href="camping_login.php">Login</a>
	</form>
	</div>
	</div>
	</div>
</body>

