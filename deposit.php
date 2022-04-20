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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<style>
		.btn-group label,
		.container p {
			font-size: 20px;
		}

		.container p {
			width: max-content;
		}
	</style>
</head>

	

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

	<div class="container">
		<div class="row">
			<div class="btn-group">
				<input type="radio" class="btn-check" name="depositradio" id="depositradio1" value="HKDEUR">
				<label class="btngplabel btn btn-outline-primary " for="depositradio1">HKD to EUR</label>

				<input type="radio" class="btn-check" name="depositradio" id="depositradio2" value="EURHKD">
				<label class="btn btn-outline-primary" for="depositradio2">EUR to HKD</label>
			</div>
		</div>
		<div class="row">
			<div class="btn-group">
				<input type="radio" class="btn-check" name="depositradio" id="depositradio3" value="HKDUSD">
				<label class="btn btn-outline-primary" for="depositradio3">HKD to USD</label>

				<input type="radio" class="btn-check" name="depositradio" id="depositradio4" value="USDHKD">
				<label class="btn btn-outline-primary" for="depositradio4">USD to HKD</label>
			</div>
		</div>
		<div class="row">
			<div class="btn-group">
				<input type="radio" class="btn-check" name="depositradio" id="depositradio5" value="HKDJPY">
				<label class="btn btn-outline-primary" for="depositradio5">HKD to JPY</label>

				<input type="radio" class="btn-check" name="depositradio" id="depositradio6" value="JPYHKD">
				<label class="btn btn-outline-primary" for="depositradio6">JPY to HKD</label>
			</div>
		</div>
		<div class="row">
			<div class="btn-group">
				<input type="radio" class="btn-check" name="depositradio" id="depositradio7" value="HKDCNY">
				<label class="btn btn-outline-primary" for="depositradio7">HKD to CNY</label>

				<input type="radio" class="btn-check" name="depositradio" id="depositradio8" value="CNYHKD">
				<label class="btn btn-outline-primary" for="depositradio8">CNY to HKD</label>
			</div>
		</div>

		<div class="row">
			<div class="btn-group">
				<input type="radio" class="btn-check" name="depositradio" id="depositradio9" value="HKDBTC">
				<label class="btn btn-outline-primary" for="depositradio9">HKD to BTC</label>

				<input type="radio" class="btn-check" name="depositradio" id="depositradio10" value="BTCHKD">
				<label class="btn btn-outline-primary" for="depositradio10">BTC to HKD</label>
			</div>
		</div>
		<div class="row">
			<div class="btn-group">
				<input type="radio" class="btn-check" name="depositradio" id="depositradio11" value="HKDETH">
				<label class="btn btn-outline-primary" for="depositradio11">HKD to ETH</label>

				<input type="radio" class="btn-check" name="depositradio" id="depositradio12" value="ETHHKD">
				<label class="btn btn-outline-primary" for="depositradio12">ETH to HKD</label>
			</div>
		</div>
		<div class="row">
			<div class="btn-group">
				<input type="radio" class="btn-check" name="depositradio" id="depositradio13" value="HKDADA">
				<label class="btn btn-outline-primary" for="depositradio13">HKD to ADA</label>

				<input type="radio" class="btn-check" name="depositradio" id="depositradio14" value="ADAHKD">
				<label class="btn btn-outline-primary" for="depositradio13">ADA to HKD</label>
			</div>
		</div>
		<div class="row">
			<div class="btn-group">
				<input type="radio" class="btn-check" name="depositradio" id="depositradio15" value="HKDDog">
				<label class="btn btn-outline-primary" for="depositradio9">HKD to Dog</label>

				<input type="radio" class="btn-check" name="depositradio" id="depositradio16" value="DogHKD">
				<label class="btn btn-outline-primary" for="depositradio10">Dog to HKD</label>
			</div>
		</div>
		<div class="row g-3" style="margin: 10px auto;">
			<div class="col-auto">
				<p>Plase input the Value to exchange:</p>
			</div>
			<div class="col-auto">
				<input class="form-control" type="number" name="value" required="required" step="0.00000001">
			</div>
			<div class="col-auto">
				<input style="font-size: 15px;" class="form-control btn btn-primary" type="submit" value="Deposit">
			</div>
			<div class="col-auto">
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
				} else {
					echo "Please try later.";
				}
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					if ($_POST['depositradio'] == null) {
						echo "radio is empty";
					} elseif ($_POST['depositradio'] == "HKDADA") {
						$change = $_POST['value'] * $db_data_value[0];
					} elseif ($_POST['depositradio'] == "ADAHKD") {
						$change = $_POST['value'] * (1 / $db_data_value[0]);
					} elseif ($_POST['depositradio'] == "HKDBTC") {
						$change = $_POST['value'] * $db_data_value[1];
					} elseif ($_POST['depositradio'] == "BTCHKD") {
						$change = $_POST['value'] * (1 / $db_data_value[1]);
					} elseif ($_POST['depositradio'] == "HKDCNY") {
						$change = $_POST['value'] * $db_data_value[2];
					} elseif ($_POST['depositradio'] == "CNYHKD") {
						$change = $_POST['value'] * (1 / $db_data_value[2]);
					} elseif ($_POST['depositradio'] == "HKDDog") {
						$change = $_POST['value'] * $db_data_value[3];
					} elseif ($_POST['depositradio'] == "DogHKD") {
						$change = $_POST['value'] * (1 / $db_data_value[3]);
					} elseif ($_POST['depositradio'] == "HKDETH") {
						$change = $_POST['value'] * $db_data_value[4];
					} elseif ($_POST['depositradio'] == "ETHHKD") {
						$change = $_POST['value'] * (1 / $db_data_value[4]);
					} elseif ($_POST['depositradio'] == "HKDEUR") {
						$change = $_POST['value'] * $db_data_value[5];
					} elseif ($_POST['depositradio'] == "EURHKD") {
						$change = $_POST['value'] * (1 / $db_data_value[5]);
					} elseif ($_POST['depositradio'] == "HKDJPY") {
						$change = $_POST['value'] * $db_data_value[6];
					} elseif ($_POST['depositradio'] == "JPYHKD") {
						$change = $_POST['value'] * (1 / $db_data_value[6]);
					} elseif ($_POST['depositradio'] == "HKDUSD") {
						$change = $_POST['value'] * $db_data_value[7];
					} elseif ($_POST['depositradio'] == "USDHKD") {
						$change = $_POST['value'] * (1 / $db_data_value[7]);
					}
					$From = substr($_POST['depositradio'], 0, 3);
					$To = substr($_POST['depositradio'], 3, 6);
					$sql = "SELECT * FROM user where username = ?";
					$stmt = mysqli_prepare($link, $sql);
					mysqli_stmt_bind_param($stmt, "s", $_SESSION["username"]);
					if (mysqli_stmt_execute($stmt)) {
						$query = $stmt->get_result();
						foreach ($query as $row) {
							$From_currency = $row[$From];
							$To_currency = $row[$To];
						}
						if ($_POST['value'] <= $From_currency) {
							$From_currency = $From_currency - $_POST['value'];
							$To_currency = $To_currency + $change;
							$sql = "UPDATE user set " . $From . " = ?," . $To . " = ? where username = ?;";
							$stmt = mysqli_prepare($link, $sql);
							mysqli_stmt_bind_param($stmt, "dds", $From_currency, $To_currency, $_SESSION["username"]);
							if (mysqli_stmt_execute($stmt)) {
								$sql = "INSERT INTO record (username,from_currency,to_currency,datetime,value) VALUES (?,?,?,?,?);";
								$stmt = mysqli_prepare($link, $sql);
								$date_of_record = date("Y-m-d H:i:s");
								mysqli_stmt_bind_param($stmt, "ssssd", $_SESSION["username"], $From, $To, $date_of_record, $change);
								if (mysqli_stmt_execute($stmt)) {
									echo "<p>SUCCESS</p>";
								} else {
									echo "Please try later.";
								}
							} else {
								echo "Please try later.";
							}
						} else {
							echo "You donot have enough currency.";
						}
					} else {
						echo "Please try later.";
					}
				}
				?>
			</div>
		</div>

