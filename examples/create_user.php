<?php
require '../CloudOnex.php';
require 'init.php';

$response = $api->post('user',[
    'username' => 'demo@example.com',
    'fullname' => 'John Doe',
    'password' => '123456',
    // You can send Role ID as user_type, use 0 for super admin.
    // to get available Roles, use- $api->get("roles")->response();
    'user_type' => 0
])->response();

$result = json_decode($response);

echo jsonPrettyPrint($response);