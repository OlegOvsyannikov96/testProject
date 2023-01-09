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
    $messages = $validator->is_validate(SIGN_UP, $user);

    if(empty($messages)) {
        $json_connector = new JsonConnector();

        if(!$json_connector->check_login($user)) {
            if(!$json_connector->check_email($user)) {
                if($json_connector->create_user($user)){
                    server_response(true, $messages);
                } else {
                    array_push($messages, ['connection-error', CE]);
                    server_response(false, $messages);
                }
            } else {
                array_push($messages, ['email-error', SEE]);
                server_response(false, $messages);
            }
        } else {
            array_push($messages, ['login-error-' . SIGN_UP, SLE]);
            server_response(false, $messages);
        }
    } else {
        server_response(false, $messages);
    }
} else {
    header('location: ../register.php');
}