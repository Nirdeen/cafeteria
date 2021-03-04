<?php

require_once('checkCookies.php');
define("DB_SERVER","localhost");
define("DB_USER","root");
define("DB_PASS","");
define("DB_NAME", "cafetria");
define("DB_PORT","3306");
$conn=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME,DB_PORT);
$id=$_GET['id'] ?? "1";
// var_dump($id);
################ select product by id ##################

// $sql="SELECT * FROM products ";
// $sql .= "WHERE PID='". $id."';";
// $result=mysqli_query($conn,$sql);
// $product=mysqli_fetch_array($result);

################
function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
  }
    if(is_post_request()){
    $product=[];
    $product['Pname']=$_POST['Pname'];
    $product['PID']=$_POST['PID'];
    $product['Price']=$_POST['Price'];
    $product['PPicPath']=$_POST['PPicPath'];
    $sql = "UPDATE products SET ";
    $sql .= "Pname='" . $product['Pname'] . "', ";
    $sql .= "Price='" . $product['Price'] . "', ";
    $sql .= "PPicPath='" . $product['PPicPath'] . "' ";
    $sql .= "WHERE PID='" . $product['PID'] . "' ";
    $result= mysqli_query($conn, $sql);
     $output=mysqli_fetch_array($result);
            
    // For UPDATE statements, $result is true/false
    if($output) {
    header("location:allproducts.php");
    } else {
      // UPDATE failed
      echo mysqli_error($conn);
      exit;
    }
}else{
        $sql="SELECT * FROM products ";
        $sql .= "WHERE PID='". $id."';";
        $result=mysqli_query($conn,$sql);
        $product=mysqli_fetch_array($result);            
}
?>
<html>
<body>
<div class="product show">
product ID : <?php echo $id ; ?>
</div>
<form method="POST" action="<?php echo'editproduct.php?PID='.$id ?>">
<div id="content">
<div class="product show">
    <div class="attributes">
      <dl>
        <dt>Name</dt>
        <dd> <input type="text" name="Pname" value="<?php echo $product['Pname']; ?>" ></dd>
      </dl>
      <dl>
        <dt>Price</dt>
        <dd> <input type="number" name="Price" value="<?php echo $product['Price']; ?>"></dd>
      </dl>
      <dl>
        <dt> image</dt>
        <dd> <input  type="image" name="PPicPath" value="<?php echo $product['PPicPath']; ?>"></dd>
      </dl>
    </div>

  </div>
  <div id="operations">
        <input type="submit" value="submit" name="submit" />
      </div>
</form>
</div