</form>
</div>

</body>
</html>

<?php
$contect = "<table class='table table-striped' style='margin: 10px auto; font-size: 18px;'><tr><th>Currency</th><th>Exchange value(1 HKD TO Currency)</th><th>Update time</th></tr>";
$contect .= "<tr><td>HKD to Cardeno</td><td>" . $db_data_value[0] . "</td><td>" . $db_data_update_date[0] . "</td></tr>";
$contect .= "<tr><td>HKD to Bitcoin</td><td>" . $db_data_value[1] . "</td><td>" . $db_data_update_date[1] . "</td></tr>";
$contect .= "<tr><td>HKD to CNY</td><td>" . $db_data_value[2] . "</td><td>" . $db_data_update_date[2] . "</td></tr>";
$contect .= "<tr><td>HKD to Doge</td><td>" . $db_data_value[3] . "</td><td>" . $db_data_update_date[3] . "</td></tr>";
$contect .= "<tr><td>HKD to Ethereum</td><td>" . $db_data_value[4] . "</td><td>" . $db_data_update_date[4] . "</td></tr>";
$contect .= "<tr><td>HKD to EURO</td><td>" . $db_data_value[5] . "</td><td>" . $db_data_update_date[5] . "</td></tr>";
$contect .= "<tr><td>HKD to JPY</td><td>" . $db_data_value[6] . "</td><td>" . $db_data_update_date[6] . "</td></tr>";
$contect .= "<tr><td>HKD to USD</td><td>" . $db_data_value[7] . "</td><td>" . $db_data_update_date[7] . "</td></tr>";
$contect .= "</table>";
echo $contect;
?>

<?php
include_once 'footer.php';
?>