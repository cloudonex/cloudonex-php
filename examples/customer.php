<?php
require '../CloudOnex.php';
require 'init.php';


// Get Single customer by id
$response = $api->get("customer/1")->response();

$customer = json_decode($response);

?>

    <h4>Customer</h4>

    <p>Get a customer by id</p>
    <pre><code>$api->get("customer/1")->response();</code></pre>

    <hr>

    <pre><code><?php echo jsonPrettyPrint($response); ?></code></pre>

<?php

echo 'Full Name: '.$customer->account.'<br>';
echo 'Email: '.$customer->email.'<br>';
echo 'Phone: '.$customer->phone.'<br>';
echo 'Company: '.$customer->company.'<br>';
echo 'Address: '.$customer->address.'<br>';
echo 'City: '.$customer->city.'<br>';
echo 'State: '.$customer->state.'<br>';
echo 'ZIP: '.$customer->zip.'<br>';
echo '<hr>';

