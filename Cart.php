<?php session_start(); ?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="mainstyle.css">
        <link href="css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <style>
            .cartempt{
                width: 80%;
                margin: auto;
                text-align: center;
            }

            #cartdelete{
                width: 20%;
                margin: auto;
                margin-bottom: 2%;
            }
            #cartdelete input[type=submit]{
                background-color: lightcoral;
                border: none;
                color: white;
                padding: 10px;
                border-radius: 10px;
                width: 100%;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <section id="Container">
            <?php
            require_once './headerlayout.php';

            if (empty($_SESSION['product_info'])) {
                echo '<div class="cartempt"><img src="Images/empty_cart.png"  alt="empty_cart"/></div>';
            } else {
                $details = $_SESSION['product_info'];


                if (isset($_POST['remove'])) {

                    $delete = $_POST['removeid'];
                    //echo $delete;

                    foreach ($details as $i => $v) {
                        if ($v[0] == $delete) {
                            echo $v[0];
                            unset($details[$i]);
                        }
                        $_SESSION['product_info'] = $details;
                    }
                }
                $details = $_SESSION['product_info'];

                if (isset($_POST['clear'])) {
                    unset($_SESSION['product_info']);
                    session_destroy();
                    header('location: Cart.php');
                }
                ?>



                <section id="main">
                    <section class="cart" class="table-responsive">
                        <form method="post">
                            <div id="cartdelete">
                                <input type="submit" value="CLEAR CART" name="clear" />
                            </div>
                            <table class="table">
                                <tr>
                                    <th class="center" colspan="2">Item</th>
                                    <th class="center">Name</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                    <th class="center">Remove</th>
                                </tr>
                                <?php
                                $total = 0;
                                foreach ($details as $value) {
                                    $total+= $value[3];
                                    ?>

                                    <tr>
                                        <td><input type="hidden" name="removeid" value="<?php echo $value[0]; ?>"></td>
                                        <td><img class="cartimg" class="img-responsive" src="Images/<?php echo $value[1] ?>" alt=""/></td>
                                        <td><?php echo $value[2] ?><br></td>
                                        <td class="center"><?php echo $value[4] ?></td>
                                        <td>R <?php echo $value[3] ?></td>
                                        <td class="center"><input type="submit" class="addcart" name="remove" value="DELETE"/></td>
                                    </tr>


                                    <?php
                                }
                                ?>
                                <?php
                                if (!empty($_SESSION['product_info'])) {
                                    $vat = round($total * 0.14, 2);
                                    $totalvat = $total + $vat;
                                    ?>
                                    <tr>
                                        <th colspan="4" style="text-align: right">VAT </th>
                                        <th colspan="2">R <?php echo $vat; ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="4" style="text-align: right">TOTAL </th>
                                        <th colspan="2">R <?php echo $total + $vat; ?></th>
                                    </tr>
                                    <tr>
                                        <th colspan="6" style="text-align: right"><input type="submit" class="addcart" name="checkout" value="CHECKOUT"/></th>
                                    </tr>
                                    <?php
                                } else {
                                    echo '<div class="cartempt"><img src="Images/empty_cart.png"  alt="empty_cart"/></div>';
                                }
                                ?>

                            </table>
                        </form>

                    </section>

                </section>


            </section>


            <?php
            if (isset($_POST['checkout'])) {

                if (!isset($_COOKIE['customer_details'])) {
                    ?><script>alert("Please login or register to proceed with checkout");</script><?php
                    header('location: Login.php');
                } else {

                    $_SESSION['orderTotal'] = $total;
                    header('location: Checkout.php');
                }
            }
        }


        require_once './footerlayout.php';
        ?>
    </body>
</html>
