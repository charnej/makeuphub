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
        <link href="sidenav.css" rel="stylesheet" type="text/css"/>
        <link href="css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <style>
            #paybtn{
                background-color: #e5f0ef;
                width: 100%;
                border: none;
                padding: 10px;
                border-radius: 10px;
                font-weight: bold;
                font-size: larger;
            }



        </style>
    </head>
    <body>
        <section id="Container">
            <?php
            require_once './headerlayout.php';
            require './ConnectionClass.php';
            $totalamount = $_SESSION['orderTotal'];
            $shippingPrice = $_SESSION['ship_price'];
            $shippingID = $_SESSION['ship_id'];
            $payment_id = $_SESSION['pay_id'];
            if (isset($_POST['pay'])) {
                echo 'fgfggdgf';
                $orderdetails = $_SESSION['product_info'];
                //var_dump($orderdetails);
                $cust_detail = json_decode($_COOKIE['customer_details']);

                list($cust_id, $cust_name, $cust_surname, $cust_email, $cust_phone, $cust_password, $cust_address, $cust_city, $cust_province, $cust_postalcode) = $cust_detail;

                $conObj->AddOrder($cust_id, $shippingID, $totalamount, $orderdetails, $payment_id);
                unset($_SESSION['product_info']);
                unset($_SESSION['pay_id']);
                unset($_SESSION['ship_id']);
                unset($_SESSION['ship_price']);
                header('location: Thanks.php');
            }
            ?>
            <section id="main">

                <form method="post">
                    <table class="table" style="width: 50%; margin: auto;">
                        <thead>
                            <tr>
                                <th>Shipping Amount</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>R <?php echo $shippingPrice; ?></td>
                                <td>R <?php echo $totalamount + $shippingPrice; ?></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input id="paybtn" type="submit" value="MAKE PAYMENT" name="pay" /></td>                        
                            </tr>
                        </tbody>
                    </table>

                </form>

                <div id="myModal" class="modal">


            </section>
        </section>      

        <section style="float: right; width: -webkit-fill-available">
            <?php
            require_once './footerlayout.php';
            ?>
        </section>

    </body>
</html>
