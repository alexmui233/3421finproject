<?php
$content=file_get_contents('https://tw.rter.info/capi.php');
$currency=json_decode($content,true);

$x = $_POST['curr1'];
$y = $_POST['curr2'];
$v = $_POST['val'];

$currency1_USD=1/$currency['USD'.$x]['Exrate'];
$currency2_USD=$currency['USD'.$y]['Exrate'];

echo $v * $currency2_USD;
?>

