<?php
define('Myheader', TRUE);
define('Myfooter', TRUE);
include_once 'header.php';

/* // Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
} */


// Define variables and initialize with empty values
$username = $password = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM user WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: index.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}


?>
<html>

    <body style="background-color: rgb(32, 34, 37);">

    <div style="height: 100vh;  width: 100%; background-color:#39ac37">

        <div style="background-color: white; width: 800px; height: 600px; margin: 0px auto; padding: 20px;  border-radius: 10px">
            <div class="profilediv">
                <h1 style="color: #39ac37;">My Profile</h1>
                <h2 class="">Your can view your account information in here.</h2>
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
                    
                    foreach ($query as $row){}?>
                        <div>
                        <form class="reform" action="">
                                <fieldset class="refieldset">
                                    
                                    <div class="reformdiv">
                                        <label for="" style="">Username: </label>
                                        <input class="reformdivinput" type="text" name="username" value="<?php echo $row['username'];?>" readonly><br>
                                        <label for="" style="">Password: </label>
                                        <input class="reformdivinput" type="password" name="password" value="<?php echo $row['password'];?>" readonly>
                                        <br>
                                        <label for="" style="">Email: </label>
                                        <input class="reformdivinput" type="email" name="email" value="<?php echo $row['email'];?>" readonly>
                                        <br>
                                        <label for="" style="">HKD: </label>
                                        <input class="reformdivinput" type="text" name="password" value="<?php echo $row['HKD'];?>" readonly>
                                        <br>
                                        <p>If you want to add value,you can email alex@test.com</p>
                                        </div>
                                </fieldset>
                        </form>
                    </div>
                    
                <?php
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
        <div class="parallax-3">
            
            <section  class="loginform">
                <h2>Login</h2>
                <p>Please fill in your credentials to login.</p>

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="login-item">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username">
                        <span class="invalid-feedback"></span>
                    </div>
                    <div class="login-item">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control"  placeholder="Password">
                        <span class="invalid-feedback"></span>
                    </div>

                    <div class="login-item">
                        <br>
                            <div class="g-recaptcha" data-sitekey="6LcjnHYfAAAAAAfCp_b518ZzuFQz11qkNLZ8EcC5" style="margin-left: 10px" ></div>
                        <span class="invalid-feedback"></span>
                        <br>
                    </div>

                    <div class="login-item">
                        <div>
                            <input type="checkbox" value="Remember me" name="remember_me_checkbox" />
                            <label for="remember_me_checkbox">Remember Me</label>
                            <br><br>
                        </div>
                        <input type="submit" class="login-btn" value="Login">
                    </div>

                    <p>Haven’t register yet?<br><a href="register.php">Register your account</a></p>
                </form>
            </section>
            
        </div>
<?php include_once 'footer.php'; ?>