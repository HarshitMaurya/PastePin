<head>
    <link rel="icon" href="images/pin.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
</head>


<?php
include "config/config.php";
include "randomAlphanumeric.php";
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:index.php");
}

if (isset($_POST['content'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $rand_string = randStr();
    $username = $_SESSION['username'];
    if (isset($_POST['private'])) {
        $private = 1;
    } else {
        $private = 0;
    }

    $sql = "INSERT INTO pastes VALUES (NULL, '$rand_string', '$title', '$content', '$username', '$private', NULL)";
    $re = mysqli_query($con, $sql);

    if ($re) {
        header("Location:mypastes.php");
    } else {
        echo "An error occured<br/>";
    }
}

?>

<body>
<div class="container form-group">
    <form method="POST" class="form-check-input">

        <label for="title">Title</label>
        <input type="text" name="title" id="title" placeholder="Title of your paste" required><br/>
        <label for="content">Content</label>
        <input type="" name="content" id="content" placeholder="Input paste here"><br/>
        <div>
            <header>Additional options</header>
            Make it private?
            <input type="checkbox" name='private' value="private">
        </div>
        <button type="submit">Submit</button>
    </form>
</div>
<a href="mypastes.php"> Discard </a>
</body>