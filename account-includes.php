<?php
if(!$_SESSION["logged_in"] == 'yes'){
	header('Location: login_register.php');
}

ob_start();
?>
        <div class="col-sm-3 page-sidebar">
          <aside>
            <div class="inner-box">
              <div class="user-panel-sidebar">
                <div class="collapse-box">
                  <h5 class="collapse-title no-border"> My Account <a href="#MyClassified" data-toggle="collapse" class="pull-right"><i class="fa fa-angle-down"></i></a></h5>
                  <div class="panel-collapse collapse in" id="MyClassified">
                    <ul class="acc-list">
                      <li><a  href="account-home.html"><i class="icon-home"></i> Personal Home </a></li>
					  <li><a  href="seller-accounts.php"><i class="icon-home"></i> Seller Account </a></li>
					  <li><a  href="account-home.html"><i class="icon-home"></i> Address's </a></li>
					  <li><a  href="account-home.html"><i class="icon-home"></i> Order History </a></li>
                      
                    </ul>
                  </div>
                </div>
                <!-- /.collapse-box  -->
				                <div class="collapse-box">
                  <h5 class="collapse-title no-border"> Seller Account <a href="#MyClassified" data-toggle="collapse" class="pull-right"><i class="fa fa-angle-down"></i></a></h5>
                  <div class="panel-collapse collapse in" id="MyClassified">
                    <ul class="acc-list">
                      <li><a  href="account-payouts.php"><i class="icon-home"></i> Payouts </a></li>
					  <li><a  href="account-home.html"><i class="icon-home"></i> Shipping Address </a></li>
                    </ul>
                  </div>
                </div>
                <!-- /.collapse-box  -->
				
				
				
				
				
				
				
				
				
				
                <div class="collapse-box">
                  <h5 class="collapse-title"> My Ads <a href="#MyAds" data-toggle="collapse" class="pull-right"><i class="fa fa-angle-down"></i></a></h5>
                  <div class="panel-collapse collapse in" id="MyAds">
                    <ul class="acc-list">
					  <li><a href="messages.php"><i class="icon-docs"></i> Messages <span class="badge">42</span> </a></li>	
                      <li><a href="account-myads.html"><i class="icon-docs"></i> My ads <span class="badge">42</span> </a></li>
                      <li><a href="account-favourite-ads.html"><i class="icon-heart"></i> Favourite ads <span class="badge">42</span> </a></li>
                      <li><a href="account-saved-search.html"><i class="icon-star-circled"></i> Saved search <span class="badge">42</span> </a></li>
                      <li><a href="account-archived-ads.html"><i class="icon-folder-close"></i> Archived ads <span class="badge">42</span></a></li>
                      <li><a href="account-pending-approval-ads.html"><i class="icon-hourglass"></i> Pending approval <span class="badge">42</span></a></li>
                 
                    </ul>
                  </div>
                </div>
                <!-- /.collapse-box  -->
                
                <div class="collapse-box">
                  <h5 class="collapse-title"> Terminate Account <a href="#TerminateAccount" data-toggle="collapse" class="pull-right"><i class="fa fa-angle-down"></i></a></h5>
                  <div class="panel-collapse collapse in" id="TerminateAccount">
                    <ul class="acc-list">
                      <li><a href="account-close.html"><i class="icon-cancel-circled "></i> Close account </a></li>
                    </ul>
                  </div>
                </div>
                <!-- /.collapse-box  --> 
              </div>
            </div>
            <!-- /.inner-box  --> 
            
          </aside>
        </div>
        <!--/.page-sidebar-->
<?php
$account_sidebar = ob_get_clean();


?>