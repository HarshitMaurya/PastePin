<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
<link rel="stylesheet" href="stylesheets/style.css">
<link rel="icon" href="images/pin.png">

<?php
include "config/config.php";
include "filterinput.php";
session_start();
$ulink = filter_text($_GET['pasteid']);
$sql = "SELECT * from pastes WHERE ulink='$ulink'";
$re = mysqli_query($con, $sql);
if (mysqli_num_rows($re)) {
    $row = mysqli_fetch_assoc($re);
    echo "<div class='container'>
            <div class='col-lg-8'>
                <div class='card'>";
    if ($row['private'] == 1 && !$_SESSION['username']) {
        echo "Post has now been made private";
    }
    else {
        echo 'Pinned by: ' .$row['username']. '<br/><h2>' .$row['title'] . '</h2><br/>' . $row['content'] . '<br/>';
    }
    if ($_SESSION['username']==$row['username'])
    {	
    	echo "<form method='POST'>
    			<button type='submit' class='btn btn-danger' name='del'>Delete</button>";
    	if(isset($_POST['del'])){
    	    $sql = "DELETE FROM pastes WHERE ulink='$ulink'";
            $con->query($sql);
            header("Location: mypastes.php");
        }
    echo "  </div>
          </div> 
          </div> ";
}
}
else 
    echo "paste does not exist";
