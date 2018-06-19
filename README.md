### Getting Started Guide
Go to Settings → API & generate an API key

### Initializing

```
$api = new CloudOnex([
     'base_url' => "http://stackb.test/?ng=api/v2/",
     'key' => '4fy5ays2yuplj8c1g0bja033uueu8q3e4rsm3g4y'
 ]);
 ```

### Customer
**Get a customer by id**

`$api->get("customer/1")->response();`

**Sample Response**

```
{
	"id": 294,
	"account": "Maria Elizabeth",
	"fname": null,
	"lname": null,
	"company": "The Acme Inc.",
	"business_number": null,
	"jobtitle": null,
	"cid": 1,
	"o": 0,
	"phone": "1-808-063-4092",
	"fax": null,
	"email": "maria@example.com",
	"username": null,
	"address": "28th Floor, 1325 6th Avenue",
	"city": "New York",
	"state": "NY",
	"zip": "10019",
	"country": "United States",
	"balance": "0.00",
	"status": "Active",
	"notes": null,
	"options": null,
	"tags": null,
	"password": null,
	"token": "ejdeb5vwcaf4m4amnb3846ba2489b2d0f35607c335763b6df5c9",
	"ts": null,
	"img": "storage\/dev\/user2.png",
	"web": null,
	"facebook": null,
	"google": null,
	"linkedin": null,
	"twitter": null,
	"skype": null,
	"tax_number": null,
	"entity_number": null,
	"currency": 0,
	"pmethod": null,
	"autologin": "4nt0z1f73q2k4zkbrdm02941526803991",
	"lastlogin": null,
	"lastloginip": null,
	"stage": null,
	"timezone": null,
	"isp": null,
	"lat": "40.762901",
	"lon": "-73.980733",
	"gname": "Default",
	"gid": 1,
	"sid": null,
	"role": null,
	"country_code": null,
	"country_idd": null,
	"signed_up_by": null,
	"signed_up_ip": null,
	"dob": null,
	"ct": null,
	"assistant": null,
	"asst_phone": null,
	"second_email": null,
	"second_phone": null,
	"taxexempt": null,
	"latefeeoveride": null,
	"overideduenotices": null,
	"separateinvoices": null,
	"disableautocc": null,
	"billingcid": 0,
	"securityqid": 0,
	"securityqans": null,
	"cardtype": null,
	"cardlastfour": null,
	"cardnum": null,
	"startdate": null,
	"expdate": null,
	"issuenumber": null,
	"bankname": null,
	"banktype": null,
	"bankcode": null,
	"bankacct": null,
	"gatewayid": 0,
	"language": null,
	"pwresetkey": null,
	"emailoptout": null,
	"created_at": "2018-05-20 04:11:49",
	"updated_at": "2018-05-20 04:11:49",
	"pwresetexpiry": null,
	"is_email_verified": 0,
	"is_phone_veirifed": 0,
	"photo_id_type": null,
	"photo_id": null,
	"type": "Customer",
	"drive": null
}
```

### Example integration

````
// Get Single customer by id

 $response = $api->get("customer/1")->response();
 $customer = json_decode($response);
 
 echo 'Full Name: '.$customer->account.'<br>';
 echo 'Email: '.$customer->email.'<br>';
 echo 'Phone: '.$customer->phone.'<br>';
 echo 'Company: '.$customer->company.'<br>';
 echo 'Address: '.$customer->address.'<br>';
 echo 'City: '.$customer->city.'<br>';
 echo 'State: '.$customer->state.'<br>';
 echo 'ZIP: '.$customer->zip.'<br>';
 echo '<hr>';
 ```
 
 ### Customers
**Get All Customers**

`$api->get("customers")->response();`

````


 