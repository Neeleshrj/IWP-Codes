<html>

<title>Lab 9</title>

<?php

$userdb = array(
    array('user' => 'John123', 'pass' => 'abc123'), array('user' => 'Jane123', 'pass' => 'abc123')
);


function verify($usr, $pass, $array)
{

    $flag = 0;
    $uf=0;
    foreach ($array as $key => $val) {
        if (strcmp($usr, $val['user']) == 0) {
            $uf=1;
            if (strcmp($pass, $val['pass']) != 0) {
                echo '<script>alert("Invalid Password!")</script>';
                $flag = 1;
                return $key;
            }
        break;
        }
        
    }
    if($uf == 0) {
            echo '<script>alert("Invalid Username!")</script>';
            $flag = 1;
        }

    
    return $flag;
}

if (isset($_POST['loginbtn'])) {
    $usrname = $_POST["user"];
    $passwrd = $_POST["pass"];
    $x = verify($usrname, $passwrd, $userdb);
    if ($x == 0) {
        echo '<script>alert("Valid credentials!")</script>';
        $cookie_name = "username";
        $cookie_value = $usrname;
        setcookie($cookie_name, $cookie_value, "/");
        //session_name($usrname);
        session_start();
        $_SESSION['bill']=0;
        $_SESSION['Squan']=0;
        $_SESSION['Cquan']=0;
        $_SESSION['Tquan']=0;
        $_SESSION['Hquan']=0;
        echo '<script>window.location.href = "./lab9shop.php";</script>';
        
    }
}
?>


<center>

    <body>
        <div id="form_box">
            <h1>Login</h1>
            <form method="post" action="lab9login.php">
                <label>Username:</label>
                <input type="text" name="user" required /><br><br>
                <label>Password</label>
                <input type="password" name="pass" required /><br><br>
                <input type="submit" value="Submit" name="loginbtn" id="loginbtn" />
            </form>
        </div>
    </body>
</center>

</html>

<style>
#form_box {
    margin-top: 100px;
    background-color: #ff7675;
    width: 40%;
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
    width: 200px;
    padding: 12px 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

#loginbtn {
    border-radius: 10px;
    border: lightgreen solid 1px;
    background-color: lightgreen;
    width: 100px;
    height: 50px;
}
</style>