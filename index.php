<?php

session_start();

if(isset($_SESSION['username']))
	header("Location: mypastes.php");
?>
<body class="homepage">
<br/>
<a href="register.php">Register</a><br/>
<a href="login.php">Login</a><br/>
</body>

