<?php
    session_start();

    
    if(!isset($_SESSION['id']))
    {
        header('location:../login.php');
        die();
    }
    
    session_destroy();
    header('location:../index.php');
    ?>