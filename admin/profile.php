<?php 
    session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP-Hospital</title>
</head>
<body>
    <?php 
        include("../include/header.php");
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2">
                    <?php 
                        include("sidenav.php");
                        include("../include/connection.php");

                        $ad = $_SESSION['admin'];
                        $query = "SELECT * FROM admin WHERE username = '$ad'";

                        $res = mysqli_query($connect, $query);

                        while($row = mysqli_fetch_array($res)){
                            $username = $row['Username'];
                            $firstName = $row['FirstName'];
                            $lastName = $row['LastName'];
                        };
                    ?>
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h4><?php echo $username;?>'s profile</h4>
                                <?php 
                                    if (isset($_POST['changeUsername'])) {
                                        $changeusername = $_POST['username'];
                                        if (empty($changeusername)) {
                                        } else {
                                            $query = "UPDATE admin SET Username = '$changeusername'
                                                    WHERE Username = '$ad'";
                                            $res = mysqli_query($connect, $query);

                                            if ($res) {
                                                $_SESSION['admin'] = $changeusername;
                                                echo "<meta http-equiv='refresh' content='0'>";
                                            }

                                        }
                                    }
                                    if (isset($_POST['changeFirstName'])) {
                                        $changefirstname = $_POST['firstName'];
                                        if (empty($changefirstname)) {
                                        } else {
                                            $query = "UPDATE admin SET FirstName = '$changefirstname'
                                                    WHERE username = '$ad'";
                                            $res = mysqli_query($connect, $query);
                                            echo "<meta http-equiv='refresh' content='0'>";
                                        }
                                    }

                                    if (isset($_POST['changeLastName'])) {
                                        $changelastname = $_POST['lastName'];
                                        if (empty($changelastname)) {
                                        } else {
                                            $query = "UPDATE admin SET LastName = '$changelastname'
                                                    WHERE username = '$ad'";
                                            $res = mysqli_query($connect, $query);
                                            echo "<meta http-equiv='refresh' content='0'>";
                                        }
                                    }
                                ?>
                                <form method="post">
                                    <label for="">Change username</label>
                                    <input type="text" name="username" id="username" class="form-control" autocomplete="off">
                                    <br>
                                    <input type="submit" name="changeUsername" class="btn btn-success" value="Change">
                                    <br>
                                    <label for="">Change first name</label>
                                    <input type="text" name="firstName" id="firstName" class="form-control" autocomplete="off">
                                    <br>
                                    <input type="submit" name="changeFirstName" class="btn btn-success" value="Change">
                                    <br>
                                    <label for="">Change last name</label>
                                    <input type="text" name="lastName" id="lastName" class="form-control" autocomplete="off">
                                    <br>
                                    <input type="submit" name="changeLastName" class="btn btn-success" value="Change">
                                </form>
                            </div>
                            <div class="col-md-6">
                                <?php 
                                    if (isset($_POST['changePassword'])) {
                                        $oldpassword = $_POST['oldPassword'];
                                        $newpassword = $_POST['newPassword'];
                                        $confirmpassword = $_POST['confirmPassword'];

                                        $error = array();

                                        $old = mysqli_query($connect, "SELECT * FROM admin WHERE Username = '$ad'");
                                        $row = mysqli_fetch_array($old);
                                        $dboldpassword = $row['Password'];

                                        if (empty($oldpassword)) {
                                            $error['p'] = "Enter old password";
                                        } else if(empty($newpassword)){
                                            $error['p'] = "Enter new password";
                                        } else if (empty($confirmpassword)) {
                                            $error['p'] = "Confirm new password";
                                        } else if ($oldpassword != $dboldpassword) {
                                            $error['p'] = "Invalid old password";
                                        } else if ($newpassword != $confirmpassword) {
                                            $error['p'] = "Passwords don't match";
                                        }

                                        if (count($error) == 0) {
                                            $query = "UPDATE admin SET Password = '$newpassword'
                                                    WHERE Username = '$ad'";
                                            mysqli_query($connect, $query);
                                            echo "<meta http-equiv='refresh' content='0'>";
                                        }
                                    }
                                    if (isset($error['p'])) {
                                        $e = $error['p'];
                                        $show = "<h5 class='text-center alert alert-danger'>$e</h5>";
                                    } else {
                                        $show = "";
                                    }
                                ?>
                                <form method="post">
                                    <h5 class="text-center my-5">Change password</h5>
                                    <div>
                                        <?php 
                                            echo $show;
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="oldPassword">Old password</label>
                                        <input type="password" id="oldPassword" name="oldPassword" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="newPassword">New password</label>
                                        <input type="password" id="newPassword" name="newPassword" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="confirmPassword">Confirm password</label>
                                        <input type="password" id="confirmPassword" name="confirmPassword" class="form-control">
                                    </div>
                                    <br>
                                    <input type="submit" name="changePassword" value="Change password" class="btn btn-warning">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>