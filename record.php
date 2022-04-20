<?php
define('Myheader', TRUE);
define('Myfooter', TRUE);
include_once 'header.php';
?>

<?php
$sql = "SELECT * FROM record WHERE username = ?";

if ($stmt = mysqli_prepare($link, $sql)) {
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "s", $_SESSION["username"]);
    if (mysqli_stmt_execute($stmt)) {
        $query = $stmt->get_result();
        $contect = "<th>From currency</th><th>To currency</th><th>Time</th><th>Value</th>";
        foreach ($query as $row) {
            $contect .= "<tr><td>" . $row['from_currency'] . "</td><td>" . $row['to_currency'] . "</td><td>" . $row['datetime'] . "</td><td>" . $row['value'] . "</td></tr>";
        }
    } else {
        echo "Please try again";
    }
} else {
    echo "Datebase error";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        th {
            background-color: none;
        }
    </style>
</head>

<body style="background-color: rgb(32, 34, 37);">

    <div class="container" style="color: black;">
        <h2 style="text-align: center; color: #faa91f;">Exchange Record</h2>

        <table class="table table-striped">
            <?php echo $contect; ?>
        </table>
    </div>

</body>

</html>

<?php
include_once 'footer.php';
?>