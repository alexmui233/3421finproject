<?php
define('Myheader', TRUE);
define('Myfooter', TRUE);
include_once 'header.php';
?>

<html>

    <body style="background-color: rgb(32, 34, 37);">

    <div style="height: max-content;  width: 100%; padding: 100px">

        <div class="profilebackdiv">
            <div class="profilediv">
                <h1 style="color: #faa91f;">My Profile</h1>
                <h2 class="" style="color: #faa91f;">Your can view your account information in here.</h2>
            </div>
            <br><br>
            <?php

            // Prepare a select statement
            $sql = "SELECT * FROM user WHERE username = ?";

            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "s", $_SESSION["username"]);
                
                // Set parameters
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    
                    $query=$stmt->get_result();
                    
                    foreach ($query as $row){?>
                    <div>
                        <form class="" action="">
                                <fieldset class="" style="border: none;">
                                    
                                    <div style="text-align: center;">
                                        <label for="" style="color:#faa91f">Username: </label><br>
                                        <input class="reformdivinput" type="text" name="username" value="<?php echo $row['username'];?>" readonly>
                                        <br><br>
                                        <label for="" style="color:#faa91f">Email: </label><br>
                                        <input class="reformdivinput" type="email" name="email" value="<?php echo $row['email'];?>" readonly>
                                        <br><br>
                                        <label for="" style="color:#faa91f">HKD: </label><br>
                                        <input class="reformdivinput" type="text" name="password" value="<?php echo $row['HKD'];?>" readonly>
                                        <br><br>
                                        <label for="" style="color:#faa91f">CNY: </label><br>
                                        <input class="reformdivinput" type="text" name="password" value="<?php echo $row['CNY'];?>" readonly>
                                        <br><br>
                                        <label for="" style="color:#faa91f">JPY: </label><br>
                                        <input class="reformdivinput" type="text" name="password" value="<?php echo $row['JPY'];?>" readonly>
                                        <br><br>
                                        <label for="" style="color:#faa91f">EUR: </label><br>
                                        <input class="reformdivinput" type="text" name="password" value="<?php echo $row['EUR'];?>" readonly>
                                        <br><br>
                                        <label for="" style="color:#faa91f">USD: </label><br>
                                        <input class="reformdivinput" type="text" name="password" value="<?php echo $row['USD'];?>" readonly>
                                        <br><br>
                                        <label for="" style="color:#faa91f">Bitcoin: </label><br>
                                        <input class="reformdivinput" type="text" name="password" value="<?php echo $row['BTC'];?>" readonly>
                                        <br><br>
                                        <label for="" style="color:#faa91f">Ethereum: </label><br>
                                        <input class="reformdivinput" type="text" name="password" value="<?php echo $row['ETH'];?>" readonly>
                                        <br><br>
                                        <label for="" style="color:#faa91f">Cardeno: </label><br>
                                        <input class="reformdivinput" type="text" name="password" value="<?php echo $row['ADA'];?>" readonly>
                                        <br><br>
                                        <label for="" style="color:#faa91f">Doge Coin: </label><br>
                                        <input class="reformdivinput" type="text" name="password" value="<?php echo $row['Dog'];?>" readonly>
                                        <br><br>
                                        </div>
                                </fieldset>
                        </form>
                    </div>
                <?php }
                    
                
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
    
                // Close statement
                mysqli_stmt_close($stmt);
            }

          ?>

        </div>

    </div>

</html>

<?php include_once 'footer.php'; ?>