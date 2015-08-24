<?php
require_once 'google/appengine/api/mail/Message.php';
use google\appengine\api\mail\Message;
require("includes/db_info.php");
session_start();

if(isset($_GET['r']))
{
	$register_a = 'class="active"';
	$login_a = '';
	$register = 'active';
}else{
	$login_a = 'class="active"';
	$register_a = '';
	$register = 'not_active';
}

$success = '';
$error = '';


if(isset($_POST['register'])) {
$firstname =  mysql_real_escape_string($_POST['firstname']);
$lastname =  mysql_real_escape_string($_POST['lastname']);
$username =  mysql_real_escape_string($_POST['username']);
$email =  mysql_real_escape_string($_POST['email']);
$password =  mysql_real_escape_string($_POST['password']);
$retypepassword =  mysql_real_escape_string($_POST['confirm-password']);

// Select all the rows in the markers table
$query1 = "SELECT * FROM website_users WHERE username = '$username'";
$result1 = mysql_query($query1);
if (!$result1) {
  die('Invalid query: ' . mysql_error());
}

$num_rows = mysql_num_rows($result1);

if(isset($_POST['register'])) {
if ($num_rows >= '1' ) {
	$error = '<div class="alert alert-danger">Oh Snap!! Duplicate Username</div>'; 
	} else if ($password != $retypepassword) {
	$error = '<div class="alert alert-danger">Oh Snap!! Passwords Did Not Match</div>';
	} else {
	$password = md5($password);
	$email_code = rand();
	
	
	
$insert_update_array = array(
'first_name' => $firstname,
'last_name' => $lastname,
'username' => $username,
'password' => $password,
'email' => $email,
'email_code' => $email_code,
);
	
	
	$columns = implode(", ",array_keys($insert_update_array));
$escaped_values = array_map('mysql_real_escape_string', array_values($insert_update_array));
//$values  = implode(", ", $escaped_values);
$values = implode("', '", $escaped_values);
$query1 = "INSERT INTO `website_users`($columns) VALUES ('$values')";



$result2 = mysql_query($query1);
if (!$result2) {
  die('Invalid query: ' . mysql_error());
	}
// done



// Notice that $image_content_id is the optional Content-ID header value of the
//  attachment. Must be enclosed by angle brackets (<>)


// Notice that $image_data is the raw file data of the attachment.
try
{
  $message = new Message();
  $message->setSender("antbusk@gmail.com");
  $message->addTo($email);
  $message->setSubject("Confirm your Buy 4 Square email address");
  $message->setTextBody('Confirm your e-mail address https://buy4square.appspot.com/confirm-email.php?username=' . $username . '&code?' . $email_code .'');
  $message->send();
} catch (InvalidArgumentException $e) {
  // ...
}






	$success = '<div class="alert alert-success">You Created an account, please sign in.</div>';



 }  }
}


// Inialize session

$form_username = '';
$form_password = '';

