<?php
if(!defined('Myheader')){
    exit('Access denied');
}
session_start();
require_once 'config.php'; 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge"/>
    <title>moneyexchange</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://kit.fontawesome.com/170b91bc52.js" crossorigin="anonymous"></script>
    
</head>
<body>
    <nav class="navbar">
        <input type="checkbox" id="headcheck">
        <label for="headcheck" class="hcbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">Moneyexchange</label>
        <ul>
                <li><a href="index.php">Home</a></li>
            <?php if(isset($_SESSION["username"])){?>
                <li><a href="exchange_rate.php">Exchange Rate</a></li>
                <li><a href="deposit.php">Deposit</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
            <?php } 
            else{
            ?>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
            <?php } ?>
        </ul>
    </nav>


