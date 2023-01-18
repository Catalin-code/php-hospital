<?php 
    session_start();

    if (isset($_SESSION['admin'])) {
        unset($_SEESION['admin']);

        header("Location:../index.php");
    }

?>