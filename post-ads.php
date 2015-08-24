<?php
require('header.php');


$address= db_get_array("SELECT * FROM website_address WHERE user_unid = '$user_unid'");

$hobbies = db_get_array("SELECT * FROM website_hobby");
$shipping_predefined_boxes = db_get_array("SELECT * FROM website_shipping_predefined_boxes");
$condition = db_get_array("SELECT * FROM website_conditions");
$shipping_services = db_get_array("SELECT * FROM website_shipping_services WHERE in_service = '1'");
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
<style>

</style>
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
            <h2 class="title-2 uppercase"><strong> <i class="icon-docs"></i> Post a Free Classified Ad</strong> </h2>
            <div class="row">
              <div class="col-sm-12">
                <form class="form-horizontal">
                  <fieldset>
                    <!-- Select Basic -->
                    <div class="form-group">
                      <label class="col-md-3 control-label" >Category</label>
                      <div class="col-md-8">
					  <?php
$categoryList = fetchCategoryTree();
?>
<select name="category-group" id="category-group" class="form-control">
<?php foreach($categoryList as $cl) { 
	if($cl["parent"] == 0){ ?>
  <option value="<?php echo $cl["cat_unid"] ?>" style="background-color:#E9E9E9;font-weight:bold;" disabled="disabled"><?php echo $cl["name"]; ?></option>
<?php	} else {?>
  <option value="<?php echo $cl["id"] ?>"><?php echo $cl["name"]; ?></option>
<?php } } ?>
</select>
                      </div>
                    </div>
					
					
					
					
					
					
					
					                    <div class="form-group">
                      <label class="col-md-3 control-label" >Hobby</label>
                      <div class="col-md-8">
<?php echo generateSelect('hobby', $hobbies, 'hobby_unid', 'hobby_name');  ?>
                      </div>
                    </div>
                    
                    															                    <div class="form-group">
                      <label class="col-md-3 control-label" >Condition</label>
                      <div class="col-md-8">
<?php echo generateSelect('condition', $condition, 'cond_unid', 'cond_name');  ?>
                      </div>
                    </div>
 
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="Adtitle">Ad title</label>
                      <div class="col-md-8">
                        <input id="Adtitle" name="Adtitle" placeholder="Ad title" class="form-control input-md" required="" type="text">
                        <span class="help-block">A great title needs at least 60 characters. </span> </div>
                    </div>
                    
                    <!-- Textarea -->
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="textarea">Describe ad </label>
                      <div class="col-md-8">
                        <textarea class="form-control" id="textarea" name="description">Describe what makes your ad unique</textarea>
                      </div>
                    </div>
                    
                    <!-- Prepended text-->
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="Price">Price</label>
                      <div class="col-md-4">
                        <div class="input-group"> <span class="input-group-addon">$</span>
                          <input id="Price" name="Price" class="form-control" placeholder="placeholder" required="" type="text">
                        </div>
                      </div>
                    </div>
                    								                    <div class="form-group">
                      <label class="col-md-3 control-label" >Your Own Box</label>
                      <div class="col-md-8">
					<?php echo generateSelect('own_box', $yes_no_array, 'unid', 'name', '1', 'onchange="slectboxtype(this)"');  ?>
                      </div>
                    </div>
					
					<div id="upsuspsbox">
					<div class="form-group">
                      <label class="col-md-3 control-label" >Carrier Predefined Boxes</label>
                      <div class="col-md-8">
					<?php echo generateSelect('shipping_predefined_boxes', $shipping_predefined_boxes, 'carrier_box_unid', 'box_full_name');  ?>
                      </div>
                    </div></div>
					<div id="handmadebox">
					<div  class="form-group">
                      <label class="col-md-3 control-label" for="Adtitle">Shipping Specs</label>
                      <div class="col-md-2">
                        <input id="Adtitle" name="Adtitle" placeholder="Length" class="form-control input-md" required="" type="text">

                    </div>
					
					     <div class="col-md-2">
                        <input id="Adtitle" name="Adtitle" placeholder="Width" class="form-control input-md" required="" type="text">
						</div>
					
					               <div class="col-md-2">
                        <input id="Adtitle" name="Adtitle" placeholder="Height" class="form-control input-md" required="" type="text">
						</div>

					</div></div>
	
	
					
					
					                <div class="form-group">
  
					  <div class="col-md-3"></div>
                      <div class="col-md-8">
                        <input id="Adtitle" name="Adtitle" placeholder="weight" class="form-control input-md" required="" type="text">
					     <span class="help-block">Weight must be in LBS</span>
                    </div>
					</div>
					
					
					
					
					
										                    <div class="form-group">
                      <label class="col-md-3 control-label" >Address</label>
                      <div class="col-md-8">
<?php echo generateSelect('address', $address, 'address_unid', 'address_line_1');  ?>
                      </div>
                    </div>
					
					
															                    <div class="form-group">
                      <label class="col-md-3 control-label" >Shipping Services</label>
                      <div class="col-md-8">
<?php echo generateSelect('shipping_services', $shipping_services, 'shipping_ser_unid', 'service_full_name');  ?>
                      </div>
                    </div>
					
					
					
					
					
					
					

                    
                    <!-- Button  -->
                    <div class="form-group">
                      <label class="col-md-3 control-label"></label>
                      <div class="col-md-8"> <a href="posting-success.html" id="button1id" class="btn btn-success btn-lg">Submit</a> </div>
                    </div>
                  </fieldset>
                </form>
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



<script>

$("div#upsuspsbox").hide();
	function slectboxtype(sel) {
    var value = sel.value;
	if (value == 1){
		$("div#handmadebox").show();
		$("div#upsuspsbox").hide();
		} 
		if (value == 2) {
		$("div#upsuspsbox").show();
		$("div#handmadebox").hide();
	} 
	}
	



</script>













</body>
</html>
