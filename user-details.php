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

<body>
    <!-- nav -->
    <nav class="nav nav-tabs" style="background-color: rgba(42, 41, 41, 0.762);width: 100%;">
        <a href="index.php" class="nav-item nav-link "  style="color: #fbb448;">Home</a>
        <a href="allproducts.php" class="nav-item nav-link "  style="color: #fbb448;">Products</a>
        <a href="allusers.php" class="nav-item nav-link active"  >Users</a>
        <a href="AdminOrders.php" class="nav-item nav-link "  style="color: #fbb448;">Manual Order</a>
        <a href="checks.php" class="nav-item nav-link " style="color: #fbb448;">Checks</a>
        <!-- <a href="#" class="nav-item nav-link " style="float: right;"><img src="" > Admin</a> -->
    </nav>
    <!-- header -->
    <div class="container-fluid d-block py-4" style="text-align: center;">
        <h1 class="cursive-font" style='font-family: "Kaushan Script", cursive !important; color:#fbb448 ;'>
            <img src=logo_size.jpg> View User Details<img src=logo_size.jpg>
        </h1>
    </div>

    
    <div class="container-fluid d-inlie-block " >

    <form action="" name="form" method="POST" style="margin-left:37%;">
        
            <div class="row my-3">
                <div class="col-lg-3 "><label for="name"> Name :</label></div>
                <div class="col-lg-3"><input type="text"  name="name" value=""  disabled>
            </div>
            </div>
            <div class="row my-3">
            <div class="col-lg-3  "><label for="name">Room No. :</label></div>
                <div class="col-lg-3"><input type="number" placeholder="" name="RoomNo" min="0" disabled ></div>
            </div>
          
            <div class="row my-3">
                <div class="col-lg-3  "><label for="name">Ext :</label></div>
                <div class="col-lg-3"><input type="text" placeholder="" name="Ext"  disabled></div>
            </div>
            <div class="row my-3">
                <div class="col-lg-3  "><label for="name">Profile pic :</label></div>
                <div class="col-lg-3">    <input class="col-3" type="image" value="browse" name="PicName" disabled></div>
            </div>
            <div class="row my-3 mx-5 text-center d-inline-block">
                <input  type="submit" name="submit">
            </div>
            <div class="row my-3 m-5 text-center d-inline-block">
                <input type="submit" name="Edit this user" value="Edit this user">
            </div>
        
    </form>
    </div>

    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/shebl.js.js"></script>
</body>
</html>
  <!-- <?php
// include "connection.php";   

// $sql = mysqli_query($conn ,"select Pname, Price, Category,PPicPath FROM products") ;
// $name = $_POST['name'];
// $price = $_POST['price'];
// $cat = $_POST['cat'];
// $image = $_POST['image'];


// if (isset($_POST['submit'])) {
//     // checking name
//     ;
// }
    // if(empty($_POST['name'])){
    // echo "Please Enter product name";
    // return false;
    // }if(empty($_POST['price'])){
    // echo "Please Enter product price";
    // return false;
    // }if(empty($_POST['cat'])){
    // echo "Please choose product category";
    // return false;
    // }if(empty($_POST['image'])){
    // echo "Please add product image";
    // return false;
   
    // }if (!$name_matches[0]){
    //     $name_subject = $_POST['name'];
    // $name_pattern = '/^[a-zA-Z ]*$/';
    // $pattern=preg_match($name_pattern, $name_subject, $name_matches);
    // echo "You must supply your name";
    // return false;
    // }else{
    //     echo"Form is recorded";
    //     $result = mysqli_query($conn ,"insert into products (Pname, Price, Category,PPicPath) VALUES ('$name' , '$price','$cat' ,'$image')");

    // }
?> -->

    
    
    
    
   