<?php
require '../CloudOnex.php';
require 'init.php';

// Create customer
$response = $api->post('customer',[
    'account' => 'Maria Elizabeth', # Customer Full Name
    'email' => 'maria@example.com',
    'password' => '123456',
    'phone' => '+1 800 000 0000',
    'address' => '525 Grandview Avenue',
    'city' => 'Staten Island',
    'state' => 'New York',
    'zip' => '10303',
    'country' => 'United States',
    'company' => '',
    'owner_id' => 0 # You can pass the admin id as owner id
])->response();

$result = json_decode($response);

// echo $result->contact_id

var_dump($response);