<?php 
    session_start();
    require 'dbconfig/config.php';

    $itemid=$_POST['itemid'];
    
    $sql="SELECT price FROM itemdb WHERE itemid LIKE '$itemid'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);

    $price=$row['price'];

    echo json_encode($price);


?>