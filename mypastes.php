<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

<a href="create_paste.php">Create new Paste</a>
<?php
session_start();
include "config/config.php";
if(isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
	$sql = "SELECT * FROM pastes WHERE username='$username' ORDER BY timestamp DESC";
	$re = mysqli_query($con, $sql);
	$num = mysqli_num_rows($re);
	$rows = mysqli_fetch_array($re);
	if($num>0){
		echo "You have created ".$num." pastes";
		while($row = $re->fetch_array()){
  			echo "<h3>".$row['title']."</h3>" . " " . $row['content'];
  			echo "<br />";
  		}
	}
	else
		echo "<br/>You have not created any pastes yet.<br/><a href='create_paste.php'>Click here</a> to create one";
}
else
header("Location:index.php");
?>
<a href="logout.php">Logout</a><br/>