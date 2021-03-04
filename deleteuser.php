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
$sql="SELECT * FROM systemuser";
$sql .= "WHERE UID='". $id."';";
$result=mysqli_query($conn,$sql);
$product=mysqli_fetch_array($result);

if(isset($id)){
    $sql2 = "DELETE FROM systemuser ";
    $sql2 .= "WHERE UID='" . $id . "' ";
    $sql2 .= "LIMIT 1";
    $result = mysqli_query($conn, $sql2);
    header("Location: allusers.php"); 
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
