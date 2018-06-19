<?php
require '../CloudOnex.php';
require 'init.php';
require 'header.php';

// Get All Customers

$response = $api->get("customers")->response();

$customers = json_decode($response);

?>

<h4>Customers</h4>

<p>Get All Customers</p>
    <pre><code class="language-php">$api->get("customers")->response();</code></pre>

<hr>


    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
        </tr>
        </thead>
        <tbody>

        <?php
        foreach ($customers as $customer)
        {
            echo '<tr>
            <th scope="row">'.$customer->id.'</th>
            <td>'.$customer->account.'</td>
            <td>'.$customer->email.'</td>
            <td>'.$customer->phone.'</td>
        </tr>';
        }
        ?>


        </tbody>
    </table>

<?php

require 'footer.php';