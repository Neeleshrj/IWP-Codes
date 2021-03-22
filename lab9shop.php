<html>

<?php

session_start();
$cookie_name = 'username';


$itemdb =array();
$itemqun=array();
if(isset($_POST['soapA'])){
    
    $_SESSION['Squan']=$_SESSION['Squan']+1;
    $_SESSION['bill']=$_SESSION['bill']+100;
}
if(isset($_POST['cornfA'])){
    $_SESSION['Cquan']=$_SESSION['Cquan']+1;
    $_SESSION['bill']=$_SESSION['bill']+80;
    
}
if(isset($_POST['toothA'])){
    $_SESSION['Tquan']=$_SESSION['Tquan']+1;
    $_SESSION['bill']=$_SESSION['bill']+60;
   
}
if(isset($_POST['honeyA'])){
    $_SESSION['Hquan']=$_SESSION['Hquan']+1;
    $_SESSION['bill']=$_SESSION['bill']+220;
    
}
if(isset($_POST['soapR'])){
    if($_SESSION['Squan']*100>=100){
        $_SESSION['Squan']=$_SESSION['Squan']-1;
        $_SESSION['bill']=$_SESSION['bill']-100;
    }
    else{
        echo '<script>alert("Cannot go below 0!")</script>';
    }
}
if(isset($_POST['cornfR'])){
    if($_SESSION['Cquan']*80>=80){
        $_SESSION['Cquan']=$_SESSION['Cquan']-1;
        $_SESSION['bill']=$_SESSION['bill']-80;
    }
    else{
        echo '<script>alert("Cannot go below 0!")</script>';
    }
    
    
}
if(isset($_POST['toothR'])){
    if($_SESSION['Tquan']*60>=60){
        $_SESSION['Tquan']=$_SESSION['Tquan']-1;
        $_SESSION['bill']=$_SESSION['bill']-60;
    }
    else{
        echo '<script>alert("Cannot go below 0!")</script>';
    }
    
   
}
if(isset($_POST['honeyR'])){
    if($_SESSION['Hquan']*220>=220){
        $_SESSION['Hquan']=$_SESSION['Hquan']-1;
    $_SESSION['bill']=$_SESSION['bill']-220;
    }
     else{
        echo '<script>alert("Cannot go below 0!")</script>';
    }
    
}


if(isset($_POST['billing'])){
    echo '<script>window.location.href = "./lab9bill.php";</script>';
}

if(isset($_POST['logout'])){
    
    session_unset();
    echo '<script>window.location.href = "./lab9login.php";</script>';
    
}

?>

<center>

    <body style="background-color:#ff7675;font-family: 'Courier New';">
        <h1>Welcome <?php
                echo $_COOKIE[$cookie_name];
                ?></h1>

        <div id="itembox">
            <form method="post">
                <label>Soap:₹100</label><br>
                <input type="submit" value="Add" name="soapA" id="btn" />
                <input type="submit" value="Remove" name="soapR" id="btn" /><br>
            </form>
            <?php 
            echo "Qty:",$_SESSION['Squan'];
        
        ?>
        </div>
        <div id="itembox">
            <form method="post">
                <label>Cornflakes:₹80</label><br>
                <input type="submit" value="Add" name="cornfA" id="btn" />
                <input type="submit" value="Remove" name="cornfR" id="btn" /><br>
            </form>
            <?php 
            echo "Qty:",$_SESSION['Cquan'];
        
        ?>
        </div>
        <div id="itembox">
            <form method="post">
                <label>Toothpaste:₹60</label><br>
                <input type="submit" value="Add" name="toothA" id="btn" />
                <input type="submit" value="Remove" name="toothR" id="btn" /><br>
            </form>
            <?php 
            echo "Qty:",$_SESSION['Tquan'];
        
        ?>
        </div>
        <div id="itembox">
            <form method="post">
                <label>Honey:₹220</label><br>
                <input type="submit" value="Add" name="honeyA" id="btn" />
                <input type="submit" value="Remove" name="honeyR" id="btn" /><br>
            </form>
            <?php 
            echo "Qty:",$_SESSION['Hquan'];
        
        ?>
        </div>


        <form method="post">
            <input type="submit" value="Calculate Bill" name="billing" id="btn" />
        </form>
        <br>
        <form method="post">
            <input type="submit" value="Logout" name="logout" id="btn" />
        </form>

    </body>
</center>

</html>

<style>
#itembox {
    width: 150px;
    height: 20px;
    border: black solid 1px;
    padding: 40px;
    display: inline-block;
    border-radius: 10px;
    background-color: white;
}

#cart {
    width: 300px;
    float: right;
    height: 200px;
    border: solid black 1px;
    padding: 10px;
    text-align: center;
}

#btn {
    width: 70px;
    height: 30px;
    background-color: #00cec9;
    border: solid #00cec9;
    border-radius: 20px;
}
</style>