<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
 
include 'conn.php';
$sql = "SELECT * FROM `SAH_Product` ";
$result = $conn->query($sql);

$outterData = [];
$name = $_POST["name"];
$MRP = $_POST["MRP"];
$qty = $_POST["qty"];
$CP = $_POST["CP"];
$SP = $_POST["SP"];
$product_id = $_POST["product_id"];


$sql = "INSERT INTO `SAH_Product`(`id`, `name`, `MRP`, `qty`, `CP`, `SP`, `product_id`) VALUES ( '' , '$name' ,  '$MRP' ,  '$qty' ,  '$CP' ,  '$SP' ,  '$product_id'  )";

if ($conn->query($sql) === TRUE) {
    $e = array(
                     "errorCode"=>"0",
                     "status"=>"sucess",
                     );
      array_push($outterData, $e);
} else {
        $e = array(
                     "errorCode"=>"1",
                     "status"=>"unsucessfull",
                     );
      array_push($outterData, $e );
}
$myJSON = json_encode($outterData );
echo $myJSON;
$conn->close();
?>