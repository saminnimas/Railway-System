<?php
session_start();
// $lifetime=3600;
// session_start();
// setcookie(session_name(),session_id(),time()+$lifetime);
// if(!$_SESSION['y']){
//     header("Location: ../index.php");
// }
// echo $_SESSION['quantity']."<br>";
// echo $_SESSION['b_pfrom'].$_SESSION['b_pto'].$_SESSION['b_pdate'].$_SESSION['b_pclass']."<br>";
// // $cart = array($_SESSION['b_pfrom'], $_SESSION['b_pto']);
// // array_shift($_SESSION['cart']);
// echo '<pre>';
// print_r($_SESSION['cart']);
// echo "</pre>";
// $_SESSION['cart'] = array();
// $_SESSION['temp_cart'] = array();
require_once('../dbconnect.php');
function update_rewards($conn, $usern, $new_cache){
    $update_cached = "UPDATE rewards SET purchase_tracker = $new_cache WHERE username = '$usern';";
    mysqli_query($conn, $update_cached);
}
if(!empty($_SESSION['pu_cache'])){
	update_rewards($conn, $_SESSION['username'], ($_SESSION['pu_cache'] + 1));
}
else{
	$u = $_SESSION['username'];
	$get_pt = "SELECT purchase_tracker FROM rewards WHERE username = '$u';";
	$r = mysqli_query($conn, $get_pt);
	$fetchh = mysqli_fetch_array($r);
	$set_t = $fetchh['purchase_tracker'] + 1;
	$increment = "UPDATE rewards SET purchase_tracker = $set_t WHERE username = '$u';";
	mysqli_query($conn, $increment);
}
$_SESSION['discount'] = false;
/* PHP */
$post_data = array();
$post_data['store_id'] = "370pr656c33c5bc5ea";
$post_data['store_passwd'] = "370pr656c33c5bc5ea@ssl";
$post_data['total_amount'] = $_SESSION['amount'];
$post_data['currency'] = "BDT";
$post_data['tran_id'] = "SSLCZ_TEST_".uniqid();
$post_data['success_url'] = "http://localhost/railway/success.php";
$post_data['fail_url'] = "http://localhost/new_sslcz_gw/fail.php";
$post_data['cancel_url'] = "http://localhost/new_sslcz_gw/cancel.php";
# $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE

# EMI INFO
$post_data['emi_option'] = "1";
$post_data['emi_max_inst_option'] = "9";
$post_data['emi_selected_inst'] = "9";

# CUSTOMER INFORMATION
$post_data['cus_name'] = $_SESSION['username'];
$post_data['cus_email'] = $_SESSION['email'];
$post_data['cus_add1'] = "Dhaka";
$post_data['cus_add2'] = "Dhaka";
$post_data['cus_city'] = "Dhaka";
$post_data['cus_state'] = "Dhaka";
$post_data['cus_postcode'] = "1000";
$post_data['cus_country'] = "Bangladesh";
$post_data['cus_phone'] = $_SESSION['phone'];
$post_data['cus_fax'] = "01711111111";

# SHIPMENT INFORMATION
$post_data['ship_name'] = "test370praw6r";
$post_data['ship_add1 '] = "Dhaka";
$post_data['ship_add2'] = "Dhaka";
$post_data['ship_city'] = "Dhaka";
$post_data['ship_state'] = "Dhaka";
$post_data['ship_postcode'] = "1000";
$post_data['ship_country'] = "Bangladesh";

# OPTIONAL PARAMETERS
$post_data['value_a'] = "ref001";
$post_data['value_b '] = "ref002";
$post_data['value_c'] = "ref003";
$post_data['value_d'] = "ref004";

# CART PARAMETERS
$post_data['cart'] = json_encode(array(
    array("product"=>"DHK TO BRS AC A1","amount"=>"200.00"),
    array("product"=>"DHK TO BRS AC A2","amount"=>"200.00"),
    array("product"=>"DHK TO BRS AC A3","amount"=>"200.00"),
    array("product"=>"DHK TO BRS AC A4","amount"=>"200.00")
));
$post_data['product_amount'] = "100";
$post_data['vat'] = "5";
$post_data['discount_amount'] = "5";
$post_data['convenience_fee'] = "3";


# REQUEST SEND TO SSLCOMMERZ
$direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v3/api.php";

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $direct_api_url );
curl_setopt($handle, CURLOPT_TIMEOUT, 30);
curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($handle, CURLOPT_POST, 1 );
curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


$content = curl_exec($handle );

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle))) {
	curl_close( $handle);
	$sslcommerzResponse = $content;
} else {
	curl_close( $handle);
	echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
	exit;
}

# PARSE THE JSON RESPONSE
$sslcz = json_decode($sslcommerzResponse, true );

if(isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL']!="" ) {
        # THERE ARE MANY WAYS TO REDIRECT - Javascript, Meta Tag or Php Header Redirect or Other
        # echo "<script>window.location.href = '". $sslcz['GatewayPageURL'] ."';</script>";
	echo "<meta http-equiv='refresh' content='0;url=".$sslcz['GatewayPageURL']."'>";
	# header("Location: ". $sslcz['GatewayPageURL']);
	exit;
} else {
	echo "JSON Data parsing error!";
}
?>