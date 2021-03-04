<?php

require_once('checkCookies.php');

if($_COOKIE['userRole'] == 'user'){
    header('Location: ./adminmenue.php');
}
?>

<?php


define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "cafetria");
define("DB_PORT","3306");

$conn=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME,DB_PORT);
$valid=$nameErr=$emailErr=$passErr=$cpassErr='';
$set_name=$set_email='';   

 extract($_POST);

if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $email =  $_POST['email'];
    $password = $_POST['password'];
    $repass = $_POST['repassword'];
    $Ext = $_POST['ext'];
    // $role=$_POST['role'];

    $validName="/^[a-zA-Z ]*$/";
    $validEmail="/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
    $uppercasePassword = "/(?=.*?[A-Z])/";
    $lowercasePassword = "/(?=.*?[a-z])/";
    $digitPassword = "/(?=.*?[0-9])/";
    $spacesPassword = "/^$|\s+/";
    $symbolPassword = "/(?=.*?[#?!@$%^&*-])/";
    $minEightPassword = "/.{3,}/";

if(empty($name)){
    $nameErr="Name is Required"; 
 }
 else if (!preg_match($validName,$name)) {
    $nameErr="Digits are not allowed";
 }else{
    $nameErr=true;
 }

 //Email Address Validation
if(empty($email)){
    $emailErr="Email is Required"; 
  }
  else if (!preg_match($validEmail,$email)) {
    $emailErr="Invalid Email Address";
  }
  else{
    $emailErr=true;
  }

  if(empty($password)){
    $passErr="Password is Required"; 
  } 
  elseif (!preg_match($digitPassword,$password) || !preg_match($minEightPassword,$password)) {
    $passErr="Password must be  digit and minimum 3 length";
  }
  else{
     $passErr=true;
  }

 // form validation for confirm password
if($repass!=$password){
   $cpassErr="Confirm Password doest Matched";
}
else{
   $cpassErr=true;
}
// check all fields are valid or not
if($nameErr==1 && $emailErr==1 && $passErr==1 && $cpassErr==1)
{
   $valid="All fields are validated successfully";
   $insertquery = "INSERT INTO systemuser(Name, Email, Password) VALUES ('$name','$email','$password')";
   echo '<script>alert("New Record is added successfully")</script>'; 
   if(mysqli_query($conn ,"insert into systemuser (Name, Email, Password,RoomNo,Ext,Role) VALUES ('$name' , '$email','$password' ,'$RoomNo','$Ext','user')")){
   //                 echo 'sent to data base';
//    reset();
   }

}
  
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Add User</title>
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
    <a href="AdminOrders.php" class="nav-item nav-link "  style="color: #fbb448;">Home</a>
    <a href="allproducts.php" class="nav-item nav-link "  style="color: #fbb448;">Products</a>
        <a href="allusers.php" class="nav-item nav-link "  style="color: #fbb448;">Users</a>
        <a href="adminmenue.php" class="nav-item nav-link  "  style="color: #fbb448;">Manual Order</a>
        <a href="checks.php" class="nav-item nav-link "style="color: #fbb448;" >Checks</a>
        <a href="login.php" class="nav-item nav-link logout "style="color: #fbb448; float:right; margin-left:63%" >Logout</a>

        </nav>
    <!-- header -->
    <div class="container-fluid d-block py-4" style="text-align: center;">
        <h1 class="cursive-font" style='font-family: "Kaushan Script", cursive !important; color:#fbb448 ;'>
            <img src=logo_size.jpg> Add User <img src=logo_size.jpg>
        </h1>
    </div>

    
    <div class="container-fluid d-inlie-block " >
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="form" method="POST" style="margin-left:37%;">
            <div class="row my-3">
                <div class="col-lg-3 "><label for="name">Name :</label></div>
                <div class="col-lg-3"><input type="text" placeholder="enter you name" name="name" value="<?php echo $set_name;?>" >
                <p class="err-msg">
           <?php if($nameErr!=1){ echo $nameErr; }?>
           </p>
            </div>
            </div>
            <div class="row my-3">
                <div class="col-lg-3  "><label for="name">Email :</label></div>
                <div class="col-lg-3"><input type="email" placeholder="enter you e-mail" name="email"   value="<?php echo $set_email;?>" ></div>
                <p class="err-msg">
           <?php if($emailErr!=1){ echo $emailErr; }?>
           </p>
            </div>
            <div class="row my-3">
                <div class="col-lg-3  "><label for="name">Password :</label></div>
                <div class="col-lg-3"><input type="password" placeholder="enter you password" name="password"  ></div>
                <p class="err-msg">
           <?php if($passErr!=1){ echo $passErr; }?>
           </p>
            </div>
            <div class="row my-3">
                <div class="col-lg-3  "><label for="name">Confirm Password :</label></div>
                <div class="col-lg-3"><input type="password" placeholder="confirm your password" name="repassword"  ></div>
                <p class="err-msg">
           <?php if($cpassErr!=1){ echo $cpassErr; }?>
           </p>
            </div>
            <div class="row my-3">
                <div class="col-lg-3  "><label for="name">Room No. :</label></div>
                <div class="col-lg-3"><input type="number" placeholder="enter room number" name="RoomNo" min="0"  ></div>
            </div>
            <div class="row my-3">
                <div class="col-lg-3  "><label for="name">Ext :</label></div>
                <div class="col-lg-3"><input type="text" placeholder="enter extention" name="ext"  ></div>
            </div>
            <!-- <div class="row my-3">
                <div class="col-lg-3  "><label for="role">Role</label></div>
                <div class="col-lg-3">   <select name="role" >
                <option value="user">USER</option>
                <option value="admin"> ADMIN</option>
                </select></div>
            </div> -->
            <div class="row my-3 text-center ">
                <input class="col-2" type="submit" name="submit">
            </div>
        
    </form>
    </div>

    <script src="js/jquery-3.5.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/shebl.js.js"></script>
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