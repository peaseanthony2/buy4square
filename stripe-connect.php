<?php
require('header.php');
require('account-includes.php');
require("includes/plugins/stripe-php-2.3.0/init.php");
Stripe\Stripe::setApiKey("sk_test_gzpJWMGs2ClZowZ4rzEO0PW5");
  define('CLIENT_ID', 'ca_6hSzuFypAh5oMFgXnHOvWhLu7L10qexb');
  define('API_KEY', 'sk_test_gzpJWMGs2ClZowZ4rzEO0PW5');
  define('TOKEN_URI', 'https://connect.stripe.com/oauth/token');
  define('AUTHORIZE_URI', 'https://connect.stripe.com/oauth/authorize');
  
  
  
  
  
  
  
  if (isset($_GET['code'])) { // Redirect w/ code
    $code = $_GET['code'];	
	
$url = 'https://connect.stripe.com/oauth/token';
$data = array(
'client_secret' => 'sk_test_gzpJWMGs2ClZowZ4rzEO0PW5', 
'grant_type' => 'authorization_code',
'client_id' => 'ca_6hSzuFypAh5oMFgXnHOvWhLu7L10qexb',
'code' => $code,
);
$options = array(
        'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    )
);

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$resp = json_decode($result);
	


	
	if(isset($resp->stripe_user_id)){
$stripe_user_id = $resp->stripe_user_id;
	$query1 = "SELECT * FROM website_users_to_sellers WHERE stripe_user_id = '$stripe_user_id' AND user_unid = '$user_unid'";
$result1 = mysql_query($query1);
if (!$result1) {
  die('Invalid query: ' . mysql_error());
}
	if (mysql_num_rows($result1) == 0) {
Stripe\Stripe::setApiKey($resp->access_token);	
$seller_account = Stripe\Account::retrieve($stripe_user_id);

$seller_insert = array(
'stripe_user_id' 					=> $resp->stripe_user_id,
'access_token' 						=> $resp->access_token,
'stripe_publishable_key' 			=> $resp->stripe_publishable_key,
'refresh_token' 					=> $resp->refresh_token,
'created_user_unid' 				=> $user_unid,

'address_line2'						=> $seller_account->legal_entity[0]->address->line1,
'address_line2'						=> $seller_account->legal_entity[0]->address->line2,
'address_city'						=> $seller_account->legal_entity[0]->address->city,
'address_state'						=> $seller_account->legal_entity[0]->address->state,
'address_poastal_code'				=> $seller_account->legal_entity[0]->address->postal_code,
'business_url'				   		=> $seller_account->business_url,
'account_email'				   		=> $seller_account->email,
'business_name'						=> $seller_account->business_name,
'display_name'						=> $seller_account->display_name,
'timezone'							=> $seller_account->timezone,
'first_name'						=> $seller_account->legal_entity[1]->first_name,
'last_name'							=> $seller_account->legal_entity[1]->last_name,
'type'								=> $seller_account->legal_entity[0]->type,
);
	
$seller_unid = db_insert_array($seller_insert, 'website_seller_account');


	$user_to_account = array(
'seller_unid' 						=> $seller_unid,
'user_unid' 						=> $user_unid,
'stripe_user_id' 					=> $stripe_user_id,
'type'								=> $seller_account->legal_entity[0]->type,
);
	
$do_script = db_insert_array($user_to_account, 'website_users_to_sellers');


//header("Location: /seller-accounts.php");



	}// no duplicate accounts
	
$url_error = urlencode('Duplicate Stripe/Seller Account');
header("Location: /seller-accounts.php?error=$url_error");

	} // isset sctripe account

	
	
  } else if 
  
  
  (isset($_GET['error'])) { // Error
    echo $_GET['error_description'];
  } else 
  
  
 { // Show OAuth link
    $authorize_request_body = array(
      'response_type' => 'code',
      'scope' => 'read_write',
      'client_id' => CLIENT_ID
    );
    $url = AUTHORIZE_URI . '?' . http_build_query($authorize_request_body);
    echo "<a href='$url'>Connect with Stripe</a>";
  }
?>