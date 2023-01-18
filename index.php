<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP-Hospital</title>
    <link rel="stylesheet" type="text/css" href="/css/index.css">
</head>
<body>
    <?php
    include("/Facultate/Daw/php-hospital/include/header.php");
    // include("./include/header.php");
    ?>

    <div style="margin-top: 50px;"></div>

    <div class="container">
        <div class="row align-items-start">
            <div class="col shadow">
                <img class="user_type" src="/img/patient.png" alt="Patient">
                <a href="#">
                    <button class="btn btn-success">Create account</button>
                </a>
            </div>
            <div class="col shadow">
                <img class="user_type" src="/img/doctor.png" alt="Doctor">
            </div>
        </div>
    </div>


    
</body>
</html>