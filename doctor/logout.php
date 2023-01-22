<?php 
    session_start();

    if (isset($_SESSION['doctor'])) {
        unset($_SEESION['doctor']);

        header("Location:../index.php");
        session_destroy();
    }

?>