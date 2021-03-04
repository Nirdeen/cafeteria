<?php

require_once('checkCookies.php');

if($_COOKIE['userRole'] == 'user'){
    header('Location: ./adminmenue.php');
}
?>

<?php

// require_once('checkCookies.php');

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "cafetria");
define("DB_PORT","3306");

$conn=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME,DB_PORT);
$valid=$nameErr=$priceErr=$catErr=$imgErr='';
$set_name=$set_email='';   


if (isset($_POST['submit'])){
    // $validEmail="/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
    extract($_POST);
    
    $name = $_POST['name'];
    $price =  $_POST['price'];
    $cat = $_POST['cat'];
    $img = $_POST['img'];
    $validName="/^[a-zA-Z ]*$/";
    // $uppercasePassword = "/(?=.*?[A-Z])/";
    // $lowercasePassword = "/(?=.*?[a-z])/";
    // $digitPassword = "/(?=.*?[0-9])/";
    // $spacesPassword = "/^$|\s+/";
    // $symbolPassword = "/(?=.*?[#?!@$%^&*-])/";
    // $minEightPassword = "/.{3,}/";

if(empty($name)){
    $nameErr="Name is Required"; 
 }
 else if (!preg_match($validName,$name)) {
    $nameErr="Digits are not allowed";
 }else{
    $nameErr=true;
 }

if(empty($price)){
    $priceErr="Price is Required"; 
  }
  else{
    $priceErr=true;
  }
// if(empty($category)){
//     $catErr="Category is Required"; 
//   }
//   else{
//     $catErr=true;
//   }



  $extension = substr($img,strlen($img)-4,strlen($img));
  // allowed extensions
  $allowed_extensions = array(".jpg","jpeg",".png",".gif");
  // Validation for allowed extensions .in_array() function searches an array for a specific value.
  if(!in_array($extension,$allowed_extensions))
  {
  $imgErr="<br>'Invalid format. Only jpg / jpeg/ png /gif format allowed'";
  }
  else
  {
// check all fields are valid or not
if($nameErr==1 && $priceErr==1 )
{
   $valid="All fields are validated successfully";
//    $insertquery = "INSERT INTO products (Pname, Price, Category, PPicPath) VALUES ('$name','$price','$cat','$img')";

if(mysqli_query($conn ,"INSERT INTO products (Pname, Price, Category, PPicPath) VALUES ('$name','$price','$cat','$img')")){
    //                 echo 'sent to data base';
    echo '<script>alert("New Record is added successfully")</script>'; 
    }
   
}
}
  
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Products</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/yourcode.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">

    <style>
        body {
            /* min-height: 100vh; */
            /* background: rgba(0, 0, 0, 0.5);; */
            margin-right: 1%;
            font-family: "Kaushan Script", cursive !important;
            /* font-family: "Lato", Arial, sans-serif; */
            margin-bottom: 5%;
            height: fit-content;
        }

        .price {
            background-color: rgba(42, 41, 41, 0.762);
            display: flex;
            /* float: right; */
            left: 40%;
            width: fit-content;
            color: white;
            border-radius: 50%;
            border: #fbb448 2px solid;
            font-family: "Kaushan Script", cursive;
            font-weight: bold;
            text-align: center;
            padding: 5%;
        }

        .carousel-caption {
            display: flex;
            justify-content: center;
        }

        .cat {
            text-align: center;
            color: black;
            text-decoration: none;
        }

        .cat :hover {
            color: #fbb448;
            zoom: 95%;
        }

        .pic {
            width: 130px;
            height: 130px;
        }

        table {
            width: 100%;
        }

        .progress {
            height: 10px;
        }
    </style>

</head>
<body>
<nav class="nav nav-tabs" style="background-color: rgba(42, 41, 41, 0.762);width: 100%;">
    <a href="AdminOrders.php" class="nav-item nav-link "  style="color: #fbb448;">Home</a>
    <a href="allproducts.php" class="nav-item nav-link "  style="color: #fbb448;">Products</a>
        <a href="allusers.php" class="nav-item nav-link "  style="color: #fbb448;">Users</a>
        <a href="adminmenue.php" class="nav-item nav-link  "  style="color: #fbb448;">Manual Order</a>
        <a href="checks.php" class="nav-item nav-link "style="color: #fbb448;" >Checks</a>
        <a href="login.php" class="nav-item nav-link logout"style="color: #fbb448; float:right; margin-left:63%" >Logout</a>
    </nav>
    <div class="container-fluid d-block py-4" style="text-align: center;">
        <h1 class="cursive-font" style='font-family: "Kaushan Script", cursive !important; color:#fbb448 ;'>
            <img src=logo_size.jpg> Add Product <img src=logo_size.jpg>
        </h1>
    </div>

    <div class="container-fluid d-inlie-block " >
    <!-- <p class="text-success text-center"><?php echo $valid; ?></p> -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="form" method="POST" style="margin-left:37%;">
<div class="row my-3">
                <div class="col-lg-3 "><label for="name">Product Name :</label></div>
                <div class="col-lg-3"><input type="text" placeholder="enter you name" name="name" value="<?php echo $set_name;?>" >
                <p class="err-msg">
           <?php if($nameErr!=1){ echo $nameErr; }?>
           </p>
            </div>
            </div>
            <div class="row my-3">
                <div class="col-lg-3  "><label for="name">Price :</label></div>
                <div class="col-lg-3"><input type="number" placeholder="" name="price"   value="<?php echo $set_email;?>" >
                
                <p class="err-msg">
           <?php if($priceErr!=1){ echo $priceErr; }?>
           </p>
            </div></div>
            <div class="row my-3">
                <div class="col-lg-3  "><label for="name">Category :</label></div>
                <div class="col-lg-3"><select name="cat">
                <option name="cat">Hot Drinks</option>
                <option name="cat">Cold Drinks</option>
                <option name="cat">Desserts</option>
            </select> 
                <p class="err-msg">
           <?php if($catErr!=1){ echo $catErr; }?>
        </p>
    </div>
</div>
<div class="row my-3">
    <div class="col-lg-3  "><label for="name">Product pic :</label></div>
    <div class="col-lg-3">    <input class="col-3" type="file" value="browse" name="img">
    <p class="err-msg">
    <?php if($imgErr!=1){ echo $imgErr; }?>
    </p>
            </div>
            </div>
            <div class="row my-3 text-center ">
                <input class="col-2" type="submit" name="submit">
            </div>
        
</form>
    </div>
</body>
</html>
<script>
    $(".logout").click(function () {
            $.post('checkCookies.php',{
                cook: 'delete'
            },function(){
               window.location.replace("login.php");
            });
        })
        </script>