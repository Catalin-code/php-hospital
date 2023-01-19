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
        include("/Facultate/Daw/php-hospital/include/header.php");
        // include("../include/header.php");
    ?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2">
                    <?php 
                        include("sidenav.php");
                        include("/Facultate/Daw/php-hospital/include/connection.php");
                        // include("../include/connection.php");
                    ?>
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-center">Administrators</h5>
                                <?php
                                    $ad = $_SESSION['admin'];
                                    $getquery = "SELECT * FROM admin WHERE username != '$ad'";
                                    $res = mysqli_query($connect, $getquery);
                                    $output = "
                                    <table class='table table-bordered'>
                                        <tr>
                                        <th>Id</th>
                                        <th>Username</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Action</th>
                                        </tr>";



                                    if (mysqli_num_rows($res) < 1) {
                                        $output .= "
                                        <tr>
                                            <td colspan = '5' class='text-center'>No administrators</td>
                                        </tr>";
                                    }

                                    while ($row = mysqli_fetch_array($res)) {
                                        $id = $row['Id'];
                                        $username = $row['Username'];
                                        $firstName = $row['FirstName'];
                                        $lastName = $row['LastName'];

                                        $output .="
                                        <tr>
                                            <td>$id</td>
                                            <td>$username</td>
                                            <td>$firstName</td>
                                            <td>$lastName</td>
                                            <td>
                                                <a href='admin.php?id=$id'><button id='$id' class='btn btn-danger'>Remove</button></a>
                                            </td>";
                                    }
                                    $output .= "
                                        </tr>
                                    </table>";

                                    echo $output;

                                    if (isset($_GET['id'])){
                                        $id = $_GET['id'];
                                        $removequery = "DELETE FROM admin WHERE Id = '$id'";
                                        mysqli_query ($connect, $removequery);
                                    }
                                ?>
                            </div>
                            <div class="col-md-6">
                                <?php 
                                    if (isset($_POST['submit'])) {
                                        $addusername = $_POST['username'];
                                        $addpassword = $_POST['password'];
                                        $addFirstName = $_POST['firstName'];
                                        $addLastName = $_POST['lastName'];

                                        $error = array();

                                        if (empty($addusername)) {
                                            $error['u'] = "Enter new administrator username";
                                        } elseif (empty($addpassword)) {
                                            $error['u'] = "Enter new administrator password";
                                        } elseif (empty($addFirstName)) {
                                            $error['u'] = "Enter new administrator first name";
                                        } elseif (empty($addLastName)) {
                                            $error['u'] = "Enter new administrator last name";
                                        }

                                        if (count($error) == 0) {
                                            $addquery = "INSERT INTO admin(Username, Password, FirstName, LastName)
                                                        VALUES('$addusername', '$addpassword', '$addFirstName', '$addLastName')";
                                            $result = mysqli_query($connect, $addquery);
                                            echo "<meta http-equiv='refresh' content='0'>";
                                        }
                                    }

                                    if (isset($error['u'])) {
                                        $er = $error['u'];
                                        $show = "<h5 class='text-center alert alert-danger'>$er</h5>";
                                    } else {
                                        $show = "";
                                    }
                                ?>
                                <h5 class="text-center">Add administrator</h5>
                                <form method="post">
                                    <div>
                                        <?php 
                                            echo $show;
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" id="username" name="username" class="form-control" autocomplete="off">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" id="password" name="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="firstName">First Name</label>
                                        <input type="text" id="firstName" name="firstName" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="lastName">Last Name</label>
                                        <input type="text" id="lastName" name="lastName" class="form-control">
                                    </div>
                                    <br>
                                    <input type="submit" id="submit" name="submit" value="Submit" class="btn btn-success">
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