<?php
define('Myheader', TRUE);
define('Myfooter', TRUE);
include_once 'header.php';
include_once 'api.php';
?>

<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
	<div class="form-check">
	<input class="form-check-input" type="checkbox" id="converter" name="converter1" value="HKDEUR">
    <label for="HKDEUR"> HKD to EURO</label>
	</div>
	
	<div class="form-check">
  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">Default checkbox</label>
  	</div>
	<!-- <br>
    <input type="checkbox" id="converter" name="converter2" value="HKDUSD">
    <label for="HKDUSD"> HKD to USD</label><br>
    <input type="checkbox" id="converter" name="converter3" value="HKDJPY">
    <label for="HKDJPY"> HKD to JPY</label><br>
    <input type="checkbox" id="converter" name="converter4" value="HKDCNY">
    <label for="HKDCNY"> HKD to CNY</label><br>
    <input type="checkbox" id="converter" name="converter5" value="HKDBTC">
    <label for="HKDBTC"> HKD to Bitcoin</label><br>
    <input type="checkbox" id="converter" name="converter6" value="HKDETH">
    <label for="HKDETH"> HKD to Ethereum</label><br>
    <input type="checkbox" id="converter" name="converter7" value="HKDADA">
    <label for="HKDADA"> HKD to Cardeno</label><br>
    <input type="checkbox" id="converter" name="converter8" value="HKDDog">
    <label for="HKDDog"> HKD to Doge</label><br>
	Plase input the HKD:<input type="number" name="HKDollar">
    <input type="submit" value="Exchange">
	</form> -->
</html>

<?php
	$sql = "SELECT * FROM exchange;";
	$stmt = mysqli_prepare($link, $sql);
	if(mysqli_stmt_execute($stmt)){
		$query=$stmt->get_result();
		foreach ($query as $row){
			$db_data_currency[]=$row['currency']; 
			$db_data_value[]=$row['value'];
			$db_data_update_date[]=$row['update_date'];
		}
		$contect="<table><tr><th>Currency</th><th>Exchange value</th><th>Update time</th></tr>";
	
		if(isset($_POST['converter7'])){
			$contect.="<tr><td>HKD to Cardeno</td><td>".$_POST['HKDollar']*$db_data_value[0]."</td><td>".$db_data_update_date[0]."</td></tr>";
			//echo ($contect);
		}
		if(isset($_POST['converter5'])){
			$contect.="<tr><td>HKD to Bitcoin</td><td>".$_POST['HKDollar']*$db_data_value[1]."</td><td>".$db_data_update_date[1]."</td></tr>";
			//echo ($contect);
		}
		if(isset($_POST['converter4'])){
			$contect.="<tr><td>HKD to CNY</td><td>".$_POST['HKDollar']*$db_data_value[2]."</td><td>".$db_data_update_date[2]."</td></tr>";
			//echo ($contect);
		}
		if(isset($_POST['converter8'])){
			$contect.="<tr><td>HKD to Doge</td><td>".$_POST['HKDollar']*$db_data_value[3]."</td><td>".$db_data_update_date[3]."</td></tr>";
			//echo ($contect);
		}
		if(isset($_POST['converter6'])){
			$contect.="<tr><td>HKD to Ethereum</td><td>".$_POST['HKDollar']*$db_data_value[4]."</td><td>".$db_data_update_date[4]."</td></tr>";
			//echo ($contect);
		}
		if(isset($_POST['converter1'])){
			$contect.="<tr><td>HKD to EURO</td><td>".$_POST['HKDollar']*$db_data_value[5]."</td><td>".$db_data_update_date[5]."</td></tr>";
			//echo ($contect);
		}
		if(isset($_POST['converter3'])){
			$contect.="<tr><td>HKD to JPY</td><td>".$_POST['HKDollar']*$db_data_value[6]."</td><td>".$db_data_update_date[6]."</td></tr>";
			//echo ($contect);
		}
		if(isset($_POST['converter2'])){
			$contect.="<tr><td>HKD to USD</td><td>".$_POST['HKDollar']*$db_data_value[7]."</td><td>".$db_data_update_date[7]."</td></tr>";
			//echo ($contect);
		}
		if (isset($_POST['converter1']) || isset($_POST['converter2'])|| isset($_POST['converter3'])|| isset($_POST['converter4'])|| isset($_POST['converter5'])|| isset($_POST['converter6'])|| isset($_POST['converter7'])|| isset($_POST['converter8'])){
			$contect.="</table>";
			echo $contect;}
		else{echo "Please tick the check box";}
			
	}
	else{echo "Please try later.";}
?>

<?php
 include_once 'footer.php';
?>