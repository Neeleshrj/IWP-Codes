<?php

session_start();

require 'dbconfig/config.php';
    
?>
<!DOCTYPE html>
<html>

<head>
    <title>LOGIN</title>
</head>

<body style="font-family: Courier New;">
    <center>
        <div id="loginform">


            <form class="myform" action="lab10login.php" method="post">

                <input name="email" type="text" class="inputvalues" placeholder="email" required /> <br>

                <input name="pass" type="password" class="inputvalues" placeholder="Password" required /><br>

                <input name="login" type="submit" id="loginbtn" value="Login" />

                <p style="color:white">Not a user yet?</p>
                <a href="lab10register.php"><input type="button" id="register_btn" value="Register" />

            </form>

            <?php

        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $pass = $_POST['pass'];

            $query = "SELECT * FROM userinfo WHERE email='$email' AND pass='$pass'";

            $query_run = mysqli_query($con, $query);

            if (mysqli_num_rows($query_run) > 0) {
                $row = mysqli_fetch_assoc($query_run);
                $_SESSION['email'] = $row['email'];
                //$_SESSION['cart']=array();
                $_SESSION['cname']=array();
                $_SESSION['cprice']=array();
                header('location:lab10cart.php');
            } else {
                echo '<script type="text/javascript"> alert("Invalid Credentials!") </script>';
            }
        }

        ?>

        </div>
    </center>
</body>


</html>

<style>
#loginform {
    margin-top: 100px;
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

#loginbtn {
    margin-top: 10px;
    border-radius: 10px;
    border: lightgreen solid 1px;
    background-color: lightgreen;
    width: 100px;
    height: 30px;
}

#register_btn {
    border-radius: 10px;
    border: #eb4d4b solid 1px;
    background-color: #eb4d4b;
    width: 100px;
    height: 30px;
}
</style>