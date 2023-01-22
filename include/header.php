<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP-Hospital</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.3.slim.js" integrity="sha256-DKU1CmJ8kBuEwumaLuh9Tl/6ZB6jzGOBV/5YpNE2BWc=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<body>

    <nav class="navbar navbar-expand-lg navbar-info bg-info">
        <h5 class="text-white">PHP-Hospital</h5>
        <ul class="navbar-nav ">
            <?php
                if (isset($_SESSION['admin'])) {
                    $user = $_SESSION['admin'];
                    echo '
                    <li class="nav-item"><a href="profile.php" class="nav-link text-white">'.$user.'</a></li>
                    <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
                } elseif (isset($_SESSION['doctor'])) {
                    $user = $_SESSION['doctor'];
                    echo '
                    <li class="nav-item"><a href="profile.php" class="nav-link text-white">'.$user.'</a></li>
                    <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
                } elseif (isset($_SESSION['patient'])) {
                    $user = $_SESSION['patient'];
                    echo '
                    <li class="nav-item"><a href="profile.php" class="nav-link text-white">'.$user.'</a></li>
                    <li class="nav-item"><a href="logout.php" class="nav-link text-white">Logout</a></li>';
                }else {
                    echo '
                    <li class="nav-item"><a href="/index.php" class="nav-link text-white">Home</a></li>
                    <li class="nav-item"><a href="/adminlogin.php" class="nav-link text-white">Admin</a></li>
                    <li class="nav-item"><a href="/doctorlogin.php" class="nav-link text-white">Doctor</a></li>
                    <li class="nav-item"><a href="/patientlogin.php" class="nav-link text-white">Patient</a></li>';
                }
            ?>
        </ul>
    </nav>


    
</body>
</html>