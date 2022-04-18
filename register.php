<?php
include_once 'header.php';

// Include config file
require_once 'inc\register.inc.php';

// Define variables and initialize with empty values
$username = $password = $confirmpwd = $email  = "";
$username_err = $password_err = $confirmpwd_err = $email_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
            // Validate username
            if(empty(trim($_POST["username"]))){
                $username_err = "Please enter a username.";
            } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
                $username_err = "Username can only contain letters, numbers, and underscores.";
            } else{

        // Prepare a select statement
        $sql = "SELECT username FROM user WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    $email = trim($_POST["email"]);

    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter a email.";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_err = "email invaild.";
    } else{
        // Prepare a select statement
        $sql = "SELECT email FROM user WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){

                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }



    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 2){//要改翻6
        $password_err = "Password must have at least 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirmpwd"]))){
        $confirmpwd_err = "Please confirm password.";     
    } else{
        $confirmpwd = trim($_POST["confirmpwd"]);
        if(empty($password_err) && ($password != $confirmpwd)){
            $confirmpwd_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirmpwd_err) && empty($email_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO user (username, password, email) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_email = $email;

            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $param_email,);
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                
                // Redirect to login page
                header("location: login.php");
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

<body style="background-color: rgb(32, 34, 37);">

<div class="parallax-2">

    <section class="signupform">
            <h2>Signup</h2>                
            <div>
            </div>
           
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                
                <div class="signup-item">
                    <label for="username">Username </label>
                    <input type="username" name="username" class="form-control" placeholder="Username">
                </div>
            
                <div class="signup-item">
                    <label>E-mail</label>
                    <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                    <span class=""><?php echo $email_err; ?></span> 
                </div>

                <div class="signup-item">
                    <label for="password">Password <br></label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>

                <div class="signup-item">
                    <label for="confirmpwd">Confirm password </label>
                    <input type="password" name="confirmpwd" class="form-control" placeholder="Confirm password">
                </div>
                
                <br>
                <div class="g-recaptcha" data-sitekey="6LfADE4fAAAAAMksGMbGSHicRXf-A1CceGM2srtb"></div>
                <br>
                <div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <input type="reset" class="btn btn-secondary ml-2" value="Reset">
                </div>
            </form>

        <?php
        if(!empty($username_err)){
            echo $username_err . "<br>";
        }
        if(!empty($email_err)){
            echo $email_err . "<br>";
        }
        if(!empty($password_err)){
            echo $password_err . "<br>";
        }
        if(!empty($confirmpwd_err)){
            echo $confirmpwd_err . "<br>";
        }

        ?>
    </section>
    </div>

    </body>
    
<?php
 include_once 'footer.php';
?>
