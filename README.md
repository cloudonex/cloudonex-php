### Getting Started Guide
Go to Settings → API & generate an API key

### Initializing

`$api = new CloudOnex([
     'base_url' => "http://stackb.test/?ng=api/v2/",
     'key' => '4fy5ays2yuplj8c1g0bja033uueu8q3e4rsm3g4y'
 ]);`


### Customers
**Get All Customers**

`$api->get("customers")->response();`

### Example integration

`// Get Single customer by id

 $customer = $api->get("customer/1")->response();
 
 echo 'Full Name: '.$customer->account.'<br>';
 echo 'Email: '.$customer->email.'<br>';
 echo 'Phone: '.$customer->phone.'<br>';
 echo 'Company: '.$customer->company.'<br>';
 echo 'Address: '.$customer->address.'<br>';
 echo 'City: '.$customer->city.'<br>';
 echo 'State: '.$customer->state.'<br>';
 echo 'ZIP: '.$customer->zip.'<br>';
 echo '<hr>';`
 