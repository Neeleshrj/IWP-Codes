<!DOCTYPE html>
<html>
<title>
    Shopping Cart
</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




<?php
    require 'dbconfig/config.php';
    session_start();
    

    if(isset($_POST['add'])){
        $name=$_POST['name'];
        
        $sql="SELECT * FROM itemdb WHERE name='$name'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        $price=$row['price'];
        if($row['quantity']==0){
            echo '<script>alert("Item Out of Stock!")
</script>';
}
else{
array_push($_SESSION['cname'],$name);
array_push($_SESSION['cprice'],$price);
$newquan=$row['quantity']-1;
$query = "UPDATE itemdb SET quantity ='$newquan' WHERE name='$name' ";
$query_run = mysqli_query($con, $query);


}
}



if(isset($_POST['logout'])){

session_unset();
echo '<script>
window.location.href = "./lab10login.php";
</script>';

}


?>

<center>

    <body style="font-family: Courier New;">

        <h1>Available Items</h1>
        <div id="cartitems">

            <?php 
                    
                    $sql="SELECT * FROM itemdb";
                    $result = mysqli_query($con, $sql);
                    while($row = mysqli_fetch_assoc($result)){ ?>
            <!-- <div id="itembox" onmouseover="send(<?php //echo $row['itemid'] ?>)"
                onmouseout="clearout(<?php// echo $row['itemid'] ?>)"> -->
            <div id="itembox">
                <form method="post" action="lab10cart.php">
                    <?php echo "<img id='images' src='imgs/".$row["image"]."' onmouseover='send(".$row['itemid']. ")'
                        onmouseout='clearout(".$row['itemid'] .")'/>"; ?>
                    <h4><?php  echo $row['name'] ?></h4>
                    <!-- <h4>Price:</h4>
                    <p><?php //echo $row['price'] ?></p> -->
                    <h4>Available Stock:</h4>
                    <p><?php echo $row['quantity'] ?></p>

                    <input type="hidden" name="name" value="<?php echo $row['name'] ?>" />
                    <input type="submit" value="ADD" name="add" id="add" />

                </form>
                <br><br>
                <div id="pricebox" class="price" data-un="<?php echo $row['itemid'] ?>">
                </div>
            </div>

            <?php } ?>

            <form method="post">
                <input type="submit" value="Logout" name="logout" id="logout_btn" />
            </form>
        </div>
        <div id="cart">
            <?php
                    if(count($_SESSION['cname'])==0){
                        echo "<h3>Cart is Empty!</h3>";
                    }
                    else if(count($_SESSION['cname'])>0){
                        echo "<h3>CART</h3>";
                        for($i=0;$i<count($_SESSION['cname']);$i++){
                            echo $_SESSION['cname'][$i],":",$_SESSION['cprice'][$i];;
                            echo "<br>";
                        }
                        ?>
            <h4>Total:<?php echo array_sum($_SESSION['cprice'])?></h4>

            <?php    
                    }
                
                ?>
        </div>
    </body>

</center>

</html>

<script>
function send(item_id) {
    var itemid = item_id;
    $("#pricebox").data("un", itemid);
    $.ajax({
        url: 'lab10showprice.php',
        type: 'post',
        data: {
            itemid: itemid,
        },
        success: function(data) {
            var jdata = jQuery.parseJSON(data);
            console.log($("#pricebox").data("un"));
            console.log(itemid);
            if ($("#pricebox").data("un") == itemid) {
                console.log("yes");
                if (itemid == 1) {
                    $("[data-un=1]").html(data);
                }
                if (itemid == 2) {
                    $("[data-un=2]").html(data);
                }
                if (itemid == 3) {
                    $("[data-un=3]").html(data);
                }
                if (itemid == 4) {
                    $("[data-un=4]").html(data);
                }
                if (itemid == 5) {
                    $("[data-un=5]").html(data);
                }
                if (itemid == 6) {
                    $("[data-un=6]").html(data);
                }
                if (itemid == 7) {
                    $("[data-un=7]").html(data);
                }
            }

            console.log(jdata);
        }
    });


}

function clearout(item_id) {
    var itemid = item_id;
    if ($("#pricebox").data("un") == itemid) {
        console.log("clear");
        if (itemid == 1) {
            $("[data-un=1]").html("");
        }
        if (itemid == 2) {
            $("[data-un=2]").html("");
        }
        if (itemid == 3) {
            $("[data-un=3]").html("");
        }
        if (itemid == 4) {
            $("[data-un=4]").html("");
        }
        if (itemid == 5) {
            $("[data-un=5]").html("");
        }
        if (itemid == 6) {
            $("[data-un=6]").html("");
        }
        if (itemid == 7) {
            $("[data-un=7]").html("");
        }
    }
}
</script>
<style>
#images {
    width: 150px;
    height: 100px;
}


#itembox {
    margin-top: 20px;
    width: 200px;
    height: 270px;
    border: black solid 1px;
    text-align: center;
    display: inline-block;
    background-color: #f9ca24;
}

#add {

    border: red solid 1px;
    background-color: red;
    width: 100px;
    height: 30px;
}

#logout_btn {
    margin-top: 20px;
    border-radius: 10px;
    border: #eb4d4b solid 1px;
    background-color: #eb4d4b;
    width: 100px;
    height: 30px;
}
</style>