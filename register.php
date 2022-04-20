<?php
define('Myheader', TRUE);
define('Myfooter', TRUE);
include_once 'header.php';

// Define variables and initialize with empty values
$username = $password = $confirmpwd = $email  = "";
$username_err = $password_err = $confirmpwd_err = $email_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else {

        // Prepare a select statement
        $sql = "SELECT username FROM user WHERE username = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    $email = trim($_POST["email"]);

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter a email.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_err = "email invaild.";
    } else {
        // Prepare a select statement
        $sql = "SELECT email FROM user WHERE email = ?";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);

            // Set parameters
            $param_email = trim($_POST["email"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {

                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $email_err = "This email is already taken.";
                } else {
                    $email = trim($_POST["email"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }



    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have at least 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirmpwd"]))) {
        $confirmpwd_err = "Please confirm password.";
    } else {
        $confirmpwd = trim($_POST["confirmpwd"]);
        if (empty($password_err) && ($password != $confirmpwd)) {
            $confirmpwd_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if (empty($username_err) && empty($password_err) && empty($confirmpwd_err) && empty($email_err)) {

        // Prepare an insert statement
        $sql = "INSERT INTO user (username, password, email) VALUES (?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            // Bind variables to the prepared statement as parameters


            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_email = $email;

            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $param_email,);
            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {

                // Redirect to login page
                header("location: login.php");
            } else {
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


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    
    <link rel="stylesheet" href="styles.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
        textarea {
            resize: none;
        }

        .form-control {
            display: block;
            width: 100%;
            height: 34px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 4px;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
            -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
        }
        .btn:not(:disabled):not(.disabled) {
  cursor: pointer;
}
input[type="button"].btn-block, input[type="reset"].btn-block, input[type="submit"].btn-block {
  width: 100%;
}
.btn-block {
  display: block;
  width: 100%;
}
.form-group {
  margin-bottom: 1rem;
}
.btn-primary:hover {
  color: #fff;
  background-color: #0069d9;
  border-color: #0062cc;
}
.btn-secondary:hover {
  color: #fff;
  background-color: #5a6268;
  border-color: #545b62;
}
.btn:hover {
  color: #212529;
  text-decoration: none;
}
.btn {
color: white;
background-color: #007bff;
font-weight: 400;
text-align: center;
border: 1px solid transparent;
padding: .375rem .75rem;
font-size: 1rem;
line-height: 1.5;
border-radius: .25rem;
transition: color .15s ease-in-out,
background-color .15s ease-in-out,
border-color .15s ease-in-out,
box-shadow .15s ease-in-out;
}
.btn-block + .btn-block {
  margin-top: .5rem;
}
    </style>
    </script>
</head>


<body style="background-color: rgb(32, 34, 37);">





    <div class="parallax-2">
        <section class="signupform">
            <h2>REGISTER</h2>
            <div>
            </div>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="username">Username </label>
                    <input type="username" name="username" class="form-control" placeholder="Username">
                </div>
                <br>
                <div class="form-group">
                    <label>Email </label>
                    <input type="email" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" placeholder="Email">
                    <span class=""><?php echo $email_err; ?></span>
                </div>
                <br>
                <div class="form-group">
                    <label for="password">Password <br></label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <br>
                <div class="form-group">
                    <label for="confirmpwd">Confirm password </label>
                    <input type="password" name="confirmpwd" class="form-control" placeholder="Confirm password">
                </div>

                <br>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-block" value="Submit">
                    <input type="reset" style="background-color: #6c757d;"class="btn btn-secondary btn-block" value="Reset">
                </div>

            </form>

            <?php
            if (!empty($username_err)) {
                echo $username_err . "<br>";
            }
            if (!empty($email_err)) {
                echo $email_err . "<br>";
            }
            if (!empty($password_err)) {
                echo $password_err . "<br>";
            }
            if (!empty($confirmpwd_err)) {
                echo $confirmpwd_err . "<br>";
            }

            ?>
        </section>
    </div>

</body>

<?php
include_once 'footer.php';
?>