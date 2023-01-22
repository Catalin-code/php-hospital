<?php
    session_start();
    // session_destroy();
    include("./include/connection.php");

    if (isset($_POST['login'])) {
       $username = $_POST['username'];
       $password = $_POST['password'];

       $error = array();

       if (empty($username)) {
        $error['patient'] = 'Enter Username';
       } else if(empty($password)){
        $error['patient'] = 'Enter Password';
       }

       if (count($error) == 0) {
        $query = "SELECT * FROM patient WHERE Username='$username' AND Password='$password'";
        $result = mysqli_query($connect, $query);

        if (mysqli_num_rows($result) == 1) {
            echo "<script>alert('Successfull login')</script>";
            $_SESSION['patient'] = $username;
            header("Location:patient/index.php");
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
                if (isset($error['patient'])) {
                    $show = $error['patient'];
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
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <button type="submit" name="login" class="btn btn-success">Login</button>
        <p>Don't have an account? <a href="signup.php">Sign up now!</a></p>
    </form>
</body>
</html>