<?php
session_start();
// $lifetime=3600;
// session_start();
// setcookie(session_name(),session_id(),time()+$lifetime);
$final = $_SESSION['acart'];
// array_push($final, $_SESSION['cart']);
$user_name = $_SESSION['username'];

// echo "<pre>";
// print_r($final);
// echo "</pre>";
// echo $_SESSION['name']."<br>";
// echo $_SESSION['amount']."<br>";

$val_id=urlencode($_POST['val_id']);
$store_id=urlencode("370pr656c33c5bc5ea");
$store_passwd=urlencode("370pr656c33c5bc5ea@ssl");
$requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $requested_url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

$result = curl_exec($handle);

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle)))
{
	print("CONGRATULATIONS!! Payment Successful.");
	
	# TO CONVERT AS ARRAY
	# $result = json_decode($result, true);
	# $status = $result['status'];

	# TO CONVERT AS OBJECT
	$result = json_decode($result);

	# TRANSACTION INFO
	$status = $result->status;
	$tran_date = $result->tran_date;
	$tran_id = $result->tran_id;
	$val_id = $result->val_id;
	$amount = $result->amount;
	$store_amount = $result->store_amount;
	$bank_tran_id = $result->bank_tran_id;
	$card_type = $result->card_type;

	# EMI INFO
	$emi_instalment = $result->emi_instalment;
	$emi_amount = $result->emi_amount;
	$emi_description = $result->emi_description;
	$emi_issuer = $result->emi_issuer;

	# ISSUER INFO
	$card_no = $result->card_no;
	$card_issuer = $result->card_issuer;
	$card_brand = $result->card_brand;
	$card_issuer_country = $result->card_issuer_country;
	$card_issuer_country_code = $result->card_issuer_country_code;

	# API AUTHENTICATION
	$APIConnect = $result->APIConnect;
	$validated_on = $result->validated_on;
	$gw_version = $result->gw_version;

    // echo "<br>". "$status". "$tran_id<br>". "$tran_date<br>". "$amount<br>". "$card_type";
	// $_SESSION['transaction_id'] = $tran_id;
	// $_SESSION['purchase_date'] = $tran_date;
	echo "<a href='a_buy.php'>go back</a>";

} else {

	echo "Failed to connect with SSLCOMMERZ";
}

// array_push($final, [$tran_date, $tran_id]);

echo "<pre>";
print_r($final);
echo "</pre>";
$_SESSION['acart'] = array();
$_SESSION['atemp_cart'] = array();
echo "<br>". "$status<br>". "$tran_id<br>". "$tran_date<br>". "$amount<br>". "$card_type";
// $str1 = $final[0][4];

// echo gettype($str1);
require_once('../dbconnect.php');

for($i = 0; $i < count($final); $i++){
	$str1 = $final[$i][4];
	$str2 = $final[$i][3];
	$str3 = $final[$i][5];
	$sql = "INSERT INTO purchase_history(username, transaction_id, route, purchase_date, tickets_date, quantity) 
	VALUES( '$user_name', '$tran_id', '$str1', '$tran_date', '$str2', '$str3' )";
	$history = mysqli_query($conn, $sql);
}
mysqli_close($conn);
?>