<?php


$userdb = array(

    array(
        'tid' => '5152',
        'from' => 'Delhi',
        'to' => 'Chennai',
        'date' => '15-10-20',
        'First AC' => '60',
        'Second AC' => '100',
        'Third AC' => '60'
    ),
    array(
        'tid' => '5154',
        'from' => 'Lucknow',
        'to' => 'Mumbai',
        'date' => '17-10-20',
        'First AC' => '6',
        'Second AC' => '100',
        'Third AC' => '60'
    ),
    array(
        'tid' => '5156',
        'from' => 'Lucknow',
        'to' => 'Delhi',
        'date' => '15-10-20',
        'First AC' => '6',
        'Second AC' => '20',
        'Third AC' => '3'
    ),
    array(
        'tid' => '5158',
        'from' => 'Mumbai',
        'to' => 'Chennai',
        'date' => '16-10-20',
        'First AC' => '0',
        'Second AC' => '2',
        'Third AC' => '1'
    )
);


function searchForId($id, $class, $dateoftrv, $number, $array)
{
    foreach ($array as $key => $val) {
        if ($val['tid'] == $id) {
            $avseats = $val[$class];
            if ($avseats >= $number) {
                echo ("<br>");
                echo nl2br("Seats available");
                $flag = 1;
                return $key;
                break;
            } else {
                echo ("<br>");
                echo nl2br("Seats not available");
                return $key;
                break;
            }
        }
    }
}

if (isset($_POST['submit'])) {
    $name = $_POST["passname"];
    $from = $_POST["from"];
    $to = $_POST["to"];
    $class = $_POST["class"];
    $number = $_POST["number"];
    $tnumber = $_POST["tnumber"];
    $date = $_POST["dateoftrav"];

    $id = searchForId($tnumber, $class, $date, $number, $userdb);
}


if (isset($_POST['reset'])) {
    ob_end_clean();
}