<?php require_once("config.php") ;

require_once('checkCookies.php');

?>
<?php


$productid = $_POST['productid'];
$productQuantity = $_POST['quantity'];

$userid = $_POST['username'];


$selectquery = "INSERT INTO orders (OrderDate, Status, UserId) VALUES (now(),'pending',$userid)" ;
$statement = $db->prepare($selectquery);
$statement->execute();



for($i=0 ; $i<count($productid); $i++){
    $selectquery = "INSERT INTO `order-product` (OID, PID, Quantity) VALUES (LAST_INSERT_ID(),?, ?)" ;
$statement = $db->prepare($selectquery);
$statement->execute([$productid[$i],$productQuantity[$i]]);
}
header("Location: ./adminmenue.php"); 
// foreach ($_POST['myorders'] as $myorders){

//     $prouct->fillordertable();

// }
?>

