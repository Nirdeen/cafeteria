<?php 
require_once('checkCookies.php');
$dsn="mysql:dbname=cafetria;dbhost=127.0.0.1;dbport=3306";
Define("DB_USER","root");
Define("DB_PASS","");
$db= new PDO($dsn,DB_USER,DB_PASS);
$id=$_GET['id'] ?? "1";
$sql3="SELECT * FROM products ";
$sql3 .= "WHERE PID='". $id."';";
$stmt3=$db->prepare($sql3);
$res3=$stmt3->execute();
$row3=$stmt3->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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

<body style='font-family: "Kaushan Script", cursive !important'>
    <!-- nav -->
    <nav class="nav nav-tabs" style="background-color: rgba(42, 41, 41, 0.762);width: 100%;">
        <a href="index.php" class="nav-item nav-link "  style="color: #fbb448;">Home</a>
        <a href="allproducts.php" class="nav-item nav-link  " style="color: #fbb448;" >Products</a>
        <a href="allusers.php" class="nav-item nav-link "style="color: #fbb448;"  >Users</a>
        <a href="AdminOrders.php" class="nav-item nav-link "  style="color: #fbb448;">Manual Order</a>
        <a href="checks.php" class="nav-item nav-link " style="color: #fbb448;">Checks</a>
        <a href="login.php" class="nav-item nav-link logout"style="color: #fbb448; float:right; margin-left:63%" >Logout</a>

        <!-- <a href="#" class="nav-item nav-link " style="float: right;"><img src="" > Admin</a> -->
    </nav>
    <!-- header -->
    <div class="container-fluid d-block py-4" style="text-align: center;">
        <h1 class="cursive-font" style='font-family: "Kaushan Script", cursive !important; color:#fbb448 ;'>
            <img src=logo_size.jpg> Edit Product <img src=logo_size.jpg>
        </h1>
    </div>

    
    <div class="container-fluid d-inlie-block " >

    <form action="" method="POST" style="margin-left:37%;">
        
            <div class="row my-3">
                <div class="col-lg-3 "><label for="name">Product Name :</label></div>
                <div class="col-lg-3"><input type="text"  name="name2" value="<?php echo $row3['Pname']; ?>" >
            </div>
            </div>
            <div class="row my-3">
                <div class="col-lg-3  "><label for="name">Price :</label></div>
                <div class="col-lg-3"><input type="number"  name="price2" min="0" stept="0.5" value="<?php echo $row3['Price']; ?>" ></div>
            </div>
          
            <div class="row my-3">
                <div class="col-lg-3  "><label for="name">Product Picture :</label></div>
                <div class="col-lg-3">  <input class="col-3" type="file" value="<?php echo $row3['PPicPath']; ?>" name="image2"></div>
            </div>
            <div class="row my-3 text-center ">
                <input class="col-2" type="submit" name="submit2">
            </div>
        
    </form>
    </div>

    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/shebl.js.js"></script>
</body>
</html>
   <?php
//    $id=$_GET['id'] ?? "1";
//    $sql="SELECT * FROM products ";
//    $sql .= "WHERE PID='". $id."';";
//    $result=mysqli_query($conn,$sql);

if(isset($_POST['submit2'])){
    $id=$_GET['id'];
    // echo $id;
    $sql = "UPDATE products SET ";
    $sql .= "Pname='" . $_POST['name2'] . "', ";
    $sql .= "Price='" . $_POST['price2'] . "', ";
    $sql .= "PPicPath='" . $_POST['image2'] . "' ";
    $sql .= "WHERE PID='" . $_GET['id'] . "' ";

    $stmt2=$db->prepare($sql);
    $res2=$stmt2->execute();
    // header('location:allproducts.php');
    echo '<script>alert("Your Edit is Submitted")</script>'; 
}
   
?> 

<script>
     $(".logout").click(function () {
            $.post('checkCookies.php',{
                cook: 'delete'
            },function(){
               window.location.replace("login.php");
            });
        })
        </script>

    
    
    
    
   