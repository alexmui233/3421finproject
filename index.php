<?php
define('Myheader', TRUE);
define('Myfooter', TRUE);
include_once 'header.php';
require_once 'functions.php';
?>
<div class="img1">
<div class="qccontainer">
        <h1 class="qcheader">Quick Currency Converter</h1>
        <div class="qcbox">
            <div>
                <select name="currency" class="currency"></select>
                <input class="qcinput" type="number" name="" id="num">
            </div>
            <div>
                <select name="currency" class="currency"></select>
                <input class="qcinput" type="text" name="" id="ans" disabled>
            </div>
        </div>
        <button class="qcbtn" id="qcbtn">Convert</button>
    </div>
    <script src="js/quickconverter.js"></script>
</div>

<div class ="index-div">
    <p>You can buy or exchange the virtual currencies
        <br> or national currencies here.</p>
    <?php if(isset($_SESSION["username"])){?>
    <a class="index-btn" href="deposit.php">Exchange now!</a>
    <?php } 
    else{
    ?>
    <a class="index-btn" href="register.php">Join</a>
    <?php } ?>
</div>

<div class="img2"></div>

<div class ="index-div" >
    <p>You can view the virtual currency real time exchange rates here.</p>
    <?php if(isset($_SESSION["username"])){?>
    <a class="index-btn" href="exchange_rate.php">View now!</a>
    <?php } 
    else{
    ?>
    <a class="index-btn" href="register.php">Join</a>
    <?php } ?>
</div>

<div class="img3"></div>


<?php
include_once 'footer.php';
?>