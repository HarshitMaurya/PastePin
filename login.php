<?php

include "config/config.php";
session_start();

if (isset($_SESSION['username']))
	header("Location: mypastes.php");
if (isset($_POST['username'])){
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM user
			WHERE username='$username'";

	$re = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($re);

	if(mysqli_num_rows($re)){
		if($row['password']==$password){
			$_SESSION['username'] = $username;
			header("Location: mypastes.php");
		}
		else
			echo "password incorrect";
	}
	else
		echo "User not found";
}
?>




<form  method="POST">
	<p> Login </p>
	<input type="text" name="username" placeholder="Username" required>
	<label for="inputPassword">Password</label>
	<input type="password" name="password" id="inputPassword" placeholder="Password" required>
	<button type="submit">Login</button>
	<a href="register.php"> Register </a>
</form>