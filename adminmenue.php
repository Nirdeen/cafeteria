<?php

 require_once('checkCookies.php');
 require_once("userhome.php") ; 
$prouct = new products();
$prouct->connectdb();
?>

<!DOCTYPE html>
<html>

<head>
    <title>user Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/adduser.css">

    
    <script>
        // view and hide
        $(function () {
            $('tr.parent th span.btn')
                .on("click", function () {
                    var idOfParent = $(this).parents('tr').attr('id');
                    $('tr.child-' + idOfParent).toggle('fast');
                });
            $('tr[class^=child-]').hide().children('td');
        });

        // add and minus

    </script>

</head>

<body style='font-family: "Kaushan Script", cursive !important'>
    <!-- nav -->
    <nav class="nav nav-tabs" style="background-color: rgba(42, 41, 41, 0.762);width: 100%;">
    <a href="AdminOrders.php" class="nav-item nav-link "  style="color: #fbb448;">Home</a>
    <a href="allproducts.php" class="nav-item nav-link "  style="color: #fbb448;">Products</a>
        <a href="allusers.php" class="nav-item nav-link "  style="color: #fbb448;">Users</a>
        <a href="adminmenue.php" class="nav-item nav-link active "  style="color: #fbb448;">Manual Order</a>
        <a href="checks.php" class="nav-item nav-link "style="color: #fbb448;" >Checks</a>
                <a href="login.php" class="nav-item nav-link  logout"style="color: #fbb448; float:right; margin-left:63%" >Logout</a>

    </nav>
    <!-- header -->
    <div class="container-fluid d-block py-4" style="text-align: center;">
        <h1 class="cursive-font" style='font-family: "Kaushan Script", cursive !important; color:#fbb448 ;'>
            <img src=logo_size.jpg> Make Your order Now <img src=logo_size.jpg>
        </h1>
    </div>
    <!-- latest order -->
    
    <div class="container col-lg-6 " style="  float: right; "><!-- this divisuion ends after the menue section -->
        <!-- ------------------------------------------------------------------------------------------------- -->

        <table>
            
                <tr class="parent" id="2">
                    <th colspan="3"><span class="btn category"
                            style="background-color:rgba(42, 41, 41, 0.762); color: #fbb448;width: 100%;">Latest Order
                            <i class="fas fa-caret-down"></i></span></th>
                </tr>
            
            
                <tr class="child-2">
                    <td>
                    <?php $result = $prouct->selectlastorder();
                                            foreach($result as $productrow)
                                            {echo
                                                '
                                                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                                                

                                            <div class="">
                                                <div class="cat" >
                                                    
                                                    <div class="card rounded shadow-sm border-0">
                                                        <div class="card-body p-2">
                                                            <img style="width:100px" src="images/'.$productrow['PPicPath'].'"
                                                                alt="Latte" class="img-fluid d-block mx-auto mb-3 pic">
                                                            <div class="carousel-caption p-3">
                                                                <button class="price" value="5" disabled>'.$productrow['Quantity'].'</button>
                                                            </div>
                                                            <h6>'.$productrow['Pname'].'</h6>
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div></div>';}
                                            
                                        ?>
                    </td>
                </tr>
            
        </table>
       

<!-- menu -->

        <table>
            
            
                <tr class="parent" id="1">
                    <th colspan="3"><span class="btn category"
                            style="background-color:rgba(42, 41, 41, 0.762); color:#fbb448;width: 100%;">Menu <i
                                class="fas fa-caret-down"></i></span></th>
                </tr>
            
            
                <tr class="child-1">
                    <!-- category 1 -->
                    <td>
                        <table>
                            
                                <tr>
                                    <td colspan="3"><span class="btn category" style="background-color: #fbb448;">Hot
                                            Drinks </span></td>
                                </tr>
                                <!-- row 1 -->
                                
                                <tr>
                                    <td>
                                        <div class="row col-12 pb-2 mb-2 d-flex justify-content-center"
                                            style="float: right;">
                                            <!-- Card-->
                                            
                                            <?php $result = $prouct->showhotdrinks();
                                            foreach($result as $productrow)
                                            {echo
                                                '
                                                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                                                

                                            <div class="">
                                                <div class="cat" >
                                                    
                                                    <div class="card rounded shadow-sm border-0">
                                                        <div class="card-body p-2">
                                                            <img style="width:100px; height:100px" src="images/'.$productrow['PPicPath'].'"
                                                                alt="Latte" class="img-fluid d-block mx-auto mb-3 pic">
                                                            <div class="carousel-caption p-3">
                                                                <button class="price" value="5" disabled>'.$productrow['Price'].'</button>
                                                            </div>
                                                            <h6>'.$productrow['Pname'].'</h6>
                                                            <input type="hidden" value="'.$productrow['PID'].'">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div></div>';}
                                            
                                        ?>
                                            
                                           
                                        </div>
                                    </td>
                                </tr>

                           
                        </table>
                        <!-- category 2-->
                        <table>
                            <tbody>
                                <tr>
                                    <td colspan="3"><span class="btn category" style="background-color: #fbb448;">Cold
                                            Drinks </span></td>
                                </tr>
                                <!-- row 1 -->
                                <tr>
                                    <td>
                                        <div class="row col-12 pb-2 mb-2 d-flex justify-content-center"
                                            style="float: right;">
                                            <!-- Card-->
                                             <?php $result = $prouct->showcolddrinks();
                                            foreach($result as $productrow)
                                            {echo '<div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                                                

                                            <div>
                                                <div class="cat">
                                                    
                                                    <div class="card rounded shadow-sm border-0">
                                                        <div class="card-body p-2">
                                                            <img style="width:100px; height:100px" src="images/'.$productrow['PPicPath'].'"
                                                                alt="Latte" class="img-fluid d-block mx-auto mb-3 pic">
                                                            <div class="carousel-caption p-3">
                                                                <button class="price" value="5" disabled>'.$productrow['Price'].'</button>
                                                            </div>
                                                            <h6>'.$productrow['Pname'].'</h6>
                                                            <input type="hidden" value="'.$productrow['PID'].'">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div></div>';}
                                            
                                            ?>
                                            
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- category 3-->
                        <table>
                            <tbody>
                                <tr>
                                    <td colspan="3"><span class="btn category"
                                            style="background-color: #fbb448;">Deserts </span></td>
                                </tr>
                                <!-- row 1 -->
                                <tr>
                                    <td>
                                        <div class="row col-12 pb-2 mb-2 d-flex justify-content-center"
                                            style="float: right;">
                                            <!-- Card-->
                                            <?php $result = $prouct->showdesserts();
                                            foreach($result as $productrow)
                                            {echo '<div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                                                

                                            <div>
                                                <div class="cat">
                                                    
                                                    <div class="card rounded shadow-sm border-0">
                                                        <div class="card-body p-2">
                                                            <img style="width:100px; height:100px" src="images/'.$productrow['PPicPath'].'"
                                                                alt="Latte" class="img-fluid d-block mx-auto mb-3 pic">
                                                            <div class="carousel-caption p-3">
                                                                <button class="price" value="5" disabled>'.$productrow['Price'].'</button>
                                                            </div>
                                                            <h6>'.$productrow['Pname'].'</h6>
                                                            <input type="hidden" value="'.$productrow['PID'].'">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div></div>';}
                                            
                                            ?>
                                            
                                        </div>
                                    </td>
                                </tr>

                                



                            </tbody>
                        </table>
                        <table>
                            <tbody>
                                <tr>
                                    <td colspan="3"><span class="btn category"
                                            style="background-color: #fbb448;">other categories </span></td>
                                </tr>
                                <!-- row 1 -->
                                <tr>
                                    <td>
                                        <div class="row col-12 pb-2 mb-2 d-flex justify-content-center"
                                            style="float: right;">
                                            <!-- Card-->
                                            <?php $result = $prouct->showothers();
                                            foreach($result as $productrow)
                                            {echo '<div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                                                

                                            <div>
                                                <div class="cat">
                                                    
                                                    <div class="card rounded shadow-sm border-0">
                                                        <div class="card-body p-2">
                                                            <img 
                                                             src="images/'.$productrow['PPicPath'].'"
                                                                alt="Latte" class="img-fluid d-block mx-auto mb-3 pic">
                                                            <div class="carousel-caption p-3">
                                                                <button class="price" value="5" disabled>'.$productrow['Price'].'</button>
                                                            </div>
                                                            <h6>'.$productrow['Pname'].'</h6>
                                                            <input type="hidden" value="'.$productrow['PID'].'">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div></div>';}
                                            
                                            ?>
                                            
                                        </div>
                                    </td>
                                </tr>

                                



                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    
    </div><!-- this div end ends the table of menue and last order-------------------------------------------------- -->
<!-- --------------------------------------------------------------------------------------------------------------- -->
    <!-- orders -->
    <div class="container pb-5 mb-5 col-lg-6" style="float: left;position: static; margin-bottom: 5%;">
        <div class="row px-5 pb-5 justify-content-center">

            <div class="card card-outline-secondary">
                <div class="card-header"
                    style="background-color:  rgba(42, 41, 41, 0.762) ;color:#fbb448;text-align: center;">
                    <h3 class="mb-0">Your Orders</h3>
                </div>
                <!-- <div class="card-body"> -->
                
                
               
                
                    <form method="POST" action="test2.php" id="makeorderuser">
                    <select name="username">
                        
                
                        <?php 
                            $myusers = $prouct->systemusers();
                            echo ' $myusers '.'ahmed';
                            foreach($myusers as $user){
                                
                                echo '<option value="' .$user['uid']. '">'.$user['name'].'</option>';
                               
                            }
                        
                        ?>
        
                        </select>
                    <!-- <form autocomplete="off" class="form" role="form"> -->
                    <div class="">
                        <table id="tableoforders" style="text-align: center;">

                            <tr>
                                <td style=" padding-top: 5%;" colspan="6">
                                    <h4 style="text-decoration: underline;">Notes</h4>
                                </td>
                            </tr>
                            <tr style="border-bottom: #fbb3485c 1px solid;">
                                <td colspan="6" style="padding-bottom:5%;">
                                    <textarea cols="50" rows="3"></textarea>
                                </td>
                            </tr>
                            <tr style="border-bottom: #fbb3485c 1px solid;">
                                <td style="padding-bottom: 5%; padding-top: 5%;"><h4 style="text-decoration: underline">Room</h4></td>
                                <td style="padding-bottom: 5%; padding-top: 5%;">
                                    <select>
                                        <option>Room 1</option>
                                        <option>Room 2</option>
                                        <option>Room 3</option>
                                        <option>Room 4</option>
                                    </select>
                                </td>
                            </tr>
                         
                            
                        </table>

                    </div>
                    <!-- <div class="form-group">
                            <label for="inputEmail3">Email</label>
                            <input class="form-control" id="inputEmail3" placeholder="Email" required="" type="email">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3">Password</label>
                            <input class="form-control" id="inputPassword3" placeholder="Password" required=""
                                type="password">
                            <small class="form-text text-muted" id="passwordHelpBlock">Your password must be 8-20
                                characters long, contain letters and numbers, and must not contain spaces, special
                                characters, or emoji.</small>
                        </div>
                        <div class="form-group">
                            <label for="inputVerify3">Verify</label>
                            <input class="form-control" id="inputVerify3" placeholder="Password (again)" required=""
                                type="password">
                        </div> -->
                        

                            <div 
                                style="padding-bottom: 5%; padding-top: 5%; text-align: end;padding-right: 2%;">
                                <span class="finalprice"></span>total price</div>
                        
                    <div class="form-group" style="border-bottom: #fbb3485c 1px solid;">
                        <button class="btn btn-lg float-right category m-3" id="makeorderusersubmit" style="background-color: #fbb448;"
                            type="submit">Check out</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /form card register -->
    </div>
    </div>

    </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="js/userhome.js"></script>

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


