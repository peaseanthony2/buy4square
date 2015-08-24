<?php
	require("phone-twilio.php");
	require("includes/db_info.php");
	
	// require POST request
	if ($_SERVER['REQUEST_METHOD'] != "POST") die;
	
	// generate "random" 6-digit verification code
	$code = rand(100000, 999999);
	
	// save verification code in DB with phone number
	// does not check for duplicates like it should
	$number = mysql_real_escape_string($_POST["phone_number"]);
	db(sprintf("INSERT INTO numbers (phone_number, verification_code) VALUES('%s', %d)", $number, $code));
	
	mysql_close();
	
	// initiate phone call via Twilio REST API    
    // Set our AccountSid and AuthToken 
    $AccountSid = "yourtwilioaccountsid";
    $AuthToken = "yourtwilioauthtoken";
    
    // Instantiate a new Twilio Rest Client 
    $client = new TwilioRestClient($AccountSid, $AuthToken);
    
    // call data
    $data = array(
    	"Caller" => "877-555-1212", // Verified Outgoing Caller ID or Twilio number
    	"Called" => $number,	    // The phone number you wish to dial
    	"Url" => "http://example.com/twiml.php"
    );
    
	// make call
    $response = $client->request("/2008-08-01/Accounts/$AccountSid/Calls", "POST", $data); 
    
    // error handling would go here
    //if($response->IsError)
    //	echo "Error starting phone call: {$response->ErrorMessage}\n";
	
	// return verification code as JSON
	$json = array();	
	$json["verification_code"] = $code;
	
	header('Content-type: application/json');
	echo(json_encode($json));
?>