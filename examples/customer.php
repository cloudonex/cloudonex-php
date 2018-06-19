<?php
require '../CloudOnex.php';
require 'init.php';

// Get Single customer by id
$customer = $api->get("customer/1")->response();

echo 'Full Name: '.$customer->account.'<br>';
echo 'Email: '.$customer->email.'<br>';
echo 'Phone: '.$customer->phone.'<br>';
echo 'Company: '.$customer->company.'<br>';
echo 'Address: '.$customer->address.'<br>';
echo 'City: '.$customer->city.'<br>';
echo 'State: '.$customer->state.'<br>';
echo 'ZIP: '.$customer->zip.'<br>';
echo '<hr>';