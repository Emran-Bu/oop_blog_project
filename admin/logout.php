<?php

    session_start();
    if (!isset($_SESSION['userID'])) {
        header('location: login.php');
    }

    // session_destroy();
    session_unset();
    header('location: login.php');

?>