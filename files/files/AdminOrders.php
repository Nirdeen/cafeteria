<?php
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "cafetria");
define("DB_PORT","3306");
$conn=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME,DB_PORT);
$result=mysqli_query($conn,"select op.Quantity,p.Pname,o.OrderDate,p.PPicPath,u.name,u.ext,u.RoomNo FROM `order-product` op,products p,orders o,systemuser u where o.OID=op.OID and P.PID=op.PID and o.userid=u.uid
");
// var_dump($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Orders</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        body {
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
    </style>
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

</head>
<body>
    <!-- nav -->
    <nav class="nav nav-tabs">
        <a href="#" class="nav-item nav-link active" style="color: #fbb448;">Home</a>
        <a href="#" class="nav-item nav-link ">Products</a>
        <a href="users.html" class="nav-item nav-link ">Users</a>
        <a href="#" class="nav-item nav-link ">Manual Order</a>
        <a href="#" class="nav-item nav-link ">Checks</a>
    </nav>
    <!-- header -->
    <div class="container-fluid d-block py-4" style="text-align: center;">
        <h1 class="cursive-font" style='font-family: "Kaushan Script", cursive !important; color:#fbb448 ;'>
            <img src=logo_size.jpg>Orders <img src=logo_size.jpg>
        </h1>
    </div>
    <!-- date -->
    <form method="POST">
    <table class="col-8" style="left: 20%;">
        <tr>
            <td>
                <h4 style="display: inline-block;">From :</h4>
            </td>
            <td>
                <input type="date" name="datefrom">
            </td>
            <td>
                <h4 style="display: inline-block;">To :</h4>
            </td>
            <td>
                <input type="date" name="dateto">
            </td>
        </tr>
        <div>
        </div>
    </table>
    </form>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <table class="table table-striped table-hover" style="text-align: center;">
                    <thead class="table-title">
                        <tr>
                            <th style="width: 10%;">Order Date</th>
                            <th style="width: 10%;">Name</th>
                            <th style="width: 5%;"> Room</th>
                            <th style="width: 5%;">Ext</th>
                          <th style="width: 15%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(isset($_POST['from']) && ($_POST['to'])){
                         while($row=mysqli_fetch_array($result)){
                         echo"<tr>";
                         echo"<td>" .$row['OrderDate']."</td>";
                         echo"<td>" .$row['Name']."</td>";
                         echo"<td>" .$row['RoomNo']."</td>";
                         echo"<td>" .$row['Ext']."</td>"; 
                           echo"<td style='text-align:left;'>
                            <form method='POST'>
                            <input type='radio'>Processing
                            <br>
                             <input type='radio'>On Delevier
                             <br>
                            <input type='radio'>Done
                            <br>
                                <input type='radio'>Cancelled
                                  <br><button type='submit' style='border: none;background-color: transparent;'
                                        disabled><i class='fas fa-check'>&#xE5C9; </i> </button>
                                </form>
                            </td>";
                         echo"</tr>" ;
                            echo"<tr>";
                            echo"<td style='width:15%; display:inline-block'>" ."<img style='' src='".$row['PPicPath']."'> <br>" .$row['Quantity']."</td>";  
                            echo"</tr>";}} ?>
                        <tr>
                            <!-- <td colspan="20" style=" align-content: center; position: absolute">
                                <div class="card rounded shadow-sm border-0 d-inline-block">
                                    <div class="card-body p-2 d-inline-block">
                                        <img src="https://cdn10.bostonmagazine.com/wp-content/uploads/sites/2/2017/09/latte.jpg"
                                            alt="Latte" class="img-fluid d-block mx-auto mb-3 pic">
                                        <div class="carousel-caption p-3">
                                            <button class="price" value="5" disabled>25 LE</button>
                                        </div>
                                        <h6> Latte</h6>
                                    </div>
                                </div>
                                <div class="card rounded shadow-sm border-0 d-inline-block">
                                    <div class="card-body p-2">          
                                        <div class="carousel-caption p-3">
                                            <button class="price" value="5" disabled>25 LE</button>
                                        </div>
                                        <h6> Latte</h6>
                                    </div>
                                </div>
                                <div class="card rounded shadow-sm border-0 d-inline-block">
                                    <div class="card-body p-2">
                                        <img src="https://cdn10.bostonmagazine.com/wp-content/uploads/sites/2/2017/09/latte.jpg"
                                            alt="Latte" class="img-fluid d-block mx-auto mb-3 pic">
                                        <div class="carousel-caption p-3">
                                            <button class="price" value="5" disabled>25 LE</button>
                                        </div>
                                        <h6> Latte</h6>
                                    </div>
                                </div>
                                <div class="card rounded shadow-sm border-0 d-inline-block">
                                    <div class="card-body p-2">
                                        <img src="https://cdn10.bostonmagazine.com/wp-content/uploads/sites/2/2017/09/latte.jpg"
                                            alt="Latte" class="img-fluid d-block mx-auto mb-3 pic">
                                        <div class="carousel-caption p-3">
                                            <button class="price" value="5" disabled>25 LE</button>
                                        </div>
                                        <h6> Latte</h6>
                                    </div>
                                </div>
                                <div class="card rounded shadow-sm border-0 d-inline-block">
                                    <div class="card-body p-2">
                                        <img src="https://cdn10.bostonmagazine.com/wp-content/uploads/sites/2/2017/09/latte.jpg"
                                            alt="Latte" class="img-fluid d-block mx-auto mb-3 pic">
                                        <div class="carousel-caption p-3">
                                            <button class="price" value="5" disabled>25 LE</button>
                                        </div>
                                        <h6> Latte</h6>
                                    </div>
                                </div>

                            </td> -->
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>

</html>
