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
        // include("/Facultate/Daw/php-hospital/include/header.php");
        // include("/Facultate/Daw/php-hospital/include/connection.php");
        include("../include/header.php");
        include("../include/connection.php");
    ?>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2">
                    <?php 
                        include("sidenav.php")
                    ?>  
                </div>
                <div class="col-md-10">
                    <div class="col-md-auto my-1">
                        <div class="row">
                            <div class="col-md-3 bg-success mx-auto" style="height: 200px;">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <?php 
                                                $ad = mysqli_query($connect, "SELECT * FROM admin");
                                                $num = mysqli_num_rows($ad);
                                            ?>

                                            <h5 class="my-2 text-white"><?php echo $num;?></h5>
                                            <h5 class="text-white">Total</h5>
                                            <h5 class="text-white">Administrators</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <a href="#"><i class="fa-solid fa-user-gear fa-3x my-5" style="color: white;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-info mx-auto" style="height: 200px;">
                                <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h5 class="my-2 text-white">0</h5>
                                                <h5 class="text-white">Total</h5>
                                                <h5 class="text-white">Doctors</h5>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="#"><i class="fa-solid fa-user-doctor fa-3x my-5" style="color: white;"></i></a>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-3 bg-warning mx-auto" style="height: 200px;">
                                <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <h5 class="my-2 text-white">0</h5>
                                                <h5 class="text-white">Total</h5>
                                                <h5 class="text-white">Patients</h5>
                                            </div>
                                            <div class="col-md-4">
                                                <a href="#"><i class="fa-solid fa-user-gear fa-3x my-5" style="color: white;"></i></a>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>