<?php
$isSecure = false;
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
    $isSecure = true;
}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on') {
    $isSecure = true;
}
$REQUEST_PROTOCOL = $isSecure ? 'https' : 'http';
if ($isSecure  == false) {
	$own_websie_url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    header("Location: $own_websie_url");
    exit;
}
require("includes/db_info.php");
session_start();



if(isset($_GET['edit_unid'])){
	$edit_unid = $_GET['edit_unid'];
	$blank_form = 'no';
} else {
	$blank_form = 'yes';
}
if(isset($_GET['delete_unid'])){
	$delete_unid = $_GET['delete_unid'];
}

if(isset($_POST['edit_unid'])){
	$edit_unid = $_POST['edit_unid'];
}
if(isset($_POST['delete_unid'])){
	$delete_unid = $_POST['delete_unid'];
}



if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"] == 'yes')
{
$user_logged_in = $_SESSION["logged_in"];
$user_tmp_password = $_SESSION["user_tmp_password"];
$user_username = $_SESSION["user_username"];
$user_unid = $_SESSION["user_unid"];
$user_first_name = $_SESSION["user_first_name"];
$user_last_name = $_SESSION["user_last_name"];
$user__has_stripe_account = $_SESSION["has_seller_account"];
$user_stripe_account = $_SESSION["user_stripe_account"];



$has_seller_account = $_SESSION["has_seller_account"];
$has_selected_seller_account = $_SESSION["has_selected_seller_account"];
$seller_account = $_SESSION["seller_account"];
$seller_api_key = $_SESSION["seller_api_key"];


	$login_username = '<li><a href="logout.php">Signout <i class="glyphicon glyphicon-off"></i> </a></li>';
    $login_username .= '<li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span>' . $_SESSION["user_first_name"] . ' ' . $_SESSION["user_last_name"] . '</span> <i class="icon-user fa"></i> <i class=" icon-down-open-big fa"></i></a>';
    $login_username .= '<ul class="dropdown-menu user-menu">';
    $login_username .= '<li class="active"><a href="account-home.php"><i class="icon-home"></i> Personal Home </a></li>';           
    $login_username .= '<li><a href="account-myads.html"><i class="icon-th-thumb"></i> My ads </a></li>';
    $login_username .= '<li><a href="account-favourite-ads.html"><i class="icon-heart"></i> Favourite ads </a></li>';
    $login_username .= '<li><a href="account-saved-search.html"><i class="icon-star-circled"></i> Saved search </a></li>';
    $login_username .= '<li><a href="account-archived-ads.html"><i class="icon-folder-close"></i> Archived ads </a></li>';
    $login_username .= '<li><a href="account-pending-approval-ads.html"><i class="icon-hourglass"></i> Pending approval </a></li>';
    $login_username .= '<li><a href="statements.html"><i class=" icon-money "></i> Payment history </a></li>';
    $login_username .= '</ul>';
    $login_username .= '</li>';
	} else {
	$login_username = '<li><a href="login_register.php">Login</a></li><li><a href="login_register.php?r=1">Signup</a></li>';
	}




	
	
function fetchCategoryTree($parent = 0, $spacing = '', $user_tree_array = '') {
	global $connection;
  if (!is_array($user_tree_array))
    $user_tree_array = array();

  $sql = "SELECT `cat_unid`, `cat_name`, `par_cat` FROM `website_categories` WHERE 1 AND `par_cat` = $parent ORDER BY cat_unid ASC";
  $query = mysql_query($sql, $connection);
  if (mysql_num_rows($query) > 0) {
    while ($row = mysql_fetch_object($query)) {
      $user_tree_array[] = array("id" => $row->cat_unid, "name" => $spacing . $row->cat_name, "parent" => $row->par_cat);
      $user_tree_array = fetchCategoryTree($row->cat_unid, $spacing . '&nbsp;&nbsp;&nbsp;', $user_tree_array);
    }
  }
  return $user_tree_array;
}
	
	
	
	
	
	
ob_start();
?>
  <div class="header">
    <nav class="navbar   navbar-site navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a href="index.php" class="navbar-brand logo logo-title"> 
          <!-- Original Logo will be placed here  --> 
          <img src="https://storage.googleapis.com/buy4square/logo/Files/For%20web_72ppp/horizontal_logo/horizontal_logo_green_2.png" alt="Buy 4 Square" height="50px" class="large" /></a> </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
			<?php echo $login_username; ?>
            <li ><a  class="postadd" class="btn btn-block   btn-border btn-post btn-danger" href="post-ads.php">POST FREE AD</a></li>
          </ul>
        </div>
        <!--/.nav-collapse --> 
      </div>
      <!-- /.container-fluid --> 
    </nav>
  </div>
  <!-- /.header -->
