<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
<link rel="stylesheet" href="stylesheets/style.css">
<link rel="stylesheet" href="stylesheets/dashstyle.css">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<link rel="icon" href="images/pin.png">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">


<body class="dash-body">
    <header role="banner" class="sticky-top">
        <nav class="navbar nav nav-link">
            <div class="row">
                <a class="btn col-lg-2" href="create_paste.php">Create new Paste</a>
                <a class="btn btn-outline-danger  col-sm-1  float-right" href="logout.php">Logout</a><br/>
            </div>
        </nav>
    </header>
<?php
session_start();
include "config/config.php";
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $sql = "SELECT * FROM pastes WHERE username='$username' ORDER BY timestamp DESC";
    $re = mysqli_query($con, $sql);
    $num = mysqli_num_rows($re);
    if ($num > 0) {

        echo  " <div class='container'>
                <div class='text-white p-lg-4' style='margin:5px'>
                    You have created " . $num . " pastes
                </div><br/>";

        echo  " <div class='paste-cards'>
                    <div class='container'> ";
                        while ($row = $re->fetch_array()) {
                                $ulink = $row['ulink'];
                                echo "<a href='viewpaste.php?pasteid=" .$ulink."'>";
                                echo"<div class='col-lg-4'>
                                        <div class='card'>
                                            <h3>"
                                    .          $row['title']
                                    .      "</h3> 
                                        </div>
                                    </div>
                                    </a>   ";
                        }
                        echo "  
                    </div>
                </div>
                </div>";
    } 
    else
        echo "<br/>You have not created any pastes yet.<br/><a href='create_paste.php'>Click here</a> to create one";

} 
else
    header("Location:index.php");

?>
</body>