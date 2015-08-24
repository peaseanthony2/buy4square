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
<link href="assets/css/plugins/toastr/toastr.min.css" rel="stylesheet">
<script type="text/javascript" src="js/3rdparty/deployJava.js"></script>
<script type="text/javascript" src="js/qz-websocket.js"></script>
<script type="text/javascript" src="js/qz-print.js"></script>
<script type="text/javascript" src="js/3rdparty/html2canvas.js"></script>
<script type="text/javascript" src="js/3rdparty/jquery.plugin.html2canvas.js"></script>
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
            <h2 class="title-2 uppercase"><strong> <i class="icon-docs"></i> Shipping Label</strong> </h2>
            <div class="row">
              <div class="col-sm-12">
			  
			 
			  
			  
			  
			  
			  
			  
			  
			  <?php


require_once('includes/plugins/easypost-php-master/lib/easypost.php');

\EasyPost\EasyPost::setApiKey('kZvkSRX4nEqTN3ju6ybPmg');

$shipping_rate = $_POST['shipping_rate'];
$shipment_id = $_POST['shipment_id'];

$shipment = \EasyPost\Shipment::retrieve($shipment_id);
$shipment->buy(array('rate' => array('id' => $shipping_rate)));

$shipment->label(array('file_format' => 'pdf'));


?>
<div class="row">
<div class="col-xs-12 col-md-6">
 <p>Print your shipping label.</p>
<h2>Tracking Code</h2>
<p><?php echo $shipment->tracking_code ?></p>
</br>
</br>
</br>
<a href="<?php echo $shipment->postage_label->label_pdf_url ?>" target="_blank" style="text-decoration:none">
   <input type="button" value="PDF Label"/>
</a>
</br>
</br>
<a href="label-printer.php?label_url=<?php echo $shipment->postage_label->label_url ?>" target="_blank" style="text-decoration:none">
   <input type="button" value="Image Label"/>
</a>
</br>
</br>
</br>
<input type="button" onClick="findPrinter2()" value="Print to label printer"><br />
<p>You will need to download QZ Print to make this work.</p>
<input id="printer" type="text" value="zebra" size="15"><br />
<p>Enter the name of your label printer</p>
</div>
<div class="col-xs-12 col-md-6">
<img src="<?php echo $shipment->postage_label->label_url ?>" alt="shipping label" style="width:100%">
</div>

</div>
<?php
print $shipment;




?>
			  <script>
function printImage2(scaleImage) {
    if (notReady()) { return; }

    // Optional, set up custom page size.  These only work for PostScript printing.
    // setPaperSize() must be called before setAutoSize(), setOrientation(), etc.
    if (scaleImage) {
        qz.setPaperSize("4.0in", "6.0in");  // US Letter
        //qz.setPaperSize("210mm", "297mm");  // A4
        qz.setAutoSize(true);
        //qz.setOrientation("landscape");
        //qz.setOrientation("reverse-landscape");
    }

    //qz.setCopies(3);
    qz.setCopies('1');

    // Append our image (only one image can be appended per print)

	qz.appendImage("<?php echo $shipment->postage_label->label_url ?>");
    // Automatically gets called when "qz.appendImage()" is finished.
    window['qzDoneAppending'] = function() {
        // Tell the applet to print PostScript.
        qz.printPS();

        // Remove reference to this function
        window['qzDoneAppending'] = null;
    };
}
function findPrinter2(name) {
    // Get printer name from input box
    var p = document.getElementById('printer');
    if (name) {
        p.value = name;
    }

    if (isLoaded()) {
        // Searches for locally installed printer with specified name
        qz.findPrinter(p.value);

        // Automatically gets called when "qz.findPrinter()" is finished.
        window['qzDoneFinding'] = function() {
            var p = document.getElementById('printer');
            var printer = qz.getPrinter();
			if(printer !== null){
				printImage2();
			}
            // Alert the printer name to user
			toastr.success(printer !== null ? 'Printer found: "' + printer +
            '" after searching for "' + p.value + '"' : 'Printer "' +
            p.value + '" not found.');
            //alert(printer !== null ? 'Printer found: "' + printer +
            //'" after searching for "' + p.value + '"' : 'Printer "' +
            //p.value + '" not found.');

            // Remove reference to this function
            window['qzDoneFinding'] = null;
        };
    }
}
			  
			  </script>
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  

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


<!-- include carousel slider plugin  --> 
<script src="assets/js/owl.carousel.min.js"></script> 

<!-- include jquery.fs plugin for custom scroller and selecter  --> 
<script src="assets/plugins/toastr/toastr.min.js"></script> 
<script src="assets/plugins/jquery.fs.scroller/jquery.fs.scroller.js"></script>
<script src="assets/plugins/jquery.fs.selecter/jquery.fs.selecter.js"></script>
<!-- include custom script for site  --> 
<script src="assets/js/script.js"></script>
</body>
</html>
