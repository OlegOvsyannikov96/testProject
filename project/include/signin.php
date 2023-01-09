<?php

session_start();

require_once "config.php";
require_once "serverResponse.php";
require_once "user.php";
require_once "validator.php";
require_once "jsonConnector.php";

if($_SERVER['HTTP_X_REQUESTED_WITH'] == XHR) {
    $user_data = $_POST;
    $user = new User($user_data);

    $validator = new Validator();
    $messages = $validator->is_validate(SIGN_IN, $user);

    if(empty($messages)) {
        $json_connector = new JsonConnector();

        if($json_connector->check_login($user)) {
            $user_name = $json_connector->check_password($user);
        
            if($json_connector->check_password($user)) {
                $_SESSION['profile'] = 'Hello ' . $user_name;
                server_response(true, $messages);
            } else {
                array_push($messages, ['password-error-' . SIGN_IN, APE]);
                server_response(false, $messages);
            }
        } else {
            array_push($messages, ['login-error-' . SIGN_IN, ALE]);
            server_response(false, $messages);
        }
    } else {
        server_response(false, $messages);
    }
} else {
    header('location: ../index.php');
}