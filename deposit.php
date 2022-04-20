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
    <input type="radio" id="converter" name="converter" value="HKDEUR" checked>
    <label for="HKDEUR"> HKD to EURO</label><br>

    <input type="radio" id="converter" name="converter" value="EURHKD">
    <label for="HKDEUR"> EURO to HKD</label><br>


    <input type="radio" id="converter" name="converter" value="HKDUSD">
    <label for="HKDUSD"> HKD to USD</label><br>

    <input type="radio" id="converter" name="converter" value="USDHKD">
    <label for="HKDUSD"> USD to HKD</label><br>

    <input type="radio" id="converter" name="converter" value="HKDJPY">
    <label for="HKDJPY"> HKD to JPY</label><br>
    
	<input type="radio" id="converter" name="converter" value="JPYHKD">
    <label for="HKDJPY"> JPY to HKD</label><br>
	
    <input type="radio" id="converter" name="converter" value="HKDCNY">
    <label for="HKDCNY"> HKD to CNY</label><br>

    <input type="radio" id="converter" name="converter" value="CNYHKD">
    <label for="HKDCNY"> CNY to HKD</label><br>
	
    <input type="radio" id="converter" name="converter" value="HKDBTC">
    <label for="HKDBTC"> HKD to Bitcoin</label><br>
    
	<input type="radio" id="converter" name="converter" value="BTCHKD">
    <label for="HKDBTC"> Bitcoin to HKD </label><br>
	
    <input type="radio" id="converter" name="converter" value="HKDETH">
    <label for="HKDETH"> HKD to Ethereum</label><br>
    
    <input type="radio" id="converter" name="converter" value="ETHHKD">
    <label for="HKDETH"> Ethereum to HKD</label><br>
	
    <input type="radio" id="converter" name="converter" value="HKDADA">
    <label for="HKDADA"> HKD to Cardeno</label><br>

    <input type="radio" id="converter" name="converter" value="ADAHKD">
    <label for="HKDADA"> Cardeno to HKD</label><br>
	
    <input type="radio" id="converter" name="converter" value="HKDDog">
    <label for="HKDDog"> HKD to Doge</label><br>
	
	<input type="radio" id="converter" name="converter" value="DogHKD">
    <label for="HKDDog"> Doge to HKD</label><br>
	
    Plase input the Value to exchange:<input type="number" name="value" required="required" pattern="[0-9]{1,20}">
    <input type="submit" value="Deposit">
</form>
</html>

