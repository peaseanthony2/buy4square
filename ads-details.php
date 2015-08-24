<?php
require('header.php');

$ad_id = $_GET['ad_id'];

$query_ad = "SELECT * FROM website_ads WHERE ad_unid = '$ad_id'";
$result_ad = mysql_query($query_ad);
if (!$result_ad) {
  die('Invalid query: ' . mysql_error());
}
$ad = mysql_fetch_assoc($result_ad);


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
<title><?php echo $ad['title']; ?> - Buy 4 Square</title>
<!-- Bootstrap core CSS -->
<link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="assets/css/style.css" rel="stylesheet">

<!-- styles needed for carousel slider -->
<link href="assets/css/owl.carousel.css" rel="stylesheet">
<link href="assets/css/owl.theme.css" rel="stylesheet">

<!-- bxSlider CSS file -->
<link href="assets/plugins/bxslider/jquery.bxslider.css" rel="stylesheet" />

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
      <ol class="breadcrumb pull-left">
        <li><a href="#"><i class="icon-home fa"></i></a></li>
        <li><a href="category.html">All Ads</a></li>
        <li><a href="sub-category-sub-location.html">Electronics</a></li>
        <li class="active">Mobile Phones</li>
      </ol>
      <div class="pull-right backtolist"><a href="sub-category-sub-location.html"> <i class="fa fa-angle-double-left"></i> Back to Results</a></div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-9 page-content col-thin-right">
          <div class="inner inner-box ads-details-wrapper">
            <h2> X<?php echo $ad['title']; ?> <small class="label label-default adlistingtype">Company ad</small> </h2>
            <span class="info-row"> <span class="date"><i class=" icon-clock"> </i> Today 1:21 pm </span> - <span class="category">Electronics </span>- <span class="item-location"><i class="fa fa-map-marker"></i> New York </span> </span>
            <div class="ads-image">
              <h1 class="pricetag"> $<?php echo $ad['price']; ?></h1>
              <ul class="bxslider">
<?php
$product_unid = $ad['product_id'];
$query_photos = "SELECT unid FROM photos WHERE prod_unid = '$product_unid'";
$result_photos = mysql_query($query_photos);
if (!$result_photos) {
  die('Invalid query: ' . mysql_error());
	}

	?>
	<?php
		while($row_photos = mysql_fetch_assoc($result_photos))	
		{ 
		$pic_id = $row_photos['unid'];										
		?>
<li><img src="https://ewc-group-re-tech.appspot.com/photo_url.php?size=730&unid=<?php echo $pic_id; ?>" alt="img" height="430px" /></li>
<?php
		}
		?>
</ul>
<div id="bx-pager"> 
<?php
		mysql_data_seek($result_photos, 0);	
		$photos_num = 0;	
		while($row_photos = mysql_fetch_assoc($result_photos))	
		{ 
		$pic_id = $row_photos['unid'];										
		?>
<a class="thumb-item-link" data-slide-index="<?php echo $photos_num; ?>" href=""><img src="https://ewc-group-re-tech.appspot.com/photo_url.php?size=110&unid=<?php echo $pic_id; ?>" alt="img" /></a>
<?php
		$photos_num ++;
		}
?>
			  </div>
            </div>
            <!--ads-image-->
            
            <div class="Ads-Details">
              <h5 class="list-title"><strong>Ads Detsils</strong></h5>
              <div class="row">
                <div class="ads-details-info col-md-8">
					<?php echo $ad['description']; ?>
                </div>
                <div class="col-md-4">
                  <aside class="panel panel-body panel-details">
                    <ul>
                      <li>
                        <p class=" no-margin "><strong>Price:</strong> $<?php echo $ad['price']; ?> </p>
                      </li>
                      <li>
                        <p class="no-margin"><strong>Type:</strong> Smartphones</p>
                      </li>
                      <li>
                        <p class="no-margin"><strong>Est Handeling Time:</strong> <?php echo $ad['est_handleing_time']; ?> Days</p>
                      </li>
					  <li>
                        <p class="no-margin"><strong>Shipping:</strong> $<?php echo $ad['shipping_price']; ?> </p>
                      </li>
                      <li>
                        <p class=" no-margin "><strong>Condition:</strong> <?php echo $ad['condition_1']; ?> </p>
                      </li>

                    </ul>
                  </aside>
                  <div class="ads-action">
                    <ul class="list-border">
                      <li><a  href="#" > <i class=" fa fa-user"></i> More ads by User </a> </li>
                      <li><a  href="#" > <i class=" fa fa-heart"></i> Save ad </a> </li>
                      <li><a  href="#" > <i class="fa fa-share-alt"></i> Share ad </a> </li>
                      <li><a   href="#reportAdvertiser" data-toggle="modal"> <i class="fa icon-info-circled-alt"></i> Report abuse </a> </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="content-footer text-left"> <a class="btn  btn-default" data-toggle="modal" href="#contactAdvertiser"><i class=" icon-mail-2"></i> Send a message </a> <a class="btn  btn-info" ><i class=" icon-phone-1"></i> 01680 531 352 </a> </div>
            </div>
          </div>
          <!--/.ads-details-wrapper--> 
          
        </div>
        <!--/.page-content-->
        
        <div class="col-sm-3  page-sidebar-right">
          <aside>
            <div class="panel sidebar-panel panel-contact-seller">
              <div class="panel-heading">Contact Seller</div>
              <div class="panel-content user-info">
                <div class="panel-body text-center">
                  <div class="seller-info">
                    <h3 class="no-margin">Richard Aki</h3>
                    <p>Location: <strong>New York</strong></p>
                    <p> Joined: <strong>12 Mar 2009</strong></p>
                  </div>
                  <div class="user-ads-action"> <a href="#contactAdvertiser" data-toggle="modal" class="btn   btn-default btn-block"><i class=" icon-mail-2"></i> Send a message </a> <a class="btn  btn-info btn-block"><i class=" icon-phone-1"></i> 01680 531 352 </a> </div>
                <div class="user-ads-action">

				</div>
				
				
				<div class="user-ads-action">
	
				</div>
				<div class="user-ads-action">
		
				</div>
				
				
				
				</div>
              </div>
            </div>
			<div class="panel sidebar-panel">
              <div class="panel-heading">Condition Description</div>
              <div class="panel-content">
                <div class="panel-body text-left">
				<p><?php echo $ad['condition_desc']; ?></p>
                  <p><a class="pull-right" href="#"> Know more <i class="fa fa-angle-double-right"></i> </a></p>
                </div>
              </div>
            </div>
			
			
			
			
            <div class="panel sidebar-panel">
              <div class="panel-heading">Safety Tips for Buyers</div>
              <div class="panel-content">
                <div class="panel-body text-left">
                  <ul class="list-check">
                    <li> Meet seller at a public place </li>
                    <li> Check the item before you buy</li>
                    <li> Pay only after collecting the item</li>
                  </ul>
                  <p><a class="pull-right" href="#"> Know more <i class="fa fa-angle-double-right"></i> </a></p>
                </div>
              </div>
            </div>
            <!--/.categories-list--> 

			
			
			
          </aside>
        </div>
        <!--/.page-side-bar--> 
      </div>
    </div>
  </div>
  <!-- /.main-container -->
  
