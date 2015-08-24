<?php
require('header.php');
require('account-includes.php');
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
			  
			   <ul class="nav nav-tabs">
          <li class="active"><a href="#Tab1" data-toggle="tab">Personal</a></li>
          <li><a href="#Tab2" data-toggle="tab">Adresses</a></li>
          <li><a href="#Tab3" data-toggle="tab">Banks</a></li>
		  <li><a href="#Tab3" data-toggle="tab">Credit Cards</a></li>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="Tab1">
          <p> <strong>..content 2</strong> </p>
          </div>
          
          <div class="tab-pane" id="Tab2">
            <p> <strong>..content 2</strong> </p>
          </div>
          
           <div class="tab-pane" id="Tab3">
            <p> <strong>..content 3</strong> </p>
          </div>
        </div> <!-- /.tab content -->

			  
			  
			  
			  
			  
            <div id="accordion" class="panel-group">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"> <a href="#collapseB1"  data-toggle="collapse"> My details </a> </h4>
                </div>
                <div class="panel-collapse collapse in" id="collapseB1">
                  <div class="panel-body">
                    <form class="form-horizontal" role="form">
                      <div class="form-group">
                        <label  class="col-sm-3 control-label">First Name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control"  placeholder="<?php echo $_SESSION["user_firstname"]; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label  class="col-sm-3 control-label">Last name</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" placeholder="<?php echo $_SESSION["user_lastname"]; ?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label  class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control"  placeholder="jhon.deo@example.com">
                        </div>
                      </div>
                      <div class="form-group">
                        <label  class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control"  placeholder="..">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="Phone" class="col-sm-3 control-label">Phone</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="Phone" placeholder="880 124 9820">
                        </div>
                      </div>
                      <div class="form-group">
                        <label  class="col-sm-3 control-label">Postcode</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control"  placeholder="1217">
                        </div>
                      </div>
                      
                      <div class="form-group"> <!-- remove it if dont need this part -->
                        <label  class="col-sm-3 control-label">Facebook account map</label>
                        <div class="col-sm-9">
                          <div class="form-control"> <a class="link" href="fb.com">Jhone.doe</a> <a class=""> <i class="fa fa-minus-circle"></i></a> </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9"> </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                          <button type="submit" class="btn btn-default">Update</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"> <a href="#collapseB2"  data-toggle="collapse"> Settings </a> </h4>
                </div>
                <div class="panel-collapse collapse" id="collapseB2">
                  <div class="panel-body">
                    <form class="form-horizontal" role="form">
                      <div class="form-group">
                        <div class="col-sm-12">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox">
                              Comments are enabled on my ads </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label  class="col-sm-3 control-label">New Password</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control"  placeholder="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label  class="col-sm-3 control-label">Confirm Password</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control"  placeholder="">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                          <button type="submit" class="btn btn-default">Update</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title"> <a href="#collapseB3"  data-toggle="collapse"> Preferences </a> </h4>
                </div>
                <div class="panel-collapse collapse" id="collapseB3">
                  <div class="panel-body">
                    <div class="form-group">
                      <div class="col-sm-12">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox">
                            I want to receive newsletter. </label>
                        </div>
                        <div class="checkbox">
                          <label>
                            <input type="checkbox">
                            I want to receive advice on buying and selling. </label>
                        </div>
                      </div>
                    </div>
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