<?php

	$_SESSION["username"]="test";
	$sql = "SELECT * FROM exchange;";
	$stmt = mysqli_prepare($link, $sql);
	if(mysqli_stmt_execute($stmt)){
		$query=$stmt->get_result();
		foreach ($query as $row){
			$db_data_currency[]=$row['currency']; 
			$db_data_value[]=$row['value'];
			$db_data_update_date[]=$row['update_date'];
		}
		$contect="<table><tr><th>Currency</th><th>Exchange value(1 HKD TO Currency)</th><th>Update time</th></tr>";
		$contect.="<tr><td>HKD to Cardeno</td><td>".$db_data_value[0]."</td><td>".$db_data_update_date[0]."</td></tr>";
		$contect.="<tr><td>HKD to Bitcoin</td><td>".$db_data_value[1]."</td><td>".$db_data_update_date[1]."</td></tr>";
		$contect.="<tr><td>HKD to CNY</td><td>".$db_data_value[2]."</td><td>".$db_data_update_date[2]."</td></tr>";
		$contect.="<tr><td>HKD to Doge</td><td>".$db_data_value[3]."</td><td>".$db_data_update_date[3]."</td></tr>";
		$contect.="<tr><td>HKD to Ethereum</td><td>".$db_data_value[4]."</td><td>".$db_data_update_date[4]."</td></tr>";
		$contect.="<tr><td>HKD to EURO</td><td>".$db_data_value[5]."</td><td>".$db_data_update_date[5]."</td></tr>";
		$contect.="<tr><td>HKD to JPY</td><td>".$db_data_value[6]."</td><td>".$db_data_update_date[6]."</td></tr>";
		$contect.="<tr><td>HKD to USD</td><td>".$db_data_value[7]."</td><td>".$db_data_update_date[7]."</td></tr>";
		$contect.="</table>";
		echo $contect;
	}else{echo "Please try later.";}
    if($_SERVER["REQUEST_METHOD"] == "POST"){		
		if($_POST['converter']==null){echo "radio is empty";}
		elseif($_POST['converter']=="HKDADA"){
			$change=$_POST['value']*$db_data_value[0];
		}
		elseif($_POST['converter']=="ADAHKD"){
			$change=1/($_POST['value']*$db_data_value[0]);
		}
		elseif($_POST['converter']=="HKDBTC"){
			$change=$_POST['value']*$db_data_value[1];
		}
		elseif($_POST['converter']=="BTCHKD"){
			$change=1/($_POST['value']*$db_data_value[1]);
		}
		elseif($_POST['converter']=="HKDCNY"){
			$change=$_POST['value']*$db_data_value[2];
		}
		elseif($_POST['converter']=="CNYHKD"){
			$change=1/($_POST['value']*$db_data_value[2]);
		}
		elseif($_POST['converter']=="HKDDog"){
			$change=$_POST['value']*$db_data_value[3];
		}
		elseif($_POST['converter']=="DogHKD"){
			$change=1/($_POST['value']*$db_data_value[3]);	
		}
		elseif($_POST['converter']=="HKDETH"){
			$change=$_POST['value']*$db_data_value[4];
		}
		elseif($_POST['converter']=="ETHHKD"){
			$change=1/($_POST['value']*$db_data_value[4]);
		}
		elseif($_POST['converter']=="HKDEUR"){
			$change=$_POST['value']*$db_data_value[5];
		}
		elseif($_POST['converter']=="EURHKD"){
			$change=1/($_POST['value']*$db_data_value[5]);
		}
		elseif($_POST['converter']=="HKDJPY"){
			$change=$_POST['value']*$db_data_value[6];
		}
		elseif($_POST['converter']=="JPYHKD"){
			$change=1/($_POST['value']*$db_data_value[6]);
		}
		elseif($_POST['converter']=="HKDUSD"){
			$change=$_POST['value']*$db_data_value[7];
		}
		elseif($_POST['converter']=="USDHKD"){
			$change=1/($_POST['value']*$db_data_value[7]);
		}
		$From=substr($_POST['converter'],0,3);
		$To=substr($_POST['converter'],3,6);
		$sql = "SELECT * FROM user where username = ?";
		$stmt = mysqli_prepare($link, $sql);
		mysqli_stmt_bind_param($stmt, "s",$_SESSION["username"]);
		if(mysqli_stmt_execute($stmt)){
			$query=$stmt->get_result();
				foreach ($query as $row){
					$From_currency=$row[$From];
					$To_currency=$row[$To];
				}
				echo $From_currency;
				echo $To_currency;
				if ($_POST['value']<$From_currency){
					$From_currency=$From_currency-$_POST['value'];
					$To_currency=$To_currency+$change;
					$sql = "UPDATE user set ".$From." = ?,".$To." = ? where username = ?;";
					$stmt = mysqli_prepare($link, $sql);
					mysqli_stmt_bind_param($stmt, "dds",$From_currency,$To_currency,$_SESSION["username"]);
					if(mysqli_stmt_execute($stmt)){
						$sql = "INSERT INTO record (username,from_currency,to_currency,datetime,value) VALUES (?,?,?,?,?);";
						$stmt = mysqli_prepare($link, $sql);
						$date_of_record=date("Y-m-d H:i:s");
						mysqli_stmt_bind_param($stmt, "ssssd", $_SESSION["username"],$From,$To,$date_of_record,$change);
						if(mysqli_stmt_execute($stmt)){echo "SUCCESS";}
						else{echo "Please try later.";}
					}else{echo "Please try later.";}
			    }else{echo "You donot have enough currency.";} 
		}else{echo "Please try later.";}
    }
?>

<?php
 include_once 'footer.php';
?>