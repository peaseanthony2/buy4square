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
  <option value="<?php echo $cl["id"] ?>" style="background-color:#E9E9E9;font-weight:bold;" disabled="disabled"><?php echo $cl["name"]; ?></option>
<?php	} else {?>
  <option value="<?php echo $cl["id"] ?>"><?php echo $cl["name"]; ?></option>
<?php } } ?>
</select>
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
					
	<select name="category-group" id="category-group" class="form-control">
<?php foreach($condition as $cl) { 
	if($cl["parent"] == 0){ ?>
  <option value="<?php echo $cl["id"] ?>" style="background-color:#E9E9E9;font-weight:bold;" disabled="disabled"><?php echo $cl["name"]; ?></option>
<?php	} else {?>
  <option value="<?php echo $cl["id"] ?>"><?php echo $cl["name"]; ?></option>
<?php } } ?>
</select>
					
					
                    
                    <!-- photo -->
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="textarea">Picture </label>
                      <div class="col-md-8">
                        <div class="mb10">
                          <input id="input-upload-img1" type="file" class="file" data-preview-file-type="text">
                        </div>
                        <div class="mb10">
                          <input id="input-upload-img2" type="file" class="file" data-preview-file-type="text">
                        </div>
                        <div class="mb10">
                          <input id="input-upload-img3" type="file" class="file" data-preview-file-type="text">
                        </div>
                        <div class="mb10">
                          <input id="input-upload-img4" type="file" class="file" data-preview-file-type="text">
                        </div>
                        <div class="mb10">
                          <input id="input-upload-img5" type="file" class="file" data-preview-file-type="text">
                        </div>
                        <p class="help-block">Add up to 5 photos. Use a real image of your product, not catalogs.</p>
                      </div>
                    </div>
                    <div class="content-subheading"> <i class="icon-user fa"></i> <strong>Seller information</strong> </div>
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="textinput-name">Name</label>
                      <div class="col-md-8">
                        <input id="textinput-name" name="textinput-name" placeholder="Seller Name" class="form-control input-md" required="" type="text">
                      </div>
                    </div>
                    
                    <!-- Appended checkbox -->
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="seller-email"> Seller Email</label>
                      <div class="col-md-8">
                        <input id="seller-email" name="seller-email" class="form-control" placeholder="Email" required="" type="text">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox" name="seller_hide_phone_number" value="1">
                            <small> Hide the phone number on this ads.</small> </label>
                        </div>
                      </div>
                    </div>
                    
                    <!-- Text input-->
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="seller-Number">Phone Number</label>
                      <div class="col-md-8">
                        <input id="seller-Number" name="seller-Number" placeholder="Phone Number" class="form-control input-md" required="" type="text">
                      </div>
                    </div>
                    
                    <!-- Select Basic -->
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="seller-Location">State</label>
                      <div class="col-md-8">
                        <select id="seller-Location" name="seller-Location" class="form-control">
            <option value="AL">Alabama</option>
            <option value="AK">Alaska</option>
            <option value="AZ">Arizona</option>
            <option value="AR">Arkansas</option>
            <option value="CA">California</option>
            <option value="CO">Colorado</option>
            <option value="CT">Connecticut</option>
            <option value="DE">Delaware</option>
            <option value="DC">District Of Columbia</option>
            <option value="FL">Florida</option>
            <option value="GA">Georgia</option>
            <option value="HI">Hawaii</option>
            <option value="ID">Idaho</option>
            <option value="IL">Illinois</option>
            <option value="IN">Indiana</option>
            <option value="IA">Iowa</option>
            <option value="KS">Kansas</option>
            <option value="KY">Kentucky</option>
            <option value="LA">Louisiana</option>
            <option value="ME">Maine</option>
            <option value="MD">Maryland</option>
            <option value="MA">Massachusetts</option>
            <option value="MI">Michigan</option>
            <option value="MN">Minnesota</option>
            <option value="MS">Mississippi</option>
            <option value="MO">Missouri</option>
            <option value="MT">Montana</option>
            <option value="NE">Nebraska</option>
            <option value="NV">Nevada</option>
            <option value="NH">New Hampshire</option>
            <option value="NJ">New Jersey</option>
            <option value="NM">New Mexico</option>
            <option value="NY">New York</option>
            <option value="NC">North Carolina</option>
            <option value="ND">North Dakota</option>
            <option value="OH">Ohio</option>
            <option value="OK">Oklahoma</option>
            <option value="OR">Oregon</option>
            <option value="PA">Pennsylvania</option>
            <option value="RI">Rhode Island</option>
            <option value="SC">South Carolina</option>
            <option value="SD">South Dakota</option>
            <option value="TN">Tennessee</option>
            <option value="TX">Texas</option>
            <option value="UT">Utah</option>
            <option value="VT">Vermont</option>
            <option value="VA">Virginia</option>
            <option value="WA">Washington</option>
            <option value="WV">West Virginia</option>
            <option value="WI">Wisconsin</option>
            <option value="WY">Wyoming</option>
                        </select>
                      </div>
                    </div>
                    
                    <!-- Select Basic -->
                    <div class="form-group">
                      <label class="col-md-3 control-label" for="seller-area">City</label>
                      <div class="col-md-8">
					  <input id="seller-area" name="seller-area" placeholder="" class="form-control input-md" required="" type="text">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label class="col-md-3 control-label" for="seller-zip">Zip</label>
                      <div class="col-md-8">
					  <input id="seller-zip" name="seller-zip" placeholder="" class="form-control input-md" required="" type="text">
                      </div>
                    </div>
                    
                   
                    <div class="well">
                      <h3><i class=" icon-certificate icon-color-1"></i> Make your Ad Premium </h3>
                      <p>Premium ads help sellers promote their product or service by getting their ads more visibility with more
                        buyers and sell what they want faster. <a href="help.html">Learn more</a></p>
                      <div class="form-group">
                        <table class="table table-hover checkboxtable">
                          <tr>
                            <td><div class="radio">
                                <label>
                                  <input type="radio" name="premium" id="optionsRadios0" value="1" checked>
                                  <strong>Regular List </strong> </label>
                              </div></td>
                            <td><p>$00.00</p></td>
                          </tr>
                          <tr>
                            <td><div class="radio">
                                <label>
                                  <input type="radio" name="premium" id="optionsRadios1" value="2" >
                                  <strong>Urgent Ad </strong> </label>
                              </div></td>
                            <td><p>$10.00</p></td>
                          </tr>
                          <tr>
                            <td><div class="radio">
                                <label>
                                  <input type="radio" name="premium" id="optionsRadios2" value="3">
                                  <strong>Top of the Page Ad </strong> </label>
                              </div></td>
                            <td><p>$20.00</p></td>
                          </tr>
                          <tr>
                            <td><div class="radio">
                                <label>
                                  <input type="radio" name="premium" id="optionsRadios3" value="4">
                                  <strong>Top of the Page Ad + Urgent Ad </strong> </label>
                              </div></td>
                            <td><p>$40.00</p></td>
                          </tr>
                          <tr>
                            <td><div class="form-group">
                                <div class="col-md-8">
                                  <select class="form-control" name="payment" id="PaymentMethod">
                                    <option value="2">Select Payment Method</option>
                                    <option value="3">Credit / Debit Card </option>
                                    <option value="5">Paypal</option>
                                  </select>
                                </div>
                              </div></td>
                            <td><p> <strong>Payable Amount : $40.00</strong></p></td>
                          </tr>
                        </table>
                        
                      </div>
                    </div>
                    
                     <!-- terms -->
                    <div class="form-group">
                      <label class="col-md-3 control-label">Terms</label>
                      <div class="col-md-8">
                        <label class="checkbox-inline" for="checkboxes-0">
                          <input name="checkboxes" id="checkboxes-0" value="Remember above contact information." type="checkbox">
                          Remember above contact information. </label>
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
</body>
</html>
