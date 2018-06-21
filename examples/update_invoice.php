<?php
require '../CloudOnex.php';
require 'init.php';


// Update an invoice status
$response = $api->put("invoice/1",[
    'status' => 'Paid'
])->response();

var_dump($response);




