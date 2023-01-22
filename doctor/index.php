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
            </div>
        </div>
    </div>
</body>
</html>