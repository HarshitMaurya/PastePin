<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
<link rel="stylesheet" href="stylesheets/style.css">
<link rel="icon" href="images/pin.png">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>

<?php
session_start();
$redundant='';
include "config/config.php";
if (isset($_POST['username'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    $name = $_POST['name'];

    $sql = "INSERT INTO user VALUES (NULL, '$name', '$username', '$email', '$password')";

    $re = mysqli_query($con, $sql);

    if ($re) {
        $_SESSION['username']=$username;
        header("Location: mypastes.php");
    } else {
        echo "An error occured<br/>";
        if (mysqli_errno($con) == 1062) {
            $redundant = "username already exists";
        }

    }
}
?>
<body class="opening-body">
    <form method="POST">
        <div class="container col-4 bg-faded register-container card card-outline-secondary">
            <p class="text-lg-center"> Register </p>
            <div class="form-group">
                <label for="yourname"> Name </label>
                <input class="form-control" type="text" name="name" id="yourname" placeholder="Your Name" required autofocus><br/>
            </div>
            <div class="form-group">
                <label for="uname"> Username </label>
                <div class="float-right alert-warning"><?php echo $redundant; ?> </div>
                <input class="form-control" type="text" name="username" id="uname" placeholder="Username" required><br/>
            </div>
            <div class="form-group">
                <label for="inputEmail"> Email address </label>
                <input class="form-control" type="email" name="email" id="inputEmail" placeholder="Email address" required><br/>
            </div>
            <div class="form-group">
                <label for="inputPass"> Password </label>
                <input class="form-control" type="password" name="password" id="inputPass" placeholder="Password" required><br/>
            </div>
            <button class ="btn btn-outline-danger btn-lg" type="submit"> Register</button>
            <br/>
            <a class ="alert-link btn-group-lg" href="login.php"> I already have an  account </a>
        </div>
    </form>
</body>