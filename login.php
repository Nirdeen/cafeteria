<?php
// require_once('checkCookies.php');
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <title>login</title>
    <style>
        body{
            background-image: url(images/171026-better-coffee-boost-se-329p_67dfb6820f7d3898b5486975903c2e51.fit-1240w.jpg);
           
            background-size:auto;
            /* background-position: center; */
            font-family: "Lato", Arial, sans-serif;
            font-weight: 400;
            font-size: 16px;
            line-height: 1.7;
            color: #777;
            
        }
        div{
            width: 350px;
            height:530px;
            margin: auto;
            background-color: rgba(0, 0, 0, 0.582);
            float: right;
            margin-top: 3%;
            border-top: 10px solid #FBB448;
            position: relative;
          
        }
        input{
            margin-left:30px;
            width: 70%;
            height: 30px;
            color: #fff !important;
            border: 2px solid rgba(255, 255, 255, 0.2);
            background: transparent;
            border-radius: 4px;
            font-size: 16px;
            font-weight: 300;
            padding-left: 15px;
            padding-right: 15px;
        }
        .btn{
            background: #FBB448;
            color: #fff;
            border: 2px solid #FBB448 !important;
            padding-bottom:10px;
            width: 80%;
            padding: 7px;
            height: 35px;
        }

        .btn:hover{
            cursor: pointer;
        }

        img{
            width:160px;
            height:160px;
            margin:auto;
            padding-left: 27%;
            margin-top: 35px;
            
        }
        form{
            padding:30px;
        }

        a{
            color: #ffffff;
            text-decoration: none;
            font-size:14px;
           
        
        }
        p{
            text-align: center;

        }
       

    </style>
</head>
<body style='font-family: "Kaushan Script", cursive !important'>
   

    <form action="" method="POST" class="login">

         <?php
            
         
            // if(isset($_SESSION ['usertype']=='user')){
            //     echo $_SESSION['usertype'];
            //     unset ($_SESSION['usertype']);
            // };
            // switch($_SESSION['usertype']){

            //     case 'admin':
                
            //         include('admin.php');
                
            //         break;
                
            //     case 'users':
                
            //         include('adduser.php');
                
            //         break;
                
            //     }

            // if(isset($_SESSION ['login']){
            //     echo $_SESSION['login'];
            //     unset ($_SESSION['login']);

         ?> 


    <div>
        
        <img src="logo_size.jpg" text-center>
        <h3 style="color: white; margin-left:30px;"> login </h3>
        <label for="" style="margin-top: 25%;color: white; margin-left:30px;">User Name</label><br>
        <input type="text" name="email"><br><br>
        <label for="" style="margin-top: 25%;color: white; margin-left:30px;">Password</label><br>

		<input type="password" name="password">
        
        <p> <a href="ForgottenPassword.php"> Forgot Password? <a> </p>

        <input class="btn" type="submit" name="submit">
    </div>
</form>
    
</body>

<script>
$(".logout").click(function () {
        $.post('checkCookies.php',{
            cook: 'delete'
        },function(){
           window.location.replace("login.php");
        });
    })
    </script>


</html>


<?php

// create define data
// define('SITEURL','http://localhost/cafeteria-project/');
// define('LOCALHOST','localhost');
// define('DB_USER','root');
// define('DB_PASS','');
// define('DB_NAME','cafetria');

// database connection
// $conn = mysqli_connect('LOCALHOST','DB_USER','DB_PASS','DB_NAME');
// // Check connection
// if (!$conn) {
// 	die("Connection failed: " . mysqli_connect_error());
//  }
//  echo "Connected successfully";

session_start();
$dsn="mysql:dbname=cafetria;dbhost=127.0.0.1;dbport=3306";

Define("DB_USER","root");
Define("DB_PASS","");
Define('SITEURL','http://localhost/cafeteria-project/');


$db= new PDO($dsn,DB_USER,DB_PASS);
// if($db){
// 	echo"success";
// }
// else{
// 	echo"fail";
// }

// check the submit button is clicked or not
if(isset($_POST['submit']))
{
    //process for login

    //1- get the data from login form
    $email= $_POST['email'];
    $password= $_POST['password'];

    //2-sql to check the user with email and password exist and not
	$sql= "SELECT * FROM systemuser WHERE Email='$email' AND Password='$password';";
  
    $stmt=$db->prepare($sql);

    //3-Execute the Query
	// $res= mysqli_query($conn , $sql);
	$res=$stmt->execute();

    //4-count rows to check the user exists or not
	// $count= mysqli_num_rows($res);
	$row_count=$stmt->fetchAll(PDO::FETCH_ASSOC);

	$numberofrows  = count($row_count);
	
    if($numberofrows==1){
        
        setcookie('login','true');
        setcookie('userID',$row_count[0]['UID']);
		
		// var_dump($row_count[0]['UID']);
        $_SESSION ['usertype']= $row_count[0]['role'];

		// echo $_SESSION ['usertype'];
		if($_SESSION ['usertype']=="user")
		{
            setcookie('userRole','user');
            header('location: newuserhome.php');
        }
		else
        {
            setcookie('userRole','admin');
            header('location: AdminOrders.php');
        }
		
	}

    else{
        //user not available and login fail
        // $_SESSION ['login']= '<div class="error text-center"> email or password did not match </div>';
		
         //Redirect to login page
        //  header('location: products.html/login.php');
	}
}




