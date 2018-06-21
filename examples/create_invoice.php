<?php
require '../CloudOnex.php';
require 'init.php';

$response = $api->post('invoice',[
    'cid' => 1, # Customer id,
    'admin_id' => 1, # Admin user id to generate invoice creator, you can also pass 0 as id
    'status' => 'Published', # Published or Draft
    'currency' => 'USD', # iso currency code
    'invoicenum' => 'INV#', # Custom invoice prefix
    'show_quantity_as' => 'Qty', # Qty / Hour etc
    'cn' => '', # keep blank to generate number automatically
    'idate' => date('Y-m-d'), # Invoice Date

/* Possible values for due date
due_on_receipt : Due On Receipt
days3 : +3 days
days5 : + 5 days
days7 : + 7 days
days10 : + 10 days
days15 : + 15 days
days30 : + 30 days
days45 : + 45 days
days60 : + 50 days
*/
    'duedate' => 'due_on_receipt', # Due on receipt
    'repeat' => 0, # Use 1 for recurring invoice,
    'discount_type' => 'p', # Use p for Percentage amount discount & f for Fixed amount discount
    'discount_amount' => '0',
    'notes' => '', # Custom notes, invoice terms to show for customers
    'items' => [
        [
            'description' => 'Test Item 1', # Item name / description
            'item_code' => '', # You can add item code to track inventory
            'qty' => 1, # Item quantity
            'amount' => 45.00, # Item Price
            'taxed' => 0.00
        ],
        [
            'description' => 'Test Item 2', # Item name / description
            'item_code' => '', # You can add item code to track inventory
            'qty' => 1, # Item quantity
            'amount' => 35.00, # Item Price
            'taxed' => 0.00
        ]
    ]


])->response();

$result = json_decode($response);

echo $response;

// echo jsonPrettyPrint($response);