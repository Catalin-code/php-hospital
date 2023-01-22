<?php 
    session_start();

    if (isset($_SESSION['patient'])) {
        unset($_SEESION['patient']);

        header("Location:../index.php");
        session_destroy();
    }

?>