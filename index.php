<?php
define('Myheader', TRUE);
define('Myfooter', TRUE);
include_once 'header.html';

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
<div class="img1"></div>

<div style="height:500px;background-color:blue;font-size:36px">
In this website,you can buy or sell the NFT art. 
</div>

<div class="img2"></div>

<div style="height:500px;background-color:blue;font-size:36px">
In this website,you can buy or sell the NFT art. 
</div>

<div class="img3"></div>

<?php
include_once 'footer.php';
?>