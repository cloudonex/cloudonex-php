<?php
require '../CloudOnex.php';
require 'init.php';


// Get invoice and it's items by invoice id
$response = $api->get("invoice/1")->response();

$invoice = json_decode($response);

echo '<pre><code>'.jsonPrettyPrint($response).'</code></pre>';