<?php
$header = ob_get_clean();



ob_start();
?>
  <div class="search-row-wrapper">
    <div class="container ">
      <form action="#" method="GET">
        <div class="col-sm-3">
          <input class="form-control keyword" type="text" placeholder="e.g. Mobile Sale">
        </div>
        <div class="col-sm-3">
          <select class="form-control selecter" name="category" id="search-category" >
            <option selected="selected" value="">All Categories</option>
            <option value="Vehicles" style="background-color:#E9E9E9;font-weight:bold;" disabled="disabled"> - Vehicles - </option>
            <option value="Cars"> Cars </option>
            <option value="Commercial vehicles"> Commercial vehicles </option>
            <option value="Motorcycles"> Motorcycles </option>
            <option value="Motorcycle Equipment"> Car &amp; Motorcycle Equipment </option>
            <option value="Boats"> Boats </option>
            <option value="Vehicles"> Other Vehicles </option>
            <option value="House" style="background-color:#E9E9E9;font-weight:bold;" disabled="disabled"> - House and Children - </option>
            <option value="Appliances"> Appliances </option>
            <option value="Inside"> Inside </option>
            <option value="Games"> Games and Clothing </option>
            <option value="Garden"> Garden </option>
            <option value="Multimedia" style="background-color:#E9E9E9;font-weight:bold;" disabled="disabled"> - Multimedia - </option>
            <option value="Telephony"> Telephony </option>
            <option value="Image"> Image and sound </option>
            <option value="Computers"> Computers and Accessories </option>
            <option value="Video"> Video games and consoles </option>
            <option value="Real" style="background-color:#E9E9E9;font-weight:bold;" disabled="disabled"> - Real Estate - </option>
            <option value="Apartment"> Apartment </option>
            <option value="Home"> Home </option>
            <option value="Vacation"> Vacation Rentals </option>
            <option value="Commercial"> Commercial offices and local </option>
            <option value="Grounds"> Grounds </option>
            <option value="Houseshares"> Houseshares </option>
            <option value="Other real estate"> Other real estate </option>
            <option value="Services" style="background-color:#E9E9E9;font-weight:bold;" disabled="disabled"> - Services - </option>
            <option value="Jobs"> Jobs </option>
            <option value="Job application"> Job application </option>
            <option value="Services"> Services </option>
            <option value="Price"> Price </option>
            <option value="Business"> Business and goodwill </option>
            <option value="Professional"> Professional equipment </option>
            <option value="dropoff" style="background-color:#E9E9E9;font-weight:bold;" disabled="disabled"> - Extra - </option>
            <option value="Other"> Other </option>
          </select>
        </div>
        <div class="col-sm-3">
          <select class="form-control selecter" name="location" id="id-location">
            <option selected="selected" value="">All Locations</option>
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
            <option value="Other-Locations">Other Locations</option>
          </select>
        </div>
        <div class="col-sm-3">
          <button class="btn btn-block btn-primary  "> <i class="fa fa-search"></i> </button>
        </div>
      </form>
    </div>
  </div>
  <!-- /.search-row -->
<?php
$search_row = ob_get_clean();


ob_start();
?>

  <div class="footer" id="footer">
    <div class="container">
      <ul class=" pull-left navbar-link footer-nav">
        <li><a href="index.html"> Home </a> <a href="about-us.html"> About us </a> <a href="#"> Terms and Conditions </a> <a href="#"> Privacy Policy </a> <a href="contact.html"> Contact us </a> <a href="faq.html"> FAQ </a>
      </ul>
      <ul class=" pull-right navbar-link footer-nav">
        <li> &copy; 2015 BootClassified </li>
      </ul>
    </div>
    
  </div>
  <!--/.footer--> 



<?php
$footer = ob_get_clean();


function db_update_array($insert_update_array, $table, $query = ''){  
	global $connection;

  $query_1 = "UPDATE `$table` SET ";
  $sep = '';
  foreach($insert_update_array as $key=>$value) {
    $query_1 .= $sep.$key.' = "'.$value.'"';
    $sep = ',';
  }
  $query_1 .= $query;
  // execute query

// update db

$result = mysql_query($query_1, $connection);
if (!$result) {
  die('Invalid query: ' . mysql_error());
	}
// done
} // done






