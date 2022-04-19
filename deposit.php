<?php
define('Myheader', TRUE);
define('Myfooter', TRUE);
include_once 'header.php';
?>

<?php 
$content=file_get_contents('https://tw.rter.info/capi.php');
$currency=json_decode($content,true);
$HKD=1/$currency['USDHKD']['Exrate'];
$content2=file_get_contents('https://api.nomics.com/v1/currencies/ticker?key=0205d48a7926b80869b5a70842a0f4694b75b76b&ids=BTC,ETH,DOGE,ADA&interval=1d&convert=HKD');
$coins=json_decode($content2,true);

$currency_of_dollar_name=array("HKDEUR","HKDJPY","HKDCNY","HKDUSD");
$currency_of_dollar=array("USDEUR","USDJPY","USDCNY","USDHKD");
$currency_of_coins=array("HKDBTC","HKDETH","HKDADA","HKDDog");

    //$sql = "UPDATE exchange set HKDEUR=?,HKDUSD=?=,HKDJPY=?,HKDCNY=?,HKDBTC=?,HKDETH=?,HKDADA=?,HKDDog=?";
    for($x=0;$x<3;$x++){
        $sql = "UPDATE exchange set value=?,update_date=? where currency=?";
		$q=$HKD*$currency[$currency_of_dollar[$x]]['Exrate'];
		$q2=$currency[$currency_of_dollar[$x]]['UTC'];
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "dss",$q,$q2,$currency_of_dollar_name[$x]);
            if(mysqli_stmt_execute($stmt)){
            }
            else{echo "Please try later";}
        }
    }
	
	$sql = "UPDATE exchange set value=?,update_date=? where currency=?";
	$q2=$currency['USDHKD']['UTC'];
	if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "dss",$HKD,$q2,$currency_of_dollar_name[3]);
            if(mysqli_stmt_execute($stmt)){
            }
            else{echo "Please try later";}
    }
    
    for($x=0;$x<4;$x++){
		$q=1/$coins[$x]['price'];
        $sql = "UPDATE exchange set value=?,update_date=? where currency=?";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "dss",$q,$coins[$x]['price_date'],$currency_of_coins[$x]);
            if(mysqli_stmt_execute($stmt)){
            }
            else{echo "Please try later";}
        }
    }
?>

//show the deposit


<html>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <input type="checkbox" id="converter" name="HKDEUR">
    <label for="HKDEUR"> HKD to EURO</label><br>
    <input type="checkbox" id="converter" name="HKDUSD">
    <label for="HKDUSD"> HKD to USD</label><br>
    <input type="checkbox" id="converter" name="HKDJPY">
    <label for="HKDJPY"> HKD to JPY</label><br>
    <input type="checkbox" id="converter" name="HKDCNY">
    <label for="HKDCNY"> HKD to CNY</label><br>
    <input type="checkbox" id="converter" name="HKDBTC">
    <label for="HKDBTC"> HKD to Bitcoin</label><br>
    <input type="checkbox" id="converter" name="HKDETH">
    <label for="HKDETH"> HKD to Ethereum</label><br>
    <input type="checkbox" id="converter" name="HKDADA">
    <label for="HKDADA"> HKD to Cardeno</label><br>
    <input type="checkbox" id="converter" name="HKDDog">
    <label for="HKDDog"> HKD to Doge</label><br>
	<input id="dollar" name="HKD" value="Plase input the HKD">
    <input type="submit" class="login-btn" value="deposit">
</html>



<?php
 include_once 'footer.php';
?>