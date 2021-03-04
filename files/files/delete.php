<?php
$id = $_GET['PID'];
define("DB_SERVER","localhost");
define("DB_USER","root");
define("DB_PASS","");
define("DB_NAME", "cafetria");
define("DB_PORT","3306");
$conn=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME,DB_PORT);
$result= mysqli_query($conn,"SELECT * FROM products WHERE PID='.$id.' ");
$sql="DELETE from products WHERE PID='.$id.'";
$delete = mysqli_query($conn,$sql);?>

<div id="content">
  <a class="back-link" href="">&laquo; Back to List</a>
  <div class="subject delete">
    <h1>Delete Product</h1>
    <p>Are you sure you want to delete this product?</p>
    <p class="item"><?php echo $result['Pname']; ?></p>
    <form  action="<?php echo 'editproduct.php?PID='.$result['PID']; ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete product" />
      </div>
    </form>
  </div>

</div>


