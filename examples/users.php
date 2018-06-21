<?php
require '../CloudOnex.php';
require 'init.php';
require 'header.php';

// Get All Customers

$response = $api->get('users')->response();

$users = json_decode($response);

?>

    <h4>Users</h4>

    <p>Get All Users</p>
    <pre><code class="language-php">$api->get('users')->response();</code></pre>

    <hr>


    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Type</th>
        </tr>
        </thead>
        <tbody>

        <?php
        foreach ($users as $user)
        {
            echo '<tr>
            <th scope="row">'.$user->id.'</th>
            <td>'.$user->fullname.'</td>
            <td>'.$user->username.'</td>
            <td>'.$user->user_type.'</td>
        </tr>';
        }
        ?>


        </tbody>
    </table>

<?php

require 'footer.php';