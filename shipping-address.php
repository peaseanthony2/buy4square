<?php
require('header.php');
$post_url = "shipping-address.php";
$unid_name = 'address_unid';
if(isset($_POST['insert_or_edit'])){

$insert_update_array = array(
'address_line_1' 	=> mysql_real_escape_string($_POST['address_line_1']),
'address_line_2' 	=> mysql_real_escape_string($_POST['address_line_2']),
'city' 				=> mysql_real_escape_string($_POST['city']),
'state' 			=> mysql_real_escape_string($_POST['state']),
'zip' 				=> mysql_real_escape_string($_POST['zip']),
'user_unid' 		=> $user_unid,
);
	if($_POST['insert_or_edit'] == 'insert'){
	$do_script = db_insert_array($insert_update_array, 'website_address');	
	}
	if($_POST['insert_or_edit'] == 'edit'){
		//unset($array1[2]); // delete known index(2) value from array
		//var_dump($array1);
	$last_field = array_pop($insert_update_array);	
	$do_script = db_update_array($insert_update_array, "website_address", "WHERE address_unid = '$edit_unid' AND user_unid = '$user_unid'");
	}
	
}

if(isset($delete_unid)){
	$do_script = db_delete("website_address", "WHERE address_unid = '$delete_unid' AND user_unid = '$user_unid'");
}


if(isset($_GET['edit_unid'])){
	$edit_shipping = db_get_single("SELECT * FROM website_address WHERE address_unid = '$edit_unid' AND user_unid = '$user_unid'");
}
else
{
	$edit_shipping = db_get_single("SELECT * FROM website_address WHERE blank = '1'");
}	

$result = db_query("SELECT * FROM website_address WHERE user_unid = '$user_unid'");


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
        <div class="col-md-12 page-content">
          <div class="inner-box category-content">
            <h2 class="title-2 uppercase"><strong> <i class="icon-docs"></i> Shipping address</strong> </h2>
            <div class="row">
              <div class="col-sm-12">
			  
	  <div class="row">
	  <div class="col-md-6">
	  </div>
			  
			  
			  	<div class="col-md-6">
		<p>Add Address</p>
		<hr />
		<form  action="<?php echo $post_url; ?>" method="post" >
<table width="100%" border="0">

  <tr style="height: 35px;">
    <td>Line 1:</td>
    <td><?php echo generateText('address_line_1', $edit_shipping['address_line_1']);  ?><td>
  </tr>
  <tr style="height: 35px;">
    <td>Line 2:</td>
    <td><?php echo generateText('address_line_2', $edit_shipping['address_line_2']);  ?><td>
  </tr>
  <tr style="height: 35px;">
    <td>City:</td>
    <td><?php echo generateText('city', $edit_shipping['city']);  ?><td>
  </tr>
  <tr style="height: 35px;">
    <td>State:</td>
    <td><?php echo generateText('state', $edit_shipping['state']); ?><td>
  </tr>
  <tr style="height: 35px;">
    <td>Zip:</td>
    <td><?php echo generateText('zip', $edit_shipping['zip']);  ?><td>
  </tr>

  <tr>
    <td><button class="btn btn-large" type="submit"  name="submit" value="submit">Submit</button></td>
    <td></td>
  </tr>
</table>


<!-- begin form footer -->
<?php 

if(isset($_GET['edit_unid']))
{ 
echo '<input type="hidden" name="edit_unid" value="' . $_GET['edit_unid']. '" />'; 
} 

?>
<input type="hidden" name="insert_or_edit" value="<?php if (isset($_GET['edit_unid'])) { echo 'edit'; } else { echo 'insert'; } ?>">
<input type="hidden" name="submit"  value="submit" />
</form>
<!-- end form footer -->

	</div>
</div>
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  <div class="row-fluid"><!-- contents row 1 oppening tag -->
<div class="span12">
<table id="myTable" class="table table-condensed table-hover"> 
<thead> 
<tr> 
	<th>UnId</th>
	<th>Line 1</th>
    <th>Line 2</th> 
    <th>City</th> 
    <th>State</th> 
    <th>Zip</th>
    <th></th>
</tr> 
</thead> 
<tbody> 
<?php while ($row = @mysql_fetch_assoc($result)){ ?>
<tr>
	<td><?php echo $row[$unid_name]; ?></td>
	<td><?php echo $row['address_line_1']; ?></td>
    <td><?php echo $row['address_line_2']; ?></td> 
    <td><?php echo $row['city']; ?></td> 
    <td><?php echo $row['state']; ?></td> 
    <td><?php echo $row['zip']; ?></td>

<td style="text-align: center;">
<a href="#"  class="btn btn-large btn-info msgbox-confirm"><i class="glyphicon glyphicon-barcode"></i></a>
<a href="<?php echo $post_url; ?>?edit_unid=<?php echo $row[$unid_name] ?>" class="btn btn-large btn-info msgbox-confirm" ><i class="glyphicon glyphicon-list"></i></a>
<a onclick="if(!confirm('Are you sure that you want to permanently delete the selected element?'))return false" class="btn btn-large btn-info msgbox-confirm" href="<?php echo $post_url; ?>?delete_unid=<?php echo $row[$unid_name]; ?>"><i class="glyphicon glyphicon-remove-circle"></i></a></td> 
</tr> 
<?php } ?>
</tbody>
</table>
</div>
</div>
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  

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
