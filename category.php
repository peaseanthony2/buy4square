<?php
require('header.php');

	$query_catagories = "SELECT product_types.f1 AS cat_name, product_types.unid AS cat_unid,  COUNT(products.f1) AS count

FROM product_types LEFT JOIN products ON product_types.unid = products.f1

GROUP BY product_types.unid";
$result_catagories = mysql_query($query_catagories);
if (!$result_catagories) {
  die('Invalid query: ' . mysql_error());
}

	$query_conditions = "SELECT * FROM website_conditions";
$result_conditions = mysql_query($query_conditions);
if (!$result_conditions) {
  die('Invalid query: ' . mysql_error());
}
	$query_ads = "SELECT * FROM website_ad_start_stop";
$result_ads = mysql_query($query_ads);
if (!$result_ads) {
  die('Invalid query: ' . mysql_error());
}




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
        <div class="col-sm-3 page-sidebar">
          <aside>
            <div class="inner-box">
              <div class="categories-list  list-filter">
                <h5 class="list-title"><strong><a href="#">All Categories</a></strong></h5>
                <ul class=" list-unstyled">
				
				
				<?php while ($row_catagories = @mysql_fetch_assoc($result_catagories)){ ?>
				
				
                  <li><a href="category.php?cat_id=<?php echo $row_catagories['cat_unid']; ?>"><span class="title"><?php echo $row_catagories['cat_name']; ?></span><span class="count">&nbsp;<?php echo $row_catagories['count']; ?></span></a> </li>
				  <?php } ?>
                </ul>
              </div>
              <!--/.categories-list-->
              
             <!--/.  <div class="locations-list  list-filter">
                <h5 class="list-title"><strong><a href="#">Location</a></strong></h5>
                <ul class="browse-list list-unstyled long-list">
                  <li> <a href="sub-category-sub-location.html">New York</a></li>
                  <li> <a href="sub-category-sub-location.html">South West</a></li>
                  <li> <a href="sub-category-sub-location.html">South East</a></li>
                  <li> <a href="sub-category-sub-location.html">East England</a></li>
                  <li> <a href="sub-category-sub-location.html">East Midlands</a></li>
                  <li> <a href="sub-category-sub-location.html">West Midlands</a></li>
                  <li> <a href="sub-category-sub-location.html">North East</a></li>
                  <li> <a href="sub-category-sub-location.html">North West</a></li>
                  <li> <a href="sub-category-sub-location.html">Scotland</a></li>
                  <li> <a href="sub-category-sub-location.html">Wales</a></li>
                  <li> <a href="sub-category-sub-location.html">Northern Ireland</a></li>
                  <li> <a href="sub-category-sub-location.html">England</a></li>
                  <li> <a href="sub-category-sub-location.html">UK</a></li>
                  <li> <a href="sub-category-sub-location.html"> Other Locations </a></li>
                </ul>
              </div>
              <!--/.locations-list-->
              
              <div class="locations-list  list-filter">
                <h5 class="list-title"><strong><a href="#">Price range</a></strong></h5>
                <form role="form" class="form-inline ">
                  <div class="form-group col-sm-4 no-padding">
                    <input type="text" placeholder="$ 2000 " id="minPrice" class="form-control">
                  </div>
                  <div class="form-group col-sm-1 no-padding text-center"> - </div>
                  <div class="form-group col-sm-4 no-padding">
                    <input type="text" placeholder="$ 3000 " id="maxPrice" class="form-control">
                  </div>
                  <div class="form-group col-sm-3 no-padding">
                    <button class="btn btn-default pull-right" type="submit">GO</button>
                  </div>
                </form>
                <div style="clear:both"></div>
              </div><!--/.list-filter-->
             <!--/.  <div class="locations-list  list-filter">
                <h5 class="list-title"><strong><a href="#">Seller</a></strong></h5>
                <ul class="browse-list list-unstyled long-list">
                  <li> <a href="sub-category-sub-location.html"><strong>All Ads</strong> <span class="count">228,705</span></a></li>
                  <li> <a href="sub-category-sub-location.html">Business <span class="count">28,705</span></a></li>
                  <li> <a href="sub-category-sub-location.html">Personal <span class="count">18,705</span></a></li>
                </ul>
              </div><!--/.list-filter-->
              <div class="locations-list  list-filter">
                <h5 class="list-title"><strong><a href="#">Condition</a></strong></h5>
                <ul class="browse-list list-unstyled long-list">
					<?php while ($row_conditions = @mysql_fetch_assoc($result_conditions)){ ?>
                  <li> <a href="categories.php"><?php echo $row_conditions['cond_name']; ?> <span class="count"></span></a></li>

					<?php } ?>
                </ul>
              </div><!--/.list-filter-->
              <div style="clear:both"></div>
            </div>
            
            <!--/.categories-list--> 
          </aside>
        </div>
        <!--/.page-side-bar-->
        <div class="col-sm-9 page-content col-thin-left">
        
          <div class="category-list">
            <div class="tab-box "> 
              
              <!-- Nav tabs -->
             <!--   <ul class="nav nav-tabs add-tabs" role="tablist">
                <li class="active"><a href="#allAds" role="tab" data-toggle="tab">All Ads <span class="badge">228,705</span></a></li>
                <li><a href="#businessAds" role="tab" data-toggle="tab">Business <span class="badge">228,705</span></a></li>
                <li><a href="#Personal" role="tab" data-toggle="tab">Personal <span class="badge">228,705</span></a></li>
              </ul> -->
              <div class="tab-filter">
                <select class="selectpicker" data-style="btn-select" data-width="auto">
                  <option>Short by</option>
                  <option>Price: Low to High</option>
                  <option>Price: High to Low</option>
                </select>
              </div>
            </div>
            <!--/.tab-box-->
            
            <div class="listing-filter">
              <div class="pull-left col-xs-6">
                <div class="breadcrumb-list"> <a href="#" class="current"> <span>All ads</span></a> in New York <a href="#selectRegion" id="dropdownMenu1"  data-toggle="modal"> <span class="caret"></span> </a> </div>
              </div>
              <div class="pull-right col-xs-6 text-right listing-view-action"> <span class="list-view active"><i class="  icon-th"></i></span> <span class="compact-view"><i class=" icon-th-list  "></i></span> <span class="grid-view "><i class=" icon-th-large "></i></span> </div>
              <div style="clear:both"></div>
            </div>
            <!--/.listing-filter-->
            <div class="adds-wrapper">
			
			
	
			  
			  <?php while ($row_ads = @mysql_fetch_assoc($result_ads)){ 
			  $pic_url = preg_replace("/^http:/i", "https:", $row_ads['default_pic_url']);
			  ?>
			  
			              <!--/.item-list-->
              <div class="item-list">
                <div class="col-sm-2 no-padding photobox">
                  <div class="add-image"> <span class="photo-count"><i class="fa fa-camera"></i> <?php echo $row_ads['num_of_pics']; ?> </span> <a href="ads-details.?ad_id=<?php echo $row_ads['ad_unid']; ?>"><img class="thumbnail no-margin" src="<?php echo $pic_url; ?>" alt="img"></a> </div>
                </div>
                <!--/.photobox-->
                <div class="col-sm-7 add-desc-box">
                  <div class="add-details">
                    <h5 class="add-title"> <a href="ads-details.php?ad_id=<?php echo $row_ads['ad_unid']; ?>"> <?php echo $row_ads['ad_title']; ?>  </a> </h5>
                    <span class="info-row"> <span class="add-type business-ads tooltipHere" data-toggle="tooltip" data-placement="right" title="Business Ads">B </span> <span class="date"><i class=" icon-clock"> </i> Today 1:21 pm </span> - <span class="category"><?php echo $row_ads['item_cond_1']; ?> </span>- <span class="item-location"><i class="fa fa-map-marker"></i> <?php echo $row_ads['city']; ?>, <?php echo $row_ads['state']; ?></span> </span> </div>
                </div>
                <!--/.add-desc-box-->
                <div class="col-sm-3 text-right  price-box">
                  <h2 class="item-price"> $ <?php echo $row_ads['price']; ?> </h2>
                  <a class="btn btn-default  btn-sm make-favorite"> <i class="fa fa-heart"></i> <span>Save</span> </a> </div>
                <!--/.add-desc-box--> 
              </div>
              <!--/.item-list--> 
			  
			  
			  <?php } ?>
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
 
              <!--/.item-list-->
              <div class="item-list">
                <div class="col-sm-2 no-padding photobox">
                  <div class="add-image"> <span class="photo-count"><i class="fa fa-camera"></i> 2 </span> <a href="ads-details.php"><img class="thumbnail no-margin" src="images/item/FreeGreatPicture.com-46405-google-drops-price-of-nexus-4-smartphone.jpg" alt="img"></a> </div>
                </div>
                <!--/.photobox-->
                <div class="col-sm-7 add-desc-box">
                  <div class="add-details">
                    <h5 class="add-title"> <a href="ads-details.php"> Google drops Nexus 4 by $100, offers 15 day price protection refund  </a> </h5>
                    <span class="info-row"> <span class="add-type business-ads tooltipHere" data-toggle="tooltip" data-placement="right" title="Business Ads">B </span> <span class="date"><i class=" icon-clock"> </i> Today 1:21 pm </span> - <span class="category">Electronics </span>- <span class="item-location"><i class="fa fa-map-marker"></i> New York </span> </span> </div>
                </div>
                <!--/.add-desc-box-->
                <div class="col-sm-3 text-right  price-box">
                  <h2 class="item-price"> $ 150 </h2>
                  <a class="btn btn-default  btn-sm make-favorite"> <i class="fa fa-heart"></i> <span>Save</span> </a> </div>
                <!--/.add-desc-box--> 
              </div>
              <!--/.item-list--> 
              
              
           
           
            </div> <!--/.adds-wrapper-->
            
            <div class="tab-box  save-search-bar text-center"> <a href=""> <i class=" icon-star-empty"></i> Save Search </a> </div>
          </div>
          <div class="pagination-bar text-center">
            <ul class="pagination">
              <li  class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#"> ...</a></li>
              <li><a class="pagination-btn" href="#">Next &raquo;</a></li>
            </ul>
          </div>
          <!--/.pagination-bar -->
          
          <div class="post-promo text-center">
            <h2> Do you get anything for sell ? </h2>
            <h5>Sell your products online FOR FREE. It's easier than you think !</h5>
            <a href="post-ads.html" class="btn btn-lg btn-border btn-post btn-danger">Post a Free Ad </a></div>
          <!--/.post-promo--> 
          
        </div>
        <!--/.page-content--> 
        
      </div>
    </div>
  </div>
  <!-- /.main-container -->
  