function db_insert_array($insert_update_array, $table, $query = ''){  
	global $connection;
	$columns = implode(", ",array_keys($insert_update_array));
$escaped_values = array_map('mysql_real_escape_string', array_values($insert_update_array));
//$values  = implode(", ", $escaped_values);
$values = implode("', '", $escaped_values);
$query = "INSERT INTO `$table`($columns) VALUES ('$values')";

$result = mysql_query($query, $connection);
if (!$result) {
  die('Invalid query: ' . mysql_error());
	}
return mysql_insert_id();
} // done




function db_get_array($query) {
		global $connection;
		// get dropdown menue of location types	
	$query_listing_cat = "SELECT * FROM product_types";
$result_listing_cat = mysql_query($query, $connection);
if (!$result_listing_cat) {
  die('Invalid query: ' . mysql_error());
}


while( $row_listing_cat = mysql_fetch_assoc( $result_listing_cat)){ $array_listing_cat[] = $row_listing_cat; }
return $array_listing_cat;
}



function db_get_single($query){
	global $connection;
// Select all the rows in the markers table
$result = mysql_query($query, $connection);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}
$row = mysql_fetch_assoc($result);
return $row;
}



function db_query($query){
	global $connection;



$result = mysql_query($query, $connection);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}	
 // end delete listing 

return $result;
}


function db_delete($table, $query){
	global $connection;


		$query5 = "DELETE FROM `$table` $query";
$result = mysql_query($query5, $connection);
if (!$result) {
  die('Invalid query: ' . mysql_error());
}	
 // end delete listing 


}










   function generateSelect3($name = '', $options = array(),  $value = '1', $javascript) {
$html = '<select class="form-control input-sm" id="'.$name.'" name="'.$name.'" '.$javascript.'>';
  global $blank_form; if($blank_form == 'yes'){$value = '1';}
foreach ($options as $option => $value1 ) {
    if ($value['unid'] == $value) {
        $html .= '<option value="'.$value1['unid'].'" selected="selected">'.$value1['f1'].'</option>';
    } else {
        $html .= '<option value="'.$value1['unid'].'">'.$value1['f1'].'</option>';
    }
}

$html .= '</select>';
return $html;
}



function generateTextOB($name, $value = '', $tab = ''){
		   global $blank_form; if($blank_form == 'yes'){$value = '';}
if ($tab == 'true') {
$tab_code = 'onkeydown="return tabOnEnter(this,event)"';}else{$tab_code = ''; }
if(!isset($value)){$value = '';}
ob_start();
	?>
	<input class="form-control input-sm" <?php echo $tab_code; ?> id="<?php echo $name; ?>" name="<?php echo $name; ?>" value="<?php echo $value; ?>" type="text" />
	<?php
	$output = ob_get_clean();
	return $output;
}
function generateText($name, $value = '', $tab = ''){
		   global $blank_form; if($blank_form == 'yes'){$value = '';}
if ($tab == 'true') {
$tab_code = 'onkeydown="return tabOnEnter(this,event)"';}else{$tab_code = ''; }
if(!isset($value)){$value = '';}

	?>
	<input class="form-control input-sm" <?php echo $tab_code; ?> id="<?php echo $name; ?>" name="<?php echo $name; ?>" value="<?php echo $value; ?>" type="text" />
	<?php
}
function generateTextAuto($name, $value = '', $tab = ''){
		   global $blank_form; if($blank_form == 'yes'){$value = '';}
if ($tab == 'true') {
$tab_code = 'onkeydown="return tabOnEnter(this,event)"';}else{$tab_code = ''; }
if(!isset($value)){$value = '';}
	?>
	<input class="form-control input-sm" <?php echo $tab_code; ?> id="<?php echo $name; ?>" name="<?php echo $name; ?>" value="<?php echo $value; ?>" type="text" autofocus />
	<?php
}
function generateTextRead($name, $value = ''){
		   global $blank_form; if($blank_form == 'yes'){$value = '';}
	if(!isset($value)){$value = '';}
	?>
	<input class="form-control input-sm" id="<?php echo $name; ?>" name="<?php echo $name; ?>" value="<?php echo $value; ?>" type="text" readonly />
	<?php
}

