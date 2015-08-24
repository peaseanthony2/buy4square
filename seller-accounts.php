<?php
require('header.php');
require('account-includes.php');
  define('CLIENT_ID', 'ca_6hSzuFypAh5oMFgXnHOvWhLu7L10qexb');
  define('API_KEY', 'sk_test_gzpJWMGs2ClZowZ4rzEO0PW5');
  define('TOKEN_URI', 'https://connect.stripe.com/oauth/token');
  define('AUTHORIZE_URI', 'https://connect.stripe.com/oauth/authorize');

?><!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/ico/favicon.png">
<title>BOOTCLASIFIED - Responsive Classified Theme</title>
<!-- Bootstrap core CSS -->
<link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="assets/css/style.css" rel="stylesheet">

<!-- styles needed for carousel slider -->
<link href="assets/css/owl.carousel.css" rel="stylesheet">
<link href="assets/css/owl.theme.css" rel="stylesheet">

<!-- Just for debugging purposes. -->
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

<!-- include pace script for automatic web page progress bar  -->

<script>
    paceOptions = {
      elements: true
    };
</script>
<script src="assets/js/pace.min.js"></script>
</head>
<body>
<div id="wrapper">

<?php echo $header; ?>
  
  <div class="main-container">
    <div class="container">
      <div class="row">

	  
	  
	  <?php echo $account_sidebar; ?>
	  
        
        <div class="col-sm-9 page-content">
          <div class="inner-box">
          <div class="row">
            <div class="col-md-5 col-xs-4 col-xxs-12">
              <h3 class="no-padding text-center-480 useradmin"><a href=""><img class="userImg" src="images/user.jpg" alt="user"> <?php echo '' . $_SESSION["user_firstname"] . ' ' . $_SESSION["user_lastname"] . ''; ?> </a> </h3>
            </div>
            <div class="col-md-7 col-xs-8 col-xxs-12">
              <div class="header-data text-center-xs"> 
                
                <!-- Traffic data -->
                <div class="hdata">
                  <div class="mcol-left"> 
                    <!-- Icon with red background --> 
                    <i class="fa fa-eye ln-shadow"></i> </div>
                  <div class="mcol-right"> 
                    <!-- Number of visitors -->
                    <p><a href="#">7000</a> <em>visits</em></p>
                  </div>
                  <div class="clearfix"></div>
                </div>
                
                <!-- revenue data -->
                <div class="hdata">
                  <div class="mcol-left"> 
                    <!-- Icon with green background --> 
                    <i class="icon-th-thumb ln-shadow"></i> </div>
                  <div class="mcol-right"> 
                    <!-- Number of visitors -->
                    <p><a href="#">12</a><em>Ads</em></p>
                  </div>
                  <div class="clearfix"></div>
                </div>
                
                <!-- revenue data -->
                <div class="hdata">
                  <div class="mcol-left"> 
                    <!-- Icon with blue background --> 
                    <i class="fa fa-user ln-shadow"></i> </div>
                  <div class="mcol-right"> 
                    <!-- Number of visitors -->
                    <p><a href="#">18</a> <em>Favorites </em></p>
                  </div>
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>
          </div>
          
          <div class="inner-box">
            <div class="welcome-msg">
              <h3 class="page-sub-header2 clearfix no-padding">Hello <?php echo '' . $_SESSION["user_firstname"] . ' ' . $_SESSION["user_lastname"] . ''; ?></h3>
              <span class="page-sub-header-sub small">You last logged in at: 01-01-2014 12:40 AM [UK time (GMT + 6:00hrs)]</span> </div>
			  

        <!-- Tab panes -->

			  
			  
			  
			  
            <div id="accordion" class="panel-group">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"> <a href="#collapseB1"  data-toggle="collapse"> Seller Accounts </a> </h4>
                </div>
                <div class="panel-collapse collapse in" id="collapseB1">
                  <div class="panel-body">
      
	  <?php
    $authorize_request_body = array(
      'response_type' => 'code',
      'scope' => 'read_write',
      'client_id' => CLIENT_ID
    );
    $url = AUTHORIZE_URI . '?' . http_build_query($authorize_request_body);

$stripe_connected = false;
	 ?>
	  </br>
	 </br>
<?php if($stripe_connected == true){ ?>
	  <a href="<?php echo $url; ?>"><img src="images/blue-on-light-connected.png"></a> 
<?php } else { ?>
	  <a href="<?php echo $url; ?>"><img src="images/blue-on-light.png"></a> 
<?php } ?>
	   </br>
	    </br>
		 </br>
		  </br>
		  
		  
<?php 

/// get list of listings	
	$query4 = "SELECT * FROM website_users_to_sellers
	INNER JOIN (website_seller_account) ON (website_seller_account.seller_unid=website_users_to_sellers.seller_unid) 
	WHERE website_users_to_sellers.user_unid = '$user_unid'";
	
$result = mysql_query($query4);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}
/// end list of listings
$count1 = mysql_num_rows($result);

  ?>
		   <h2>Seller accounts.</h2>
  <p>All business and personal selling accounts:</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Display Name</th>
        <th>Account E-Mail</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
  <?php while ($row = @mysql_fetch_assoc($result)){ ?>
      <tr>
	<td><?php echo $row['display_name']; ?></td>
	<td><?php echo $row['account_email']; ?></td>
	<td><?php echo $row['timezone']; ?></td>
      </tr>
  <?php } ?>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	        <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	        <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	        <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	        <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </tbody>
  </table>
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		   </br>
		    </br>
			 </br>

				  
				  
                  </div>
                </div>
              </div>
              

            </div>
            <!--/.row-box End--> 
            
          </div>
        </div>
        <!--/.page-content--> 
      </div>
      <!--/.row--> 
    </div>
    <!--/.container--> 
  </div>
  <!-- /.main-container -->
  
<?php echo $footer; ?>
</div>
<!-- /.wrapper --> <!-- Le javascript
================================================== --> 

<!-- Placed at the end of the document so the pages load faster --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"> </script><script src="assets/bootstrap/js/bootstrap.min.js"></script> 

<!-- include carousel slider plugin  --> 
<script src="assets/js/owl.carousel.min.js"></script> 

<!-- include jquery.fs plugin for custom scroller and selecter  --> 
<script src="assets/plugins/jquery.fs.scroller/jquery.fs.scroller.js"></script>
<script src="assets/plugins/jquery.fs.selecter/jquery.fs.selecter.js"></script>
<!-- include custom script for site  --> 
<script src="assets/js/script.js"></script>
</body>
</html>
