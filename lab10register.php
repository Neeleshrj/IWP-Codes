<?php
session_start();
require 'dbconfig/config.php';

?>
<!DOCTYPE html>
<html>

<head>
    <title>Registration</title>

</head>

<body style="font-family: Courier New;">

    <div id="registerform">


        <?php
        if (isset($_POST['signup_btn'])) {

            $fname = $_POST['fname'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $cpass = $_POST['cpass'];
            if ($pass == $cpass) {
                $query = "SELECT * FROM userinfo WHERE email= '$email'";

                $query_run = mysqli_query($con, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    echo '<script type="text/javascript"> alert("Username already exists,try another name") </script>';
                } else {
                    
                    $query = "INSERT INTO userinfo VALUES('$fname','$email','$pass','0')";
                    $query_run = mysqli_query($con, $query);

                    if ($query_run) {
                        echo '<script type="text/javascript"> alert("User Registered!Go to Login page to login!") </script>';
                        echo '<script>window.location.href = "./lab10login.php";</script>';
                    } else {
                        echo '<script type="text/javascript"> alert("Error!") </script>';
                        
                    }
                }
            } else {
                echo '<script type="text/javascript"> alert("Error!Password and confirm password do not match!") </script>';
            }
        }

        ?>


        <form class="myform" action="lab10register.php" method="post" enctype="multipart/form-data">

            <input name="fname" type="text" class="inputvalues" style="margin-top:25px;margin-bottom:15px;"
                placeholder="Enter your Full Name" required /> <br>

            <input name="email" type="email" class="inputvalues" placeholder="Enter your email id" required />
            <br>

            <input name="pass" type="password" class="inputvalues" placeholder="Enter a password" required /><br>

            <input name="cpass" type="password" class="inputvalues" placeholder="Confirm your password"
                style="margin-bottom:15px;" required /><br>

            <a href="lab10login.php"><input name="signup_btn" type="submit" id="signup_btn" value="Register" /></a>
            <br><br>

            <a href="lab10login.php"><input name="backlg_btn" type="button" id="backlg_btn" value="Back" /></a>

        </form>
    </div>
</body>


</html>

<style>
#registerform {
    margin-top: 100px;
    margin-left: 40%;
    background-color: #22a6b3;
    width: 200px;
    padding: 20px;
    border-radius: 10px;
    font-family: 'Courier New';
}

label {
    display: inline-block;
    width: 100px;
    text-align: right;
    padding-right: 20px;
}

input[type="text"],
input[type="email"],
input[type="tel"],
input[type="password"] {
    margin-top: 20px;
    width: 200px;
    padding: 12px 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

#signup_btn {
    margin-top: 10px;
    border-radius: 10px;
    border: lightgreen solid 1px;
    background-color: lightgreen;
    width: 100px;
    height: 30px;
}

#backlg_btn {
    border-radius: 10px;
    border: #eb4d4b solid 1px;
    background-color: #eb4d4b;
    width: 100px;
    height: 30px;
}
</style>