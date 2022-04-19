<?php
define('Myheader', TRUE);
define('Myfooter', TRUE);
include_once 'header.php';


?>
<html>

    <body style="background-color: rgb(32, 34, 37);">

    <div style="height: 100vh;  width: 100%; background-color: #222438; padding: 100px">

        <div class="profilebackdiv" style="">
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
                                    
                                    <div class="">
                                        <label for="" style="color:#faa91f">Username: </label>
                                        <input class="reformdivinput" type="text" name="username" value="<?php echo $row['username'];?>" readonly><br>
                                        <br>
                                        <label for="" style="color:#faa91f">Password: </label>
                                        <input class="reformdivinput" type="password" name="password" value="<?php echo $row['password'];?>" readonly>
                                        <br><br>
                                        <label for="" style="color:#faa91f">Email: </label>
                                        <input class="reformdivinput" type="email" name="email" value="<?php echo $row['email'];?>" readonly>
                                        <br><br>
                                        <label for="" style="color:#faa91f">HKD: </label>
                                        <input class="reformdivinput" type="text" name="password" value="<?php echo $row['HKD'];?>" readonly>
                                        <br>
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



    </div>
  
<?php include_once 'footer.php'; ?>