<?php echo $footer; ?>
</div>
<!-- /.wrapper --> 

<!-- Modal Change City -->

<div class="modal fade" id="selectRegion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class=" icon-map"></i> Select your region </h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <p>Popular cities in <strong>UK</strong></p>
            <hr class="hr-thin">
          </div>
          <div class="col-md-4">
            <ul  class="list-link list-unstyled">
              <li> <a  href="#">New York </a> </li>
              <li> <a  href="#">Bristol </a> </li>
              <li> <a  href="#">New York </a> </li>
              <li> <a  href="#">Kent </a> </li>
              <li> <a  href="#">Essex </a> </li>
              <li> <a href="#">Lancashire </a> </li>
              <li> <a href="#">Bedfordshire </a> </li>
              <li> <a href="#">Berkshire </a> </li>
              <li> <a href="#">Buckinghamshire </a> </li>
              <li> <a href="#">Cambridgeshire </a> </li>
              <li> <a href="#">Cheshire </a> </li>
              <li> <a href="#">Cornwall </a> </li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-link list-unstyled">
              <li> <a  href="#">County Durham </a> </li>
              <li> <a  href="#">Cumbria </a> </li>
              <li> <a  href="#">Derbyshire </a> </li>
              <li> <a  href="#">Devon </a> </li>
              <li> <a  href="#">Dorset </a> </li>
              <li> <a  href="#">East Yorkshire </a> </li>
              <li> <a  href="#">East Sussex </a> </li>
              <li> <a  href="#">Gloucestershire </a> </li>
              <li> <a  href="#">Hampshire </a> </li>
              <li> <a  href="#">Herefordshire </a> </li>
              <li> <a  href="#">Hertfordshire </a> </li>
              <li> <a  href="#">Isle of Wight </a> </li>
              <li> <a  href="#">Leicestershire </a> </li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-link list-unstyled">
              <li> <a  href="#">County Durham </a> </li>
              <li> <a  href="#">Cumbria </a> </li>
              <li> <a  href="#">Derbyshire </a> </li>
              <li> <a  href="#">Devon </a> </li>
              <li> <a  href="#">Dorset </a> </li>
              <li> <a  href="#">East Yorkshire </a> </li>
              <li> <a  href="#">East Sussex </a> </li>
              <li> <a  href="#">Gloucestershire </a> </li>
              <li> <a  href="#">Hampshire </a> </li>
              <li> <a  href="#">Herefordshire </a> </li>
              <li> <a  href="#">Hertfordshire </a> </li>
              <li> <a  href="#">Isle of Wight </a> </li>
              <li> <a  href="#">Leicestershire </a> </li>
            </ul>
          </div>
        </div>
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

<!-- include jquery.fs plugin for custom scroller and selecter  --> 
<script src="assets/plugins/jquery.fs.scroller/jquery.fs.scroller.js"></script>
<script src="assets/plugins/jquery.fs.selecter/jquery.fs.selecter.js"></script>
<!-- include custom script for site  --> 
<script src="assets/js/script.js"></script>
</body>
</html>
