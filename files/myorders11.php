<?php
define("DB_SERVER","localhost");
define("DB_USER","root");
define("DB_PASS","");
define("DB_NAME", "cafetria");
define("DB_PORT","3306");
$conn=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME,DB_PORT);?>
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


        
    </style>
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <script>
        // view and hide
        $(function () {
            $('tr.parent td span.btn')
                .on("click", function () {
                    var idOfParent = $(this).parents('tr').attr('id');
                    $('tr.child-' + idOfParent).toggle('fast');
                });
            $('tr[class^=child-]').hide().children('td');
        });

        // add and minus

    </script>
</head>

<body>
    <!-- nav -->
    <nav class="nav nav-tabs" style="background-color: rgba(42, 41, 41, 0.762);width: 100%;">
        <a href="#" class="nav-item nav-link " style="color: #fbb448;">Home</a>
        <a href="my_order.html" class="nav-item nav-link active">My Orders</a>
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
                <input type="date" name="from" value="<?php  $_POST['from']; ?>">
            </td>
            <td>
                <h4 style="display: inline-block;">To :</h4>
            </td>
            <td>
                <input type="date" name="to" value="<?php $_POST['to']; ?>">
            </td>
            <td>
                <input type="submit" name="search"> Search
            </td>
        </tr>
               <div>
        </div>
    </table>
    <form>

    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <table class="table table-striped table-hover">
                    <thead class="table-title">
                        <tr>
                            <th style="width: 20%;">Order Date</th>
                            <th style="width: 2%;"></th>
                            <th style="width: 15%;"> Status</th>
                            <th style="width: 15%;">Price</th>
                            <th style="width: 15%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $from='2021-04-04 00:40:29';
                    $to='2021-01-01 00:40:29';
                    $result = mysqli_query($conn,"SELECT o.OrderDate ,o.Status ,p.Price ,p.PPicPath ,p.PID 
                    FROM orders o,products p,`order-product` op 
                    where o.OID=op.OID
                    and p.PID=op.PID
                    and OrderDate between '2021-04-04 00:40:29' and '2021-01-01 00:40:29' ");
                    
                    
                    while ($row = mysqli_fetch_array($result)){
                          echo
                       ' <tr class="parent" id="1">
                            <td>'.$row["OrderDate"].'</td>
                            <td><span class="btn">+</span></td>
                            <td>'.$row["Status"].'</td>
                            <td>'.$row["Price"].'</td>
                            <td>
                                    <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                            class="material-icons">&#xE5C9; </i>Cancel Order</a>
                            </td>
                        </tr>
                        <tr class="child-1" >
                            <td colspan="10"style=" align-content: center; position: absolute" >
                                <div class="card rounded shadow-sm border-0 d-inline-block">
                                    <div class="card-body p-2 d-inline-block">
                                        <img src=" '.$row["PPicPath"].'">
                                        <div class="carousel-caption p-3">
                                            <button class="price" value="5" disabled></button>
                                        </div>
                                   
                                    </div>
                                </div>
                            </td>
                        </tr>';}
                        ?>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</body>

</html>



      