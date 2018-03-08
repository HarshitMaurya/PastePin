<?php
include "config/config.php";
include "randomAlphanumeric.php";
session_start();
if(!isset($_SESSION['username']))
		header("Location:index.php");

if(isset($_POST['username'])){
	$title = $_POST['title'];
	$content = $_POST['content'];
	$rand_string = randStr();
	$username = $_SESSION['username'];
	if(isset($_POST['private']))
		$private=1;
	else
		$private=0;
	
	$sql = "INSERT INTO pastes VALUES (NULL, '$rand_string', '$title', '$content', '$username', '$private', NULL)";
	$re = mysqli_query($con, $sql);

	if($re)
		echo "Paste created<br/>";
	else{
		echo  "An error occured<br/>";
	}
}




?>

<body>
<form method="POST">
	TITLE<input type="text" name="title" placeholder="Title of your paste" required><br/>
	Content<input type="text" name="content" placeholder="Input paste here"><br/>
	<div>
		<header>Additional options</header>
		Make it private?
		<input type="checkbox" name='private' value="private"></div>
	<button type="submit">Submit</button>
</form>
</body>