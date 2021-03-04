<?php
require_once('checkCookies.php');
// require_once("functions.php");
define("DB_SERVER","localhost");
define("DB_USER","root");
define("DB_PASS","");
define("DB_NAME", "cafetria");
define("DB_PORT","3306");
$conn=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME,DB_PORT);
$id=$_GET['id'] ?? "1";
$sql="SELECT * FROM products ";
$sql .= "WHERE PID='". $id."';";
$result=mysqli_query($conn,$sql);
$product=mysqli_fetch_array($result);
function redirect_to($location) {
  header("Location: " . $location);
  exit;
}
if(isset($id)){
    $sql = "DELETE FROM products ";
    $sql .= "WHERE PID='" . $id . "' ";
    $sql .= "LIMIT 1";
    $result = mysqli_query($conn, $sql);
    // redirect_to('allproducts.php');
    header('location:allproducts.php');
}
    // For DELETE statements, $result is true/false
    else{
      // DELETE failed
      echo mysqli_error($conn);
      exit;
    }
?>
</div> -->
<script>
$(".logout").click(function () {
            $.post('checkCookies.php',{
                cook: 'delete'
            },function(){
               window.location.replace("login.php");
            });
        })
</script>

</body>
</html>
