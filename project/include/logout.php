<?php
    session_start();
    unset($_SESSION['profile']);
    header('location: ../index.php');