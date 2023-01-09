<?php
    session_start();

    if($_SESSION['profile']){
        header('location: profile.php');
    }
?>

<! doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Authorization</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <form>    
        <input type="text" class="input" name="login" placeholder="Login">
        <p class="login-error-0 invisible error-message"></p>   

        <input type="password" name="password" placeholder="Password">
        <p class="password-error-0 invisible error-message"></p>    

        <button type="submit" class="sign-in-btn">Sign in</button>

        <p>
            Don't have an account yet? <a href="register.php">Register</a>
        </p>
    </form>

    <script src="assets/js/jquery-3.6.3.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>