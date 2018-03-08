<?php
include "config/config.php";
include "filterinput.php";
$ulink = filter_text($_GET['pasteid']);
$sql = "SELECT * from pastes WHERE ulink='$ulink'";
$re = mysqli_query($con, $sql);
if(mysqli_num_rows($re)){
	$row = mysqli_fetch_assoc($re);
	echo $row['title'].'<br/>'.$row['content'].'<br/>';
}
else
	echo "paste does not exist";
?>