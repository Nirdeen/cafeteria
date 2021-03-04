<?php
$id=$_GET["PID"];
var_dump($id);
define("DB_SERVER","localhost");
define("DB_USER","root");
define("DB_PASS","");
define("DB_NAME", "cafetria");
define("DB_PORT","3306");
$conn=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME,DB_PORT);
$result = mysqli_query($conn,"SELECT * FROM products WHERE PID ='.$id.' ");
// var_dump($result);
?>
<html>
    <body>
        <h1> Edit </h1>
        <form method="POST" action="">
<table>
<tr>
    <td>
    <label>edit the Name</label>    
<input type="text" name="Pname" value=""></td>
</tr>           
<tr>
    <td>  
    <label>edit the price </label>    
    <input type="text" name="Price" value=""></td>
</tr>
<tr>
    <td> <label >change your image</label><input type="file" name="PPicPath" ></td>
</tr>
<tr>
<input type="submit" value="submit" name="update">

</tr>
</table>
 </form>
</body>
</html>