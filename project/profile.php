<?php
    session_start();

    if(!$_SESSION['profile']){
        header('location: index.php');
    }
?>

<! doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <form>
        <label> <?= $_SESSION['profile']?> | <a href="include/logout.php">Logout</a> </label>
    </form>

</body>
</html>