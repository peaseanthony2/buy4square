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
  
  <div class="intro">
    <div class="dtable hw100">
      <div class="dtable-cell hw100">
        <div class="container text-center">
       <h1 class="intro-title animated fadeInDown"> Find Your Favourite Products </h1>
<p class="sub animateme fittext3 animated fadeIn"> Find the things you like in  Minutes </p>
          
          <div class="row search-row animated fadeInUp">
              <div class="col-lg-4 col-sm-4 search-col relative locationicon">
               <i class="icon-location-2 icon-append"></i>
                <input type="text" name="country" id="autocomplete-ajax"  class="form-control locinput input-rel searchtag-input has-icon" placeholder="City/Zipcode..." value="">

              </div>
              <div class="col-lg-4 col-sm-4 search-col relative"> <i class="icon-docs icon-append"></i>
                <input type="text" name="ads"  class="form-control has-icon" placeholder="I'm looking for a ..." value="">
              </div>
              <div class="col-lg-4 col-sm-4 search-col">
                <button class="btn btn-primary btn-search btn-block"><i class="icon-search"></i><strong>Find</strong></button>
              </div>
            </div>
          
        </div>
      </div>
    </div>
  </div>
  <!-- /.intro -->
  
  <div class="main-container">
    <div class="container">
      <div class="row">
        <div class="col-sm-9 page-content col-thin-right">
          <div class="inner-box category-content">
            <h2 class="title-2">Your Favorite Products </h2>
            <div class="row">   
              <div class="col-md-4 col-sm-4 ">
                <div class="cat-list">
                  <h3 class="cat-title"><a href="category.php"><i class="fa fa-car ln-shadow"></i> Automobiles <span class="count">277,959</span> </a>
                  
                  <span data-target=".cat-id-1" data-toggle="collapse" class="btn-cat-collapsed collapsed">   <span class=" icon-down-open-big"></span> </span>
                   </h3>
                  <ul class="cat-collapse collapse in cat-id-1">
                    <li> <a href="category.php">Car Parts &amp; Accessories</a> </li>
                    <li> <a href="category.php">Campervans &amp; Caravans</a> </li>
                    <li> <a href="category.php">Motorbikes &amp; Scooters</a> </li>
                    <li> <a href="category.php">Motorbike Parts &amp; Accessories</a> </li>
                    <li> <a href="category.php">Vans, Trucks &amp; Plant</a> </li>
                    <li> <a href="category.php">Wanted</a> </li>
                  </ul>
                </div>
                <div class="cat-list">
                  <h3 class="cat-title"><a href="category.php"><i class="icon-home ln-shadow"></i> Property <span class="count">228,705</span></a>     <span data-target=".cat-id-2" data-toggle="collapse" class="btn-cat-collapsed collapsed">   <span class=" icon-down-open-big"></span> </span></h3>
                  
               
                   
                  <ul class="cat-collapse collapse in cat-id-2">
                    <li> <a href="category.php">House for Rent</a></li>
                    <li> <a href="category.php">House for Sale </a></li>
                    <li> <a href="category.php"> Apartments For Sale </a></li>
                    <li> <a href="category.php">Apartments for Rent </a></li>
                    <li> <a href="category.php">Farms-Ranches </a></li>
                    <li> <a href="category.php">Land </a></li>
                    <li> <a href="category.php">Vacation Rentals </a></li>
                    <li> <a href="category.php">Commercial Building</a></li>
                  </ul>
                </div>
                <div class="cat-list">
                  <h3 class="cat-title"><a href="category.php"><i class="icon-home ln-shadow"></i> Jobs <span class="count">6375</span></a> 
                  
                    <span data-target=".cat-id-3" data-toggle="collapse" class="btn-cat-collapsed collapsed">   <span class=" icon-down-open-big"></span> </span>
                  </h3>
                   <ul class="cat-collapse collapse in cat-id-3">
                    <li> <a href="category.php">Full Time Jobs</a></li>
                    <li> <a href="category.php">Internet Jobs </a></li>
                    <li> <a href="category.php">Learn &amp; Earn jobs </a></li>
                    <li> <a href="category.php"> Manual Labor Jobs </a></li>
                    <li> <a href="category.php">Other Jobs </a></li>
                    <li> <a href="category.php">OwnBusiness </a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-4 col-sm-4">
                <div class="cat-list">
                  <h3 class="cat-title"><a href="category.php"><i class="fa fa-briefcase ln-shadow"></i> Services <span class="count">45,526</span></a>
                    <span data-target=".cat-id-4" data-toggle="collapse" class="btn-cat-collapsed collapsed">   <span class=" icon-down-open-big"></span> </span>
                  </h3>
                   <ul class="cat-collapse collapse in cat-id-4">
                    <li> <a href="category.php">Building, Home &amp; Removals</a> </li>
                    <li> <a href="category.php">Entertainment</a> </li>
                    <li> <a href="category.php">Health &amp; Beauty</a> </li>
                    <li> <a href="category.php">Miscellaneous</a> </li>
                    <li> <a href="category.php">Property &amp; Shipping</a> </li>
                    <li> <a href="category.php">Tax, Money &amp; Visas</a> </li>
                    <li> <a href="category.php">Telecoms &amp; Computers</a> </li>
                    <li> <a href="category.php">Travel Services &amp; Tours</a> </li>
                    <li> <a href="category.php">Tuition &amp; Lessons</a> </li>
                  </ul>
                </div>
                <div class="cat-list">
                  <h3 class="cat-title"><a href="category.php"><i class="icon-book-open ln-shadow"></i> Learning <span class="count">26,529</span></a>       <span data-target=".cat-id-5" data-toggle="collapse" class="btn-cat-collapsed collapsed">   <span class=" icon-down-open-big"></span> </span>
                  </h3>
                   <ul class="cat-collapse collapse in cat-id-5">
                    <li> <a href="category.php"> Automotive Classes </a> </li>
                    <li> <a href="category.php"> Computer Multimedia Classes </a> </li>
                    <li> <a href="category.php"> Sports Classes </a> </li>
                    <li> <a href="category.php"> Home Improvement Classes </a> </li>
                    <li> <a href="category.php"> Language Classes </a> </li>
                    <li> <a href="category.php"> Music Classes </a> </li>
                    <li> <a href="category.php"> Personal Fitness </a> </li>
                    <li> <a href="category.php"> Other Classes </a> </li>
                  </ul>
                </div>
                <div class="cat-list">
                  <h3 class="cat-title"><a href="category.php"><i class="icon-guidedog ln-shadow"></i> Pets <span class="count">42,111</span></a>   <span data-target=".cat-id-6" data-toggle="collapse" class="btn-cat-collapsed collapsed">   <span class=" icon-down-open-big"></span> </span>
                  </h3>
                   <ul class="cat-collapse collapse in cat-id-6">
                    <li> <a href="category.php">Pets for Sale</a> </li>
                    <li> <a href="category.php">Petsitters &amp; Dogwalkers</a> </li>
                    <li> <a href="category.php">Equipment &amp; Accessories</a> </li>
                    <li> <a href="category.php">Missing, Lost &amp; Found</a> </li>
                  </ul>
                </div>
              </div>
              <div class="col-md-4 col-sm-4   last-column">
                <div class="cat-list">
                  <h3 class="cat-title"><a href="category.php"><i class=" icon-basket-1 ln-shadow"></i> For Sale <span class="count">64,526</span></a>    <span data-target=".cat-id-7" data-toggle="collapse" class="btn-cat-collapsed collapsed">   <span class=" icon-down-open-big"></span> </span>
                  </h3>
                   <ul class="cat-collapse collapse in cat-id-7">
                    <li> <a href="category.php">Audio &amp; Stereo</a> </li>
                    <li> <a href="category.php">Baby &amp; Kids Stuff</a> </li>
                    <li> <a href="category.php">CDs, DVDs, Games &amp; Books</a> </li>
                    <li> <a href="category.php">Clothes, Footwear &amp; Accessories</a> </li>
                    <li> <a href="category.php">Computers &amp; Software</a> </li>
                    <li> <a href="category.php">Home &amp; Garden</a> </li>
                    <li> <a href="category.php">Music &amp; Instruments</a> </li>
                    <li> <a href="category.php">Office Furniture &amp; Equipment</a> </li>
                    <li> <a href="category.php">Phones, Mobile Phones &amp; Telecoms</a> </li>
                    <li> <a href="category.php">Sports, Leisure &amp; Travel</a> </li>
                    <li> <a href="category.php">Tickets</a> </li>
                    <li> <a href="category.php">TV, DVD &amp; Cameras</a> </li>
                    <li> <a href="category.php">Video Games &amp; Consoles</a> </li>
                    <li> <a href="category.php">Freebies</a> </li>
                    <li> <a href="category.php">Miscellaneous Goods</a> </li>
                    <li> <a href="category.php">Stuff Wanted</a> </li>
                    <li> <a href="category.php">Swap Shop</a> </li>
                  </ul>
                </div>
                <div class="cat-list ">
                  <h3 class="cat-title"><a href="category.php"><i class=" icon-theatre ln-shadow"></i> Community <span class="count">5,30</span> </a>   <span data-target=".cat-id-8" data-toggle="collapse" class="btn-cat-collapsed collapsed">   <span class=" icon-down-open-big"></span> </span>
                  </h3>
                   <ul class="cat-collapse collapse in cat-id-8">
                    <li> <a href="category.php">Announcements </a> </li>
                    <li> <a href="category.php">Car Pool - Bike Ride </a> </li>
                    <li> <a href="category.php">Charity - Donate - NGO </a> </li>
                    <li> <a href="category.php">Lost - Found </a> </li>
                    <li> <a href="category.php">Tender Notices </a> </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="inner-box relative">
            <h2 class="title-2">Featured Listings 
            
                        <a id="nextItem" class="link  pull-right carousel-nav"> <i class="icon-right-open-big"></i></a>
             <a id="prevItem" class="link pull-right carousel-nav"> <i class="icon-left-open-big"></i> </a>

            </h2>
            <div class="row">
              <div class="col-lg-12">
                <div class="no-margin item-carousel owl-carousel owl-theme">
                  <div class="item"> <a href="ads-details.html">
                     <span class="item-carousel-thumb"> 
                    	<img class="img-responsive" src="images/item/tp/Image00011.jpg" alt="img" >
                     </span> 
                     <span class="item-name"> Lorem ipsum dolor sit amet </span> 
                     <span class="price"> $ 260 </span>
                 </a> 
                 </div>
                 
                    <div class="item"> <a href="ads-details.html">
                 <span class="item-carousel-thumb"> <img class="item-img" src="images/item/tp/Image00006.jpg" alt="img" > </span>
                 <span class="item-name"> consectetuer adipiscing elit </span>
                  <span class="price"> $ 240 </span></a> </div>
                 
                 
                    <div class="item"><a href="ads-details.html">
                 <span class="item-carousel-thumb"> <img class="item-img" src="images/item/tp/Image00022.jpg" alt="img" > </span> <span class="item-name"> sed diam nonummy  </span> <span class="price"> $ 140</span></a></div>
               
                    <div class="item"><a href="ads-details.html">
                 <span class="item-carousel-thumb"> <img class="item-img" src="images/item/tp/Image00013.jpg" alt="img" >  </span><span class="item-name"> feugiat nulla facilisis  </span> <span class="price"> $ 140 </span></a></div>
                 
                    <div class="item"><a href="ads-details.html">
                 <span class="item-carousel-thumb"> <img class="item-img" src="images/item/FreeGreatPicture.com-46404-google-drops-nexus-4-by-100-offers-15-day-price-protection-refund.jpg" alt="img" > </span> <span class="item-name"> praesent luptatum zzril  </span> <span class="price"> $ 220 </span></a></div>
                  
                    <div class="item"><a href="ads-details.html">
                 <span class="item-carousel-thumb"> <img class="item-img"  src="images/item/FreeGreatPicture.com-46405-google-drops-price-of-nexus-4-smartphone.jpg" alt="img" > </span> <span class="item-name"> delenit augue duis dolore  </span> <span class="price"> $ 120 </span></a></div>
                 
                    <div class="item"><a href="ads-details.html">
                 <span class="item-carousel-thumb"> <img class="item-img" src="images/item/FreeGreatPicture.com-46407-nexus-4-starts-at-199.jpg" alt="img" > </span> <span class="item-name"> te feugait nulla facilisi </span> <span class="price"> $ 251 </span></a></div>
                </div>
              </div>
            </div>
            
            
             </div>
          <div class="inner-box relative">
            <div class="row">
              <div class="col-md-5">
                <div>
                  <h3 class="title-2"> <i class="icon-location-2"></i> Popular locations  </h3>
                <div class="row">   <ul class="cat-list col-xs-6">
                    <li> <a href="category.php">Atlanta</a></li>
                    <li> <a href="category.php">Wichita </a></li>
                    <li> <a href="category.php"> Anchorage </a></li>
                    <li> <a href="category.php"> Dallas  </a></li>
                    <li> <a href="category.php"> New York  </a></li>
                    <li> <a href="category.php">Santa Ana/Anaheim </a></li>
                    <li> <a href="category.php"> Miami  </a></li>
                    <li> <a href="category.php">Los Angeles</a></li>
                  </ul>
                  
                 <ul class="cat-list cat-list-border col-xs-6">
                     <li> <a href="category.php">Virginia Beach  </a></li>
                    <li> <a href="category.php"> San Diego   </a></li>
                    <li> <a href="category.php">Boston </a></li>
                    <li> <a href="category.php">Houston</a></li>
                    <li> <a href="category.php">Salt Lake City </a></li>
                    <li> <a href="category.php">San Francisco  </a></li>
                    <li> <a href="category.php">Tampa   </a></li>
                    <li> <a href="category.php"> Washington DC   </a></li>
                
                  </ul></div>
                  
                </div>
              </div>
              <div class="col-md-7 ">
                <h3 class="title-2"> <i class="icon-search-1"></i> Popular Makes </h3>
                <div class="row">
                  <ul class="cat-list col-md-4 col-xs-4 col-xxs-6">
                    <li> <a href="category.php">free </a></li>
                    <li> <a href="category.php">furniture </a></li>
                    <li> <a href="category.php">general </a></li>
                    <li> <a href="category.php">household </a></li>
                    <li> <a href="category.php">jewelry </a></li>
                    <li> <a href="category.php">materials </a></li>
                    <li> <a href="category.php">sporting </a></li>
                    <li> <a href="category.php">tickets </a></li>
                  </ul>
                  <ul class="cat-list col-md-4 col-xs-4 col-xxs-6">
                    <li> <a href="category.php">tools </a></li>
                    <li> <a href="category.php">wanted </a></li>
                    <li> <a href="category.php">cell phones </a></li>
                    <li> <a href="category.php">clothes+acc </a></li>
                    <li> <a href="category.php">collectibles </a></li>
                    <li> <a href="category.php">electronics </a></li>
                    <li> <a href="category.php">farm+garden </a></li>
                    <li> <a href="category.php">garage sale </a></li>
                  </ul>
                  <ul class="cat-list col-md-4 col-xs-4 col-xxs-6">
                    <li> <a href="category.php">heavy equip </a></li>
                    <li> <a href="category.php">motorcycles </a></li>
                    <li> <a href="category.php">music instr </a></li>
                    <li> <a href="category.php">photo+video </a></li>
                    <li> <a href="category.php">appliances </a></li>
                    <li> <a href="category.php">Land </a></li>
                    <li> <a href="category.php">arts+crafts </a></li>
                    <li> <a href="category.php">auto parts </a></li>
                  </ul>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3 page-sidebar col-thin-left">
          <aside>
            <div class="inner-box no-padding">
              <div class="inner-box-content"> <a href="#"><img class="img-responsive" src="images/site/app.jpg" alt="tv"></a> </div>
            </div>
            <div class="inner-box">
              <h2 class="title-2">Popular Categories </h2>
              <div class="inner-box-content">
                <ul class="cat-list arrow">
                  <li> <a href="sub-category-sub-location.html"> Apparel (1,386) </a></li>
                  <li> <a href="sub-category-sub-location.html"> Art (1,163) </a></li>
                  <li> <a href="sub-category-sub-location.html"> Business Opportunities (4,974) </a></li>
                  <li> <a href="sub-category-sub-location.html"> Community and Events (1,258) </a></li>
                  <li> <a href="sub-category-sub-location.html"> Electronics and Appliances (1,578) </a></li>
                  <li> <a href="sub-category-sub-location.html"> Jobs and Employment (3,609) </a></li>
                  <li> <a href="sub-category-sub-location.html"> Motorcycles (968) </a></li>
                  <li> <a href="sub-category-sub-location.html"> Pets (1,188) </a></li>
                  <li> <a href="sub-category-sub-location.html"> Services (7,583) </a></li>
                  <li> <a href="sub-category-sub-location.html"> Vehicles (1,129) </a></li>
                </ul>
              </div>
            </div>
            
  
          </aside>
        </div>
      </div>
    </div>
  </div>
  <!-- /.main-container -->
  
  <div class="page-info" style="background: url(images/bg.jpg); background-size:cover">
    <div class="container text-center section-promo"> 
    	<div class="row">
        	<div class="col-sm-3 col-xs-6 col-xxs-12">
                <div class="iconbox-wrap">
                          <div class="iconbox">
                            <div class="iconbox-wrap-icon">
                            <i class="icon  icon-group"></i>
                            </div>
                            <div class="iconbox-wrap-content">
                              <h5><span>2200</span> </h5>
                              <div  class="iconbox-wrap-text">Trusted Seller</div>
                            </div>
                          </div>
  							<!-- /..iconbox -->
                     </div><!--/.iconbox-wrap-->
            </div>
            
            <div class="col-sm-3 col-xs-6 col-xxs-12">
            	<div class="iconbox-wrap">
                          <div class="iconbox">
                            <div class="iconbox-wrap-icon">
                            <i class="icon  icon-th-large-1"></i>
                            </div>
                            <div class="iconbox-wrap-content">
                              <h5><span>100</span> </h5>
                              <div  class="iconbox-wrap-text">Categories</div>
                            </div>
                          </div>
  							<!-- /..iconbox -->
                     </div><!--/.iconbox-wrap-->
            </div>
            
            <div class="col-sm-3 col-xs-6  col-xxs-12">
            	<div class="iconbox-wrap">
                          <div class="iconbox">
                            <div class="iconbox-wrap-icon">
                            <i class="icon  icon-map"></i>
                            </div>
                            <div class="iconbox-wrap-content">
                              <h5><span>700</span> </h5>
                              <div  class="iconbox-wrap-text">Location</div>
                            </div>
                          </div>
  							<!-- /..iconbox -->
                     </div><!--/.iconbox-wrap-->
            </div>
            
            <div class="col-sm-3 col-xs-6 col-xxs-12">
            	<div class="iconbox-wrap">
                          <div class="iconbox">
                            <div class="iconbox-wrap-icon">
                            <i class="icon icon-facebook"></i>
                            </div>
                            <div class="iconbox-wrap-content">
                              <h5><span>50,000</span> </h5>
                              <div  class="iconbox-wrap-text"> Facebook Fans</div>
                            </div>
                          </div>
  							<!-- /..iconbox -->
                     </div><!--/.iconbox-wrap-->
            </div>
            
        </div>
    
    </div>
  </div>
  <!-- /.page-info -->
  
  <div class="page-bottom-info">
      <div class="page-bottom-info-inner">
      
      	<div class="page-bottom-info-content text-center">
        	<h1>If you have any questions, comments or concerns, please call the Classified Advertising department at (000) 555-5555</h1>
            <a class="btn  btn-lg btn-primary-dark" href="tel:+000000000">
            <i class="icon-mobile"></i> <span class="hide-xs color50">Call Now:</span> (000) 555-5555   </a>
        </div>
      
      </div>
  </div>

  
<?php echo $footer; ?>
  <!-- /.footer --> 
</div>
<!-- /.wrapper --> 

<!-- Le javascript
================================================== --> 

<!-- Placed at the end of the document so the pages load faster --> 
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"> </script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script> 

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




<!-- include jquery autocomplete plugin  -->

<script type="text/javascript" src="assets/plugins/autocomplete/jquery.mockjax.js"></script>
<script type="text/javascript" src="assets/plugins/autocomplete/jquery.autocomplete.js"></script>
<script type="text/javascript" src="assets/plugins/autocomplete/usastates.js"></script>

<script type="text/javascript" src="assets/plugins/autocomplete/autocomplete-demo.js"></script>



</body>
</html>