function generateTextArea($name, $value = ''){
	   global $blank_form; if($blank_form == 'yes'){$value = '';}
	if(!isset($value)){$value = '';}
	?>
	<textarea class="form-control input-sm" id="<?php echo $name; ?>" name="<?php echo $name; ?>" rows="10" cols="50" ><?php echo $value; ?></textarea>
	<?php
}




function generateDateText($name, $value){
	  global $blank_form; if($blank_form == 'yes'){$value = '';}
	?>
	
 <script type="text/javascript">
  $(function() {
    $('#<?php echo $name; ?>_div').datetimepicker({
      pickTime: false
    });
  });
</script>
	<div id="<?php echo $name; ?>_div" class="input-append">
    <input id="<?php echo $name; ?>" name="<?php echo $name; ?>" value="<?php echo $value; ?>"  data-format="yyyy-MM-dd" type="text"></input>
    <span class="add-on"><i class="glyphicon glyphicon-list-alt"></i></span>
    </div>
	<?php
}
function generateTimeText($name, $value){
	  global $blank_form; if($blank_form == 'yes'){$value = '';}
	?>
    <script type="text/javascript">
  $(function() {
    $('#<?php echo $name; ?>_div').datetimepicker({
      pickDate: false,
      pick12HourFormat: true
    });
  });
</script>
	<div id="<?php echo $name; ?>_div" class="input-append">
    <input id="<?php echo $name; ?>" name="<?php echo $name; ?>" value="<?php echo $value; ?>"  data-format="hh:mm:ss" type="text"></input>
    <span class="add-on"><i class="glyphicon glyphicon-list-alt"></i></span>
    </div>
	<?php
}
   function tableMatch($options = array(),  $default = '') {
foreach ($options as $option => $value ) {
    if ($value['unid'] == $default) {
        $html = $value['f1'];
    }
}
return $html;
}


   function tableMatch2($options = array(),  $default = '', $unid, $name) {
foreach ($options as $option => $value ) {
    if ($value[$unid] == $default) {
        $html = $value[$name];
    }
}
return $html;
}


   function generateSelect($id = '', $options = array(), $unid, $name, $default = '1', $javasctpt) {
$html = '<select class="form-control input-sm" id="'.$id.'" name="'.$id.'" '.$javasctpt.'>';

foreach ($options as $option => $value ) {
    if ($value[$unid] == $default) {
        $html .= '<option value="'.$value[$unid].'" selected="selected">'.$value[$name].'</option>';
    } else {
        $html .= '<option value="'.$value[$unid].'">'.$value[$name].'</option>';
    }
}

$html .= '</select>';
return $html;
}













  function getCord($address){
  	$xml = simplexml_load_file('http://maps.googleapis.com/maps/api/geocode/xml?address=' . $address . '&sensor=false');
$lat = $xml->result->geometry->location->lat;
$lng = $xml->result->geometry->location->lng;
	
	$cord = array();
	$cord['lat'] = $lat; 
	$cord['lon'] = $lng; 
	return  $cord;
  	
 }  
    
function getMileage($orgin, $dest){
	$orgin = urlencode($orgin);
	$dest = urlencode($dest);
    $google_maps_url = file_get_contents("http://maps.googleapis.com/maps/api/distancematrix/json?origins=" . $orgin . "&destinations=" . $dest . "&mode=bicycling&language=en-FR&units=imperial&sensor=false");
    $google_maps_array = json_decode(utf8_encode($google_maps_url),true);
    $milage = $google_maps_array['rows'][0]['elements'][0]['distance']['text'];

return $milage;
}


function mysql_insert_array($table, $data, $exclude = array()) {
    $fields = $values = array();
    if( !is_array($exclude) ) $exclude = array($exclude);
    foreach( array_keys($data) as $key ) {
        if( !in_array($key, $exclude) ) {
            $fields[] = "`$key`";
            $values[] = "'" . mysql_real_escape_string($data[$key]) . "'";
        }
    }
    $fields = implode(",", $fields);
    $values = implode(",", $values);
    if( mysql_query("INSERT INTO `$table` ($fields) VALUES ($values)") ) {
        return array( "mysql_error" => false,
                      "mysql_insert_id" => mysql_insert_id(),
                      "mysql_affected_rows" => mysql_affected_rows(),
                      "mysql_info" => mysql_info()
                    );
    } else {
        return array( "mysql_error" => mysql_error() );
    }
}




$yes_no_array = array
  (
  array('unid' => '1', 'name' => 'Yes'),
  array('unid' => '2', 'name' => 'No'),
  );
















?>