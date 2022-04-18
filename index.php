<?php
define('Myheader', TRUE);
define('Myfooter', TRUE);
include_once 'header.php';
require_once 'functions.php';

/* $sql = "SELECT profile_image FROM user WHERE username = ?";

if ($stmt = mysqli_prepare($link, $sql)) {
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "s", $param_username);

    // Set parameters
    $param_username = $_SESSION["username"];

    mysqli_stmt_execute($stmt);

    //Getting the result
    $res = mysqli_stmt_get_result($stmt);

    $image = mysqli_fetch_row($res);

    // Close statement
    mysqli_stmt_close($stmt);
} */

?>
<div class="img1">
<div class="qccontainer">
        <h1 class="qcheader">Quick Currency Converter</h1>
        <div class="qcbox">
            <div>
                <select name="currency" class="currency"></select>
                <input type="number" name="" id="num">
            </div>
            <div>
                <select name="currency" class="currency"></select>
                <input type="text" name="" id="ans" disabled>
            </div>
        </div>
        <button class="qcbtn" id="qcbtn">Convert</button>
    </div>
    <script src="js/quickconverter.js"></script>
</div>

<div class ="index-div">
    <p>You can buy or exchange the virtual currencies
        <br> or national currencies here.</p>
    <a class="index-btn" href="register.php">Join</a>
</div>

<div class="img2"></div>

<div class ="index-div" >
    <p>You can view the virtual currenc
        y real time exchange rates here.</p>
    <a class="index-btn" href="register.php">Join</a>
</div>

<div class="img3"></div>


<?php
include_once 'footer.php';
?>