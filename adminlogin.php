<?php

    // include("/Facultate/Daw/php-hospital/include/connection.php");
    include("./include/connection.php");

    if (isset($_POST['login'])) {
       $username = $_POST['username'];
       $password = $_POST['password'];

       $error = array();

       if (empty($username)) {
        $error['admin'] = 'Enter Username';
       } else if(empty($password)){
        $error['admin'] = 'Enter Password';
       }

       if (count($error) == 0) {
        $query = "SELECT * FROM Admin WHERE Username='$username' AND Password='$password'";
        $result = mysqli_query($connect, $query);

        if (mysqli_num_rows($result) == 1) {
            echo "<script>alert('Successfull login')</script>";
            $_SESSION['admin'] = $username;
            header("Location:admin/index.php");
            exit();
        } else {
            echo "<script>alert('Invalid Username or Password')</script>";
        }
       }
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP-Hospital</title>
</head>
<body>
    <?php
        include("include/header.php");
    ?>

    <form method="post">
        <div>
            <?php
                if (isset($error['admin'])) {
                    $show = $error['admin'];
                    $show2 = "<h4 class='alert alert-danger'>$show</h4>";
                } else {
                    $show2 = "";
                }
                echo $show2;
            ?>
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <button type="submit" name="login" class="btn btn-success">Login</button>
    </form>
</body>
</html>