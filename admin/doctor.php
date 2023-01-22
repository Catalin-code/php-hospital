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
                    ?>
                </div>
                <div class="col-md-10">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-center">Doctors</h5>
                                <?php
                                    $getquery = "SELECT doctor.Id, doctor.FirstName, doctor.LastName, doctor.Email, doctor.PhoneNumber, fieldofwork.Name FROM doctor
                                    JOIN fieldofwork ON doctor.FieldOfWorkId = fieldofwork.Id";
                                    $res = mysqli_query($connect, $getquery);
                                    $output = "
                                    <table class='table table-bordered'>
                                        <tr>
                                        <th>Id</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone number</th>
                                        <th>Filed of work</th>
                                        <th>Action</th>
                                        </tr>";



                                    if (mysqli_num_rows($res) < 1) {
                                        $output .= "
                                        <tr>
                                            <td colspan = '7' class='text-center'>No doctors</td>
                                        </tr>";
                                    }

                                    while ($row = mysqli_fetch_array($res)) {
                                        $id = $row['Id'];
                                        $firstName = $row['FirstName'];
                                        $lastName = $row['LastName'];
                                        $email = $row['Email'];
                                        $phoneNumber = $row['PhoneNumber'];
                                        $fieldOfWork = $row['Name'];

                                        $output .="
                                        <tr>
                                            <td>$id</td>
                                            <td>$firstName</td>
                                            <td>$lastName</td>
                                            <td>$email</td>
                                            <td>$phoneNumber</td>
                                            <td>$fieldOfWork</td>
                                            <td>
                                                <a href='doctor.php?id=$id'><button id='$id' class='btn btn-danger'>Remove</button></a>
                                            </td>";
                                    }
                                    $output .= "
                                        </tr>
                                    </table>";

                                    echo $output;

                                    if (isset($_GET['id'])){
                                        $id = $_GET['id'];
                                        $removequery = "DELETE FROM doctor WHERE Id = '$id'";
                                        mysqli_query ($connect, $removequery);
                                    }
                                ?>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-center">Applications</h5>
                                <?php
                                    $getquery = "SELECT doctorapplications.Id, doctorapplications.Username, doctorapplications.Password, doctorapplications.FirstName, doctorapplications.LastName, doctorapplications.Email, doctorapplications.PhoneNumber, fieldofwork.Id AS FieldOfWorkId, fieldofwork.Name FROM doctorapplications
                                    JOIN fieldofwork ON doctorapplications.FieldOfWorkId = fieldofwork.Id";
                                    $res = mysqli_query($connect, $getquery);
                                    $output = "
                                    <table class='table table-bordered'>
                                        <tr>
                                        <th>Id</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone number</th>
                                        <th>Filed of work</th>
                                        <th>Action</th>
                                        </tr>";



                                    if (mysqli_num_rows($res) < 1) {
                                        $output .= "
                                        <tr>
                                            <td colspan = '7' class='text-center'>No doctors</td>
                                        </tr>";
                                    }

                                    while ($row = mysqli_fetch_array($res)) {
                                        $id = $row['Id'];
                                        $username = $row['Username'];
                                        $password = $row['Password'];
                                        $firstName = $row['FirstName'];
                                        $lastName = $row['LastName'];
                                        $email = $row['Email'];
                                        $phoneNumber = $row['PhoneNumber'];
                                        $fieldOfWork = $row['Name'];
                                        $fieldOfWorkId = $row['FieldOfWorkId'];

                                        $output .="
                                        <tr>
                                            <td>$id</td>
                                            <td>$firstName</td>
                                            <td>$lastName</td>
                                            <td>$email</td>
                                            <td>$phoneNumber</td>
                                            <td>$fieldOfWork</td>
                                            <td>
                                                <a href='doctor.php?appid=$id'><button id='$id' class='btn btn-success'>Approve</button></a>
                                            </td>";
                                    }
                                    $output .= "
                                        </tr>
                                    </table>";

                                    echo $output;

                                    if (isset($_GET['appid'])){
                                        $id = $_GET['appid'];
                                        $approvequery = "INSERT INTO doctor(Username, Password, FirstName, LastName, Email, PhoneNumber, FieldOfWorkId)
                                        VALUES ('$username', '$password', '$firstName', '$lastName', '$email', '$phoneNumber', '$fieldOfWorkId')";
                                        $removeapplicationquerry = ("DELETE FROM doctorapplications
                                                                WHERE Id = '$id'");
                                        mysqli_query ($connect, $approvequery);
                                        mysqli_query ($connect, $removeapplicationquerry);
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>