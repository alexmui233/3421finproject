<?php
define('Myheader', TRUE);
define('Myfooter', TRUE);
include_once 'header.php';
include_once 'api.php';
?>

<html>

<body style="background-color: rgb(32, 34, 37);">
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
		<link rel="stylesheet" href="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css">
		<style>
			.form-check-input{
				width: 35px;
				height: 35px;
			}
			tr:nth-child(even) {
				background-color: #f2f2f2;
			}
		</style>
	</head>

<div style="width: 700px; margin: 100px auto">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" style="color: #faa91f;">
		<div class="form-check form-switch col-auto">
			<input class="form-check-input" type="checkbox" id="converter" name="converter1" value="HKDEUR">
			<label for="HKDEUR"> <p class="h1">HKD to EUR</label>
		</div>
		<div class="form-check form-switch col-auto">
			<input class="form-check-input" type="checkbox" id="converter" name="converter2" value="HKDUSD">
			<label class="form-check-label" for="HKDUSD"> <p class="h1">HKD to USD </p></label><br>
		</div>
		<div class="form-check form-switch col-auto">
			<input class="form-check-input" type="checkbox" id="converter" name="converter3" value="HKDJPY">
			<label class="form-check-label" for="HKDJPY"> <p class="h1">HKD to JPY</p></label><br>	
		</div>	
		<div class="form-check form-switch col-auto">	
			<input class="form-check-input" type="checkbox" id="converter" name="converter4" value="HKDCNY">
			<label class="form-check-label" for="HKDCNY"> <p class="h1">HKD to CNY</p></label><br>
		</div>
		<div class="form-check form-switch col-auto">
			<input class="form-check-input" type="checkbox" id="converter" name="converter5" value="HKDBTC">
			<label class="form-check-label" for="HKDBTC"> <p class="h1">HKD to Bitcoin</p></label><br>
		</div>
		<div class="form-check form-switch">	
			<input class="form-check-input" type="checkbox" id="converter" name="converter6" value="HKDETH">
			<label class="form-check-label" for="HKDETH"> <p class="h1">HKD to Ethereum</p></label><br>
		</div>
		<div class="form-check form-switch">
			<input class="form-check-input" type="checkbox" id="converter" name="converter7" value="HKDADA">
			<label class="form-check-label" for="HKDADA"> <p class="h1">HKD to Cardeno</p></label><br>
		</div>
		<div class="form-check form-switch">
			<input class="form-check-input" type="checkbox" id="converter" name="converter8" value="HKDDog">
			<label class="form-check-label" for="HKDDog"> <p class="h1">HKD to Doge</p></label><br>
		</div>

		<p class="h1">Plase input the HKD:</p>
	<input type="number" class="form-control" name="HKDollar">
	<br>
    <input type="submit" class="form-control btn btn-primary" value="Exchange">
	</form>
</div>
</body>

</html>

<?php
$sql = "SELECT * FROM exchange;";
$stmt = mysqli_prepare($link, $sql);
if (mysqli_stmt_execute($stmt)) {
	$query = $stmt->get_result();
	foreach ($query as $row) {
		$db_data_currency[] = $row['currency'];
		$db_data_value[] = $row['value'];
		$db_data_update_date[] = $row['update_date'];
	}
	$contect = "<table class='table table-striped' style='margin: 10px auto; font-size: 18px;'><tr><th>Currency</th><th>Exchange value</th><th>Update time</th></tr>";

	if (isset($_POST['converter7'])) {
		$contect .= "<tr><td>HKD to Cardeno</td><td>" . $_POST['HKDollar'] * $db_data_value[0] . "</td><td>" . $db_data_update_date[0] . "</td></tr>";
		//echo ($contect);
	}
	if (isset($_POST['converter5'])) {
		$contect .= "<tr><td>HKD to Bitcoin</td><td>" . $_POST['HKDollar'] * $db_data_value[1] . "</td><td>" . $db_data_update_date[1] . "</td></tr>";
		//echo ($contect);
	}
	if (isset($_POST['converter4'])) {
		$contect .= "<tr><td>HKD to CNY</td><td>" . $_POST['HKDollar'] * $db_data_value[2] . "</td><td>" . $db_data_update_date[2] . "</td></tr>";
		//echo ($contect);
	}
	if (isset($_POST['converter8'])) {
		$contect .= "<tr><td>HKD to Doge</td><td>" . $_POST['HKDollar'] * $db_data_value[3] . "</td><td>" . $db_data_update_date[3] . "</td></tr>";
		//echo ($contect);
	}
	if (isset($_POST['converter6'])) {
		$contect .= "<tr><td>HKD to Ethereum</td><td>" . $_POST['HKDollar'] * $db_data_value[4] . "</td><td>" . $db_data_update_date[4] . "</td></tr>";
		//echo ($contect);
	}
	if (isset($_POST['converter1'])) {
		$contect .= "<tr><td>HKD to EURO</td><td>" . $_POST['HKDollar'] * $db_data_value[5] . "</td><td>" . $db_data_update_date[5] . "</td></tr>";
		//echo ($contect);
	}
	if (isset($_POST['converter3'])) {
		$contect .= "<tr><td>HKD to JPY</td><td>" . $_POST['HKDollar'] * $db_data_value[6] . "</td><td>" . $db_data_update_date[6] . "</td></tr>";
		//echo ($contect);
	}
	if (isset($_POST['converter2'])) {
		$contect .= "<tr><td>HKD to USD</td><td>" . $_POST['HKDollar'] * $db_data_value[7] . "</td><td>" . $db_data_update_date[7] . "</td></tr>";
		//echo ($contect);
	}
	if (isset($_POST['converter1']) || isset($_POST['converter2']) || isset($_POST['converter3']) || isset($_POST['converter4']) || isset($_POST['converter5']) || isset($_POST['converter6']) || isset($_POST['converter7']) || isset($_POST['converter8'])) {
		$contect .= "</table>";
		echo $contect;
	}
} else {
	echo "Please try later.";
}
?>

<?php
include_once 'footer.php';
?>