<?php
include "config/config.php";
if(isset($_POST['username'])) {
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$name = $_POST['name'];

	$sql = "INSERT INTO user VALUES (NULL, '$name', '$username', '$email', '$password')";

	$re = mysqli_query($con, $sql);

	if($re){
		echo "Successfully registered";
		header("Location: mypastes.php");
	}
	else{
		echo  "An error occured<br/>";
		if(mysqli_errno($con)==1062)
			echo "username not unique";
	}
}
?>

<body>
<form method="POST">
	<p>Register</p>
	<input type="text" name="name" placeholder="Name" required autofocus><br/>
	<input type="text" name="username" placeholder="Username" required><br/>
	<label for="inputEmail"> Email address </label>
	<input type="email" name="email" id="inputEmail" placeholder="Email address" required><br/>
	<label for="inputPass"> Password </label>
	<input type="password" name="password" id="inputPass" placeholder="Password" required><br/>
	<button type="submit"> Register </button><br/>
	<a href="login.php"> Login </a>
</form>
</body>