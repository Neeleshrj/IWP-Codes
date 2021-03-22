<html>

<title>Bill</title>

<?php 
    $cookie_name = 'username';
    session_start();


    if(isset($_POST['back'])){
        echo '<script>window.location.href = "./lab9shop.php";</script>';
    }

?>

<center>

    <body style="background-color:#ff7675;font-family: 'Courier New';">
        <h1>Welcome <?php
                echo $_COOKIE[$cookie_name];
                ?>
        </h1>
        <div id="billbox">
            <h1>Cart:</h1>
            <?php 
            echo "Soap * ",$_SESSION['Squan']," = ₹",100*$_SESSION['Squan'];
            echo "<br>";
            echo "Cornflakes * ",$_SESSION['Cquan']," = ₹",80*$_SESSION['Cquan'];
            echo "<br>";
            echo "Toothpaste * ",$_SESSION['Tquan']," = ₹",60*$_SESSION['Tquan'];
            echo "<br>";
            echo "Honey * ",$_SESSION['Hquan']," = ₹",220*$_SESSION['Hquan'];
            echo "<br>";
            echo "Total : ₹",$_SESSION['bill'];
        ?>

        </div>
        <br>
        <form method="post">
            <input type="submit" value="Cancel" name="back" id="btn" />
        </form>
        <button id="btn">Pay</button>


    </body>
</center>

</html>

<style>
#billbox {
    width: 300px;
    height: 250px;
    padding: 20px;
    border: black solid 1px;
    background-color: white;
}

#btn {
    width: 70px;
    height: 30px;
    background-color: #00cec9;
    border: solid #00cec9;
    border-radius: 20px;
}
</style>