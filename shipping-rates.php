<?php
require('header.php');






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
<link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">


<!-- Custom styles for this template -->
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />

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
        <div class="col-md-9 page-content">
          <div class="inner-box category-content">
            <h2 class="title-2 uppercase"><strong> <i class="icon-docs"></i> Shipping Rates</strong> </h2>
            <div class="row">
              <div class="col-sm-12">
			  
			  <p>Select shipping rate.</p>
			  
			  
			  
			  
			  
			  
			  
			  <?php


require_once('includes/plugins/easypost-php-master/lib/easypost.php');
\EasyPost\EasyPost::setApiKey('kZvkSRX4nEqTN3ju6ybPmg');

$shipment = \EasyPost\Shipment::create(array(
  'to_address' => array(
    'name' => 'George Costanza',
    'company' => 'Vandelay Industries',
    'street1' => '8605 Santa Monica Blvd ',
	'street2' => '',
    'city' => 'Los Angeles',
    'state' => 'CA',
    'zip' => '90069'
  ),
  'from_address' => array(
    'company' => 'EasyPost',
    'street1' => '410 Andover Park E',
    'street2' => '',
    'city' => 'Tukwila',
    'state' => 'WA',
    'zip' => '98188',
    'phone' => '206-767-9950'
  ),
  'parcel' => array(
    'length' => 9,
    'width' => 6,
    'height' => 2,
    'weight' => 10
  )
));



	?>
	<table class="table table-striped table-bordered table-hover table-condensed">
	<thead> 
<tr> 
	<th></th>
	<th>#</th>
	<th>Carrier</th>
    <th>Service</th> 
    <th>Rate</th>
	<th>New Rate</th>
</tr> 
</thead>
<tbody>
<h2><?php echo $shipment->id ?></h2>
<form action="print-shipping-label.php" method="POST" > 
<?php 
$number_row = 1;

foreach ($shipment->rates as $rate) { 
$new_rate = $rate->rate + 0.10;
?>
  <tr>
  <td><input name="shipping_rate" id="shipping_rate-<?php echo $number_row; ?>" value="<?php echo $rate->id; ?>" type="radio"></td>
  <td><?php echo $number_row; ?></td>
  <td><?php echo $rate->carrier; ?></td>
  <td><?php echo $rate->service; ?></td>
  <td><?php echo $rate->rate; ?></td>
  <td><?php echo $new_rate ?></td>
  </tr>
<?php 
$number_row++;
} ?>
</table>
<input type="hidden" name="shipment_id"  value="<?php echo $shipment->id ?>" />
<button class="btn btn-large" type="submit"  name="submit" value="submit">Submit</button>
</form>
<?php





?>
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  

              </div>
            </div>
          </div>
        </div>
        <!-- /.page-content -->
        
        <div class="col-md-3 reg-sidebar">
          <div class="reg-sidebar-inner text-center">
            <div class="promo-text-box"> <i class=" icon-picture fa fa-4x icon-color-1"></i>
              <h3><strong>Post a Free Classified</strong></h3>
              <p> Post your free online classified ads with us. Adds will remain on our site for one week. </p>
            </div>
            
            <div class="panel sidebar-panel">
              <div class="panel-heading uppercase"><small><strong>How to sell quickly?</strong></small></div>
              <div class="panel-content">
                <div class="panel-body text-left">
                  <ul class="list-check">
                    <li> Use a brief title and  description of the item  </li>
                    <li> Make sure you post in the correct category</li>
                    <li> Add nice photos to your ad</li>
                    <li> Put a reasonable price</li>
                    <li> Check the item before publish</li>

                  </ul>
                </div>
              </div>
            </div>
            
            
          </div>
        </div><!--/.reg-sidebar-->
      </div>
      <!-- /.row --> 
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.main-container -->
  
<?php echo $footer; ?>
</div>
<!-- /.wrapper --> 

<!-- Le javascript
================================================== --> 
<script>
        <script type="text/javascript">

$("#products_f1").change(function() {
  val = $(this).val();

      var html = $.ajax({
   url: "category_dropdownselect.php?value="+val+"",
   async: true,
   success: function(data) {

$('#sub_catagory').html(data);
 }////////////fuction html////////
 })/////////function ajax//////////

  
});
    </script>
<!-- Placed at the end of the document so the pages load faster --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"> </script><script src="assets/bootstrap/js/bootstrap.min.js"></script> 

<!-- include jquery file upload plugin  --> 
<script src="assets/js/fileinput.min.js" type="text/javascript"></script> 
<script>
// initialize with defaults
$("#input-upload-img1").fileinput();
$("#input-upload-img2").fileinput();
$("#input-upload-img3").fileinput();
$("#input-upload-img4").fileinput();
$("#input-upload-img5").fileinput();


</script> 

<!-- include carousel slider plugin  --> 
<script src="assets/js/owl.carousel.min.js"></script> 

<!-- include jquery.fs plugin for custom scroller and selecter  --> 
<script src="assets/plugins/jquery.fs.scroller/jquery.fs.scroller.js"></script>
<script src="assets/plugins/jquery.fs.selecter/jquery.fs.selecter.js"></script>
<!-- include custom script for site  --> 
<script src="assets/js/script.js"></script>
</body>
</html>
