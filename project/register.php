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
    <title>Registration</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <form>
        <input type="text" name="login" placeholder="Login">
        <p class="login-error-1 invisible error-message"></p>
        
        <input type="text" name="email" placeholder="Email">
        <p class="email-error invisible error-message"></p>

        <input type="text" name="name" placeholder="Name">
        <p class="name-error invisible error-message"></p>  

        <input type="password" name="password" placeholder="Password">
        <p class="password-error-1 invisible error-message"></p> 
               
        <input type="password" name="password-confirm" placeholder="Password confirm">
        <p class="password-confirm-error invisible error-message"></p>

        <button type="submit" class="sign-up-btn">Sign up</button>

        <p>
            Already have login and password? <a href="index.php">Sign in</a>
        </p>

        <p class="connection-error invisible error-message"></p>
    </form>

    <script src="assets/js/jquery-3.6.3.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>
</html>