<?php echo $footer; ?>
</div>
<!-- /.wrapper --> 

<!-- Modal contactAdvertiser -->

<div class="modal fade" id="reportAdvertiser" tabindex="-1" role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" ><i class="fa icon-info-circled-alt"></i> There's something wrong with this  ads? </h4>
      </div>
      <div class="modal-body">
        <form role="form">
          <div class="form-group">
            <label for="report-reason" class="control-label">Reason:</label>
            <select name="report-reason" id="report-reason" class="form-control">
              <option value="">Select a reason</option>
              <option value="soldUnavailable">Item unavailable</option>
              <option value="fraud">Fraud</option>
              <option value="duplicate">Duplicate</option>
              <option value="spam">Spam</option>
              <option value="wrongCategory">Wrong category</option>
              <option value="other">Other</option>
            </select>
          </div>
          <div class="form-group">
            <label for="recipient-email" class="control-label">Your E-mail:</label>
            <input type="text"  name="email" maxlength="60" class="form-control" id="recipient-email">
          </div>
          <div class="form-group">
            <label for="message-text2" class="control-label">Message <span class="text-count">(300) </span>:</label>
            <textarea class="form-control" id="message-text2"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Send Report</button>
      </div>
    </div>
  </div>
</div>

<!-- /.modal --> 

<!-- Modal contactAdvertiser -->

<div class="modal fade" id="contactAdvertiser" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title"><i class=" icon-mail-2"></i> Contact advertiser </h4>
      </div>
      <div class="modal-body">
        <form role="form">
          <div class="form-group">
            <label for="recipient-name" class="control-label">Name:</label>
            <input class="form-control required" id="recipient-name" placeholder="Your name" data-placement="top" data-trigger="manual" data-content="Must be at least 3 characters long, and must only contain letters." type="text">
          </div>
          <div class="form-group">
            <label for="sender-email" class="control-label">E-mail:</label>
            <input id="sender-email" type="text" data-content="Must be a valid e-mail address (user@gmail.com)" data-trigger="manual" data-placement="top" placeholder="email@you.com" class="form-control email">
          </div>
          <div class="form-group">
            <label for="recipient-Phone-Number"  class="control-label">Phone Number:</label>
            <input type="text"  maxlength="60" class="form-control" id="recipient-Phone-Number">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Message <span class="text-count">(300) </span>:</label>
            <textarea class="form-control" id="message-text"  placeholder="Your message here.." data-placement="top" data-trigger="manual"></textarea>
          </div>
          <div class="form-group">
            <p class="help-block pull-left text-danger hide" id="form-error">&nbsp; The form is not valid. </p>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success pull-right">Send message!</button>
      </div>
    </div>
  </div>
</div>

<!-- /.modal --> 

<!-- Le javascript
================================================== --> 

<!-- Placed at the end of the document so the pages load faster --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"> </script><script src="assets/bootstrap/js/bootstrap.min.js"></script> 

<!-- include carousel slider plugin  --> 
<script src="assets/js/owl.carousel.min.js"></script> 

<!-- include equal height plugin  --> 
<script src="assets/js/jquery.matchHeight-min.js"></script> 

<!-- include jquery list shorting plugin plugin  --> 
<script src="assets/js/hideMaxListItem.js"></script> 

<!-- bxSlider Javascript file --> 
<script src="assets/plugins/bxslider/jquery.bxslider.min.js"></script> 
<script>
$('.bxslider').bxSlider({
  pagerCustom: '#bx-pager'
});


</script> 
<!-- include form-validation plugin || add this script where you need validation   --> 
<script src="assets/js/form-validation.js"></script> 
<!-- include jquery.fs plugin for custom scroller and selecter  --> 
<script src="assets/plugins/jquery.fs.scroller/jquery.fs.scroller.js"></script>
<script src="assets/plugins/jquery.fs.selecter/jquery.fs.selecter.js"></script>
<!-- include custom script for site  --> 
<script src="assets/js/script.js"></script>
</body>
</html>
