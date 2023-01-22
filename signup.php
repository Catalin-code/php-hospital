<?php
    include("./include/connection.php");

    if (isset($_POST['signup'])) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNumber'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];

        $error = array();

        if (empty($firstName)) {
            $error['d'] = "Enter first name";
        } elseif (empty($lastName)) {
            $error['d'] = "Enter last name";
        } elseif (empty($email)) {
            $error['d'] = "Enter email";
        } elseif (empty($phoneNumber)) {
            $error['d'] = "Enter phone number";
        } elseif (empty($username)) {
            $error['d'] = "Enter username";
        } elseif (empty($password)) {
            $error['d'] = "Enter password";
        } elseif (empty($confirmPassword)) {
            $error['d'] = "Confirm password";
        } elseif($password != $confirmPassword){
            $error['d'] = "Passwords don't match";
        }

        if (count($error) == 0) {
            $signupquerry = "INSERT INTO patient(Username, Password, FirstName, LastName, Email, PhoneNumber)
                        VALUES('$username', '$password', '$firstName', '$lastName', '$email', '$phoneNumber')";
            $result = mysqli_query($connect, $signupquerry);
            echo "<meta http-equiv='refresh' content='0'>";
        }
    }

    if (isset($error['p'])) {
        $er = $error['p'];
        $show = "<h5 class='text-center alert alert-danger'>$er</h5>";
    } else {
        $show = "";
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP-Hospital</title>
</head>
<body>

    <?php 
        include("./include/header.php");
    ?>

<form method="post">
        <div>
            <?php
                echo $show;
            ?>
        </div>

        <div class="form-group">
            <label for="firstName">First Name</label>
            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Enter first name">
        </div>
        <div class="form-group">
            <label for="lastName">Last Name</label>
            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Enter last name">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Eneter e-mail">
        </div>
        <div class="form-group">
            <label for="phoneNumber">Phone number</label>
            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Enter phone number">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
        </div>
        <div class="form-group">
            <label for="confirmPassword">Confirm password</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm password">
        </div>
        <button type="submit" name="signup" class="btn btn-success">Sign up</button>
    </form>

</body>
</html>