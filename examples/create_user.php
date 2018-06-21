<?php
require '../CloudOnex.php';
require 'init.php';

$response = $api->post('user',[
    'username' => 'demo@example.com',
    'fullname' => 'John Doe',
    'password' => '123456',
])->response();

$result = json_decode($response);

echo jsonPrettyPrint($response);