if(isset($_POST['login'])) {
    
$form_username = mysql_real_escape_string($_POST['username']);
$form_password = mysql_real_escape_string($_POST['password']);
     
    
    $form_password = md5($form_password);

// Retrieve username and password from database according to user's input
$login = mysql_query("SELECT * FROM website_users WHERE (username = '" . $form_username . "') and (password = '" . $form_password . "')");

// Check username and password match
if (mysql_num_rows($login) == 1) {
// Set username cookie variable
setcookie("username", $_POST['username'], time()+28800);
$rand_password = rand();
$rand_password = md5($rand_password);
setcookie("rand_password", $rand_password, time()+28800);
$id = $_POST['username'];
date_default_timezone_set('America/Chicago'); // CDT
$session_login_date_time = date('d/m/Y == H:i:s');
$ipaddress = $_SERVER["REMOTE_ADDR"];


	$query_user = "SELECT * FROM website_users WHERE username = '$id'";
$result_user = mysql_query($query_user);
if (!$result_user) {
  die('Invalid query: ' . mysql_error());
}

$result_user_data = mysql_fetch_assoc($result_user);



$_SESSION["logged_in"] = 'yes';
$_SESSION["user_tmp_password"] = $rand_password;
$_SESSION["user_username"] = $result_user_data['username'];
$_SESSION["user_unid"] = $result_user_data['user_unid'];
$_SESSION["user_first_name"] = $result_user_data['first_name'];
$_SESSION["user_last_name"] = $result_user_data['last_name'];


// update db



 
// Jump to secured page
header("Location: $home");

}
else {
// Jump to login page
$error = '<div class="alert alert-danger">Oh Snap!! Wrong Username or Password</div>';
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login and Register tabbed form - Bootsnipp.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style type="text/css">
    body {
    padding-top: 5px;
	padding-left: 20px;
	}
.panel-login {
	border-color: #ccc;
	-webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	-moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
}
.panel-login>.panel-heading {
	color: #00415d;
	background-color: #fff;
	border-color: #fff;
	text-align:center;
}
.panel-login>.panel-heading a{
	text-decoration: none;
	color: #666;
	font-weight: bold;
	font-size: 15px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login>.panel-heading a.active{
	color: #029f5b;
	font-size: 18px;
}
.panel-login>.panel-heading hr{
	margin-top: 10px;
	margin-bottom: 0px;
	clear: both;
	border: 0;
	height: 1px;
	background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
	background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
}
.panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
	height: 45px;
	border: 1px solid #ddd;
	font-size: 16px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login input:hover,
.panel-login input:focus {
	outline:none;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
	border-color: #ccc;
}
.btn-login {
	background-color: #59B2E0;
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #59B2E6;
}
.btn-login:hover,
.btn-login:focus {
	color: #fff;
	background-color: #53A3CD;
	border-color: #53A3CD;
}
.forgot-password {
	text-decoration: underline;
	color: #888;
}
.forgot-password:hover,
.forgot-password:focus {
	text-decoration: underline;
	color: #666;
}

.btn-register {
	background-color: #1CB94E;
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #1CB94A;
}
.btn-register:hover,
.btn-register:focus {
	color: #fff;
	background-color: #1CA347;
	border-color: #1CA347;
}

    </style>
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

</head>
<body>
<div class="row" >
<div class="col-xs-5"></div><div class="col-xs-2"><img src="static/images/Vertical_logo_green.png" alt="buy 4 square" width="220px" height="220px"> </div><div class="col-xs-5"> </div>
</div>
	<div class="container">
								      <?php echo $success; ?>
      <?php echo $error; ?>
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div  class="col-xs-6">
								<a href="#"  <?php echo $login_a; ?> id="login-form-link">Login</a>
							</div>
							<div  class="col-xs-6">
								<a href="#" <?php echo $register_a; ?> id="register-form-link">Register</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
							

							
							
							
								<form id="login-form" action="login_register.php" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember"> Remember Me</label>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="recover.php" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											</div>
										</div>
									</div>
									<input type="hidden" name="login"  value="login" />
								</form>
								
								
								
								
								
								<form id="register-form" action="login_register.php" method="post" role="form" style="display: none;">
									<div class="form-group">
										<input type="text" name="firstname" id="firstname" tabindex="1" class="form-control" placeholder="First Name" value="">
									</div>
									<div class="form-group">
										<input type="text" name="lastname" id="lastname" tabindex="1" class="form-control" placeholder="Last Name" value="">
									</div>
									
									<div class="form-group">
										<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>
									<div class="form-group">
										<input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Email Address" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>
									<div class="form-group">
										<input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Register Now">
											</div>
										</div>
									</div>
									<input type="hidden" name="register"  value="register" />
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	$(function() {

    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});

function registerfun() {
    	$("#register-form").delay(0).fadeIn(0);
 		$("#login-form").fadeOut(0);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active')         
}
<?php 
if ($register == 'active')
{ ?>
registerfun();

<?php	
}	


?>

	</script>
</body>
</html>