<?php

require_once('checkCookies.php'); 

$dsn="mysql:dbname=cafetria;dbhost=127.0.0.1;dbport=3306";
Define("DB_USER","root");
Define("DB_PASS","");
$db= new PDO($dsn,DB_USER,DB_PASS);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>My Orders</title>
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
        body{
            font-family: "Kaushan Script", cursive !important;
        }

        .table-responsive {
            margin: 30px 0;
        }

        .table-wrapper {
            min-width: 1000px;
            background: #fff;
            padding: 20px 25px;
            border-radius: 3px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            padding-bottom: 15px;
            background: #fbb448;
            color: #fff;
            padding: 16px 30px;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }

        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }

        .table-title .btn {
            font-family: "Kaushan Script", cursive !important;
            color: #566787;
            float: right;
            font-size: 13px;
            background: #fff;
            border: none;
            min-width: 50px;
            border-radius: 2px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }

        .table-title .btn:hover,
        .table-title .btn:focus {
            color: #566787;
            background: #f2f2f2;
        }

        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }

        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }

    

        .status {
            font-size: 30px;
            margin: 2px 2px 0 0;
            display: inline-block;
            vertical-align: middle;
            line-height: 10px;
        }

        a {
            color: #666;
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
        .pic {
            width: 130px;
            height: 130px;
        }
        img{
            width: 130px;
        }

        
    </style>
    <!-- <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script> -->
   
</head>

<body style='font-family: "Kaushan Script", cursive !important'>
    <!-- nav -->
    <nav class="nav nav-tabs" style="background-color: rgba(42, 41, 41, 0.762);width: 100%;">
        <a href="newuserhome.php" class="nav-item nav-link " style="color: #fbb448;">Home</a>
        <a href="#" class="nav-item nav-link active">My Orders</a>
        <a href="login.php" class="nav-item nav-link logout "style="color: #fbb448; float:right; margin-left:80%" >Logout</a>
    </nav>
    <!-- header -->
    <div class="container-fluid d-block py-4" style="text-align: center;">
        <h1 class="cursive-font" style='font-family: "Kaushan Script", cursive !important; color:#fbb448 ;'>
            <img src=logo_size.jpg> My Orders <img src=logo_size.jpg>
        </h1>
    </div>
    <form method="post" action="">
     <!-- date -->
     <table class="col-8" style="left: 20%;">
        <tr>
            <td>
                <h4 style="display: inline-block;">From :</h4>
            </td>
            <td>
                <input type="date" name="from" >
            </td>
            <td>
                <h4 style="display: inline-block;">To :</h4>
            </td>
            <td>
                <input type="date" name="to" >
            </td>
            <td>
                <input type="submit" name="submit"> 
            </td>
        </tr>
               <div>
        </div>
    </table>
    <form>
             <table class="table table-striped table-hover">
                    <thead class="table-title">
                        <tr>
                            <th style="width: 20%;">Order Date</th>
                            <th style="width: 15%;"> Status</th>
                            <th style="width: 15%;"> total price</th>
                            <th style="width: 15%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                   if($db){

                    // echo "connected";
                    $selQry="select OID from orders ";
                  
                    $stmt=$db->prepare($selQry);
                    $res=$stmt->execute();
                    $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
                       foreach($rows as $row){
                         
                         $id =$row['OID'];  

                         ?>
                         <?php
                         if(isset($_POST['submit'])){
                    //  var_dump(strtotime($_POST['from']));
                           $from=$_POST['from'];
                           $to=$_POST['to'];
                            $userid = $_COOKIE['userID'];
                            $selQry2="SELECT`order-product`.OID,`order-product`.Quantity ,products.Price,products.Pname,products.Category ,
                            products.PPicPath,Orders.OrderDate,Orders.Status,systemuser.Name,systemuser.role 
                            from `order-product`, products, Orders,systemuser 
                            WHERE Orders.OID=`order-product`.OID 
                            and `order-product`.PID=products.PID 
                            and Orders.UserId=systemuser.UID
                            and orders.OID= $id
                            and systemuser.UID= $userid 
                            and OrderDate between '$from' and '$to'
                            ";
                     
                     
                     
                     
                     
                     
        
                     
                         }else
                    //    var_dump($id) ;
                      { 
                        $userid = $_COOKIE['userID'];
                          $selQry2="SELECT`order-product`.OID,`order-product`.Quantity ,products.Price,products.Pname,products.Category ,
                       products.PPicPath,Orders.OrderDate,Orders.Status,systemuser.Name,systemuser.role 
                       from `order-product`, products, Orders,systemuser 
                       WHERE Orders.OID=`order-product`.OID 
                       and `order-product`.PID=products.PID 
                       and Orders.UserId=systemuser.UID
                       and systemuser.UID= $userid 
                       and orders.OID= $id";}
                  
                       $stmt2=$db->prepare($selQry2);
                       $res2=$stmt2->execute();
                       $rows2=$stmt2->fetchAll(PDO::FETCH_ASSOC);
                       if(!count($rows2)==0){
                       echo"<tr><td>".$rows2[0]['OrderDate']."</td><td>".$rows2[0]['Status']."</td>";
                       $sum = 0;
                       foreach($rows2 as $row){
                       $sum+= ($row['Price']*$row['Quantity']);
                            }
                    echo "<td>".$sum."</td>";
                       echo"<td>
                       <form method='POST' action=''>
                            <input name='OID' type='hidden' value='".$row['OID']."'>";
                            if($rows2[0]['Status']=='deliverd'){
                                
                             echo "<input name='submit2' type='submit'  disabled value='delivered'class='btn btn-danger'>";
                            }else{
                                echo "<input name='submit2' type='submit' value='delete'class='btn btn-danger'>";
  
                            }

                       
                      echo"</form>
                       </td></tr><tr>";

                          foreach($rows2 as $row){
                            // echo $row['OID'];
                            echo "<td class='text-center'>";
                            $img = $row["PPicPath"];
                            echo '<img src="images/'.$img.'" ><br>'.$row["Quantity"].'
                            <br>'.$row["Pname"].'<br>'.$row["Price"]."LE <br>".$row["Price"]*$row["Quantity"]
                            ;
                            
                            
                            echo"</td>
                            ";

                          }
                          echo "</tr>";
               
                }}}
                
                        ?>
                        
                   
                    </tbody>
                </table> 
                <?php 
                if(isset($_POST['submit2'])){
                    $delete=$_POST['OID'];
                    $selQry2=" Delete  FROM orders WHERE OID=$delete";
               
                    $stmt2=$db->prepare($selQry2);
                    $res2=$stmt2->execute();
                    $delete=$_POST['OID'];
                    $selQry3=" Delete FROM `order-product` WHERE OID=$delete";
               
                    $stmt3=$db->prepare($selQry3);
                    $res3=$stmt3->execute();
                }
                



                





                ?>
                
                
                <!-- <script>
        // view and hide
        $(function () {
            $('.parent')
                .on("click", function () {
                    $(this).next().toggle();
                    return false;
                    // var idOfParent = $(this).parents('tr').attr('id');
                 // $('tr.child-' + idOfParent).toggle('fast');
                });
            $('.child-').hide().children('td');
        });
    </script>  -->
    

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



      