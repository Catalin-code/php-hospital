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
                        include("../include/connection.php");

                        $pa = $_SESSION['patient'];
                        $query = "SELECT * FROM patient WHERE Username = '$pa'";

                        $res = mysqli_query($connect, $query);

                        while($row = mysqli_fetch_array($res)){
                            $id = $row['Id'];
                            $username = $row['Username'];
                            $firstName = $row['FirstName'];
                            $lastName = $row['LastName'];
                            $email = $row['Email'];
                            $phoneNumber = $row['PhoneNumber'];
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
                                            $query = "UPDATE patient SET Username = '$changeusername'
                                                    WHERE Username = '$pa'";
                                            $res = mysqli_query($connect, $query);

                                            if ($res) {
                                                $_SESSION['patient'] = $changeusername;
                                                echo "<meta http-equiv='refresh' content='0'>";
                                            }
                                        }
                                    }

                                    if (isset($_POST['changeFirstName'])) {
                                        $changefirstname = $_POST['firstName'];
                                        if (empty($changefirstname)) {
                                        } else {
                                            $query = "UPDATE patient SET FirstName = '$changefirstname'
                                                    WHERE Username = '$pa'";
                                            $res = mysqli_query($connect, $query);
                                            echo "<meta http-equiv='refresh' content='0'>";
                                        }
                                    }

                                    if (isset($_POST['changeLastName'])) {
                                        $changelastname = $_POST['lastName'];
                                        if (empty($changelastname)) {
                                        } else {
                                            $query = "UPDATE patient SET LastName = '$changelastname'
                                                    WHERE Username = '$pa'";
                                            $res = mysqli_query($connect, $query);
                                            echo "<meta http-equiv='refresh' content='0'>";
                                        }
                                    }

                                    if (isset($_POST['changeEmail'])) {
                                        $changeemail = $_POST['email'];
                                        if (empty($changeemail)) {
                                        } else {
                                            $query = "UPDATE patient SET Email = '$changeemail'
                                                    WHERE Username = '$pa'";
                                            $res = mysqli_query($connect, $query);
                                            echo "<meta http-equiv='refresh' content='0'>";
                                        }
                                    }

                                    if (isset($_POST['changePhoneNumber'])) {
                                        $changephonenumber = $_POST['phoneNumber'];
                                        if (empty($changelastname)) {
                                        } else {
                                            $query = "UPDATE patient SET PhoneNumber = '$changephonenumber'
                                                    WHERE Username = '$pa'";
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
                                    <br>
                                    <label for="">Change e-mail</label>
                                    <input type="email" name="email" id="email" class="form-control" autocomplete="off">
                                    <br>
                                    <input type="submit" name="changeEmail" class="btn btn-success" value="Change">
                                    <br>
                                    <label for="">Change phone number</label>
                                    <input type="text" name="phoneNumber" id="phoneNumber" class="form-control" autocomplete="off">
                                    <br>
                                    <input type="submit" name="changePhoneNumber" class="btn btn-success" value="Change">
                                </form>
                            </div>
                            <div class="col-md-6">
                                <?php 
                                    if (isset($_POST['changePassword'])) {
                                        $oldpassword = $_POST['oldPassword'];
                                        $newpassword = $_POST['newPassword'];
                                        $confirmpassword = $_POST['confirmPassword'];

                                        $error = array();

                                        $old = mysqli_query($connect, "SELECT * FROM patient WHERE Username = '$pa'");
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
                                            $query = "UPDATE patient SET Password = '$newpassword'
                                                    WHERE Username = '$pa'";
                                            mysqli_query($connect, $query);
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