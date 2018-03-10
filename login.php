<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
<link rel="stylesheet" href="stylesheets/style.css">
<link rel="icon" href="images/pin.png">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>


<?php

include "config/config.php";
session_start();

$usrerr = $pwderr = '';
if (isset($_SESSION['username'])) {
    header("Location: mypastes.php");
}

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = sha1($_POST['password']);

    $sql = "SELECT * FROM user
			WHERE username='$username'";

    $re = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($re);

    if (mysqli_num_rows($re)) {
        if ($row['password'] == $password) {
            $_SESSION['username'] = $username;
            header("Location: mypastes.php");
        } else {
            $pwderr = "Incorrect Password";
        }

    } else 
        $usrerr = "User not found";

}
?>

<body class="opening-body">
    <form method="POST">
        <div class="container col-4 bg-faded login-container card card-outline-secondary">
            <h3 class="text-lg-center"> Login </h3>
            <br/>
            <div class="container">
                <div class="form-group">
                    <label for="username" id="ulabel">Username</label>
                    <div class="float-right alert-warning"><?php echo $usrerr; ?> </div>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" required autofocus>
                </div>
                <div class="form-group">
                    <label for="password" id="plabel">Password</label>
                    <div class="float-right alert-warning"><?php echo $pwderr; ?> </div>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                </div>
            </div>
            <div class="container btn">
                <button class="btn btn-outline-primary btn-lg align-middle login-button" type="submit">Login</button>
            </div>
            <div class="container">
                <br/>
                <label class="font-weight-bold" for="regbutton">Don't have an account yet?</label>
                <a class="btn btn-info btn-lg col-lg-12 register-button" href="index.php" id="regbutton"> Register </a>
            </div>
        </div>
    </form>
</body>