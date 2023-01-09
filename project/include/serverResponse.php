<?php

function server_response($status, $messages) {
    $response = [
        'status' => $status,
        'messages' => $messages
    ];

    echo json_encode($response);
}