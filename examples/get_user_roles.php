<?php
require '../CloudOnex.php';
require 'init.php';

// Get All Customers

$response = $api->get("roles")->response();

$roles = json_decode($response);


?>


<h4>Customers</h4>

<p>Get all available user Roles</p>
<pre><code>$api->get("roles")->response();</code></pre>

<hr>


<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">S/L</th>
        <th scope="col">Role ID</th>
        <th scope="col">Role Name</th>
    </tr>
    </thead>
    <tbody>

    <?php
    $i = 1;
    foreach ($roles as $role)
    {
        echo '<tr>
            <th scope="row">'.$i.'</th>
            <td>'.$role->id.'</td>
            <td>'.$role->rname.'</td>
        </tr>';

        $i++;
    }
    ?>


    </tbody>
</table>


