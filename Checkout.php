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

            .fs2{border-radius: 20px;

                 margin-left: 26%;
                 margin-top: 20px;
                 margin-right: 30%;
                 height: auto;
                 margin: auto;
                 width: 60%;           
            }
        </style>
    </head>
    <body>
        <section id="Container">
            <?php require_once './headerlayout.php'; ?>
            <?php
            require './ConnectionClass.php';
            $totalamount = $_SESSION['orderTotal'];
            if (isset($_POST['proceed'])) {

                $payment_method = $_POST['payment'];
                if ($payment_method == 'Credit card') {
                    $pay_id = 1;
                } else {
                    $pay_id = 2;
                }
                if (isset($_POST['ship'])) {
                    $shipping = $_POST['ship'];
                    if ($shipping == 'Standard') {
                        $shipid = 1;
                        $price = 35;
                    } else {
                        $shipid = 2;
                        $price = 55;
                    }

                    //echo $shipid;
                    $_SESSION['pay_id'] = $pay_id;
                    $_SESSION['ship_id'] = $shipid;
                    $_SESSION['ship_price'] = $price;
                    header('location: Invoice.php');
                } else {
                    ?>
                    <script>alert("Please Select Shipping Method")</script>
                    <?php
                }
            }
            ?>
            <section id="main">

                <section id="content">
                    <section id="homeContent">


                        <form method="post" class="form2">
                            <h1 style="text-align: center; padding-top: 10px">PAYMENT</h1>
                            <fieldset class="fs2">   
                                <label>Payment Method</label><br>
                                <select id="pay" name="payment" onchange="java_script_:ShowHidden(this.options[this.selectedIndex.value])">
                                    <option value="Credit card" >Credit card</option><br>
                                    <option value="Debit card">Debit card</option><br>
                                    <option value="Gift card">Gift card</option><br>
                                </select>
                                <br>
                                <br>

                                <div id="credit"><label>Card card number:</label><br>
                                    <input class="form-control" type="text" placeholder="Entercard number..."/></div>

                                <br>

                                <label>Expiration date</label>
                                <br>
                                <select id="exp">
                                    <option value="Month">Month</option><br>
                                    <option value="January">January</option><br>
                                    <option value="February">February</option><br>
                                    <option value="March">March</option><br>
                                    <option value="April">April</option><br>
                                    <option value="May">May</option><br>
                                    <option value="June">June</option><br>
                                    <option value="July">July</option><br>
                                    <option value="August">August</option><br>
                                    <option value="September">September</option><br>
                                    <option value="October">October</option><br>
                                    <option value="November">November</option><br>
                                    <option value="December">December</option><br>
                                </select>
                                <select id="yr">
                                    <option value="Year">Year</option><br>
                                    <option value="2016">2016</option><br>
                                    <option value="2017">2017</option><br>
                                    <option value="2018">2018</option><br>
                                    <option value="2019">2019</option><br>
                                    <option value="2020">2020</option><br>
                                </select>
                                <br>
                                <br>
                                <label>CVV</label><br>
                                <input class="form-control" type="text" placeholder="Enter CVV here..."/><br>
                                <label>Shipping Method</label><br>                 
                                <br><input class="form-control" type="radio" name="ship" id="standard" value="Standard"/>
                                <label for="standard">Standard - R 35</label>
                                <br>
                                <br><input class="form-control" type="radio" name="ship" id="express" value="Express"/>
                                <label for="express">Express - R 55</label> 
                                <br>

                                <p><img src="../images/card.jpg"/></p> 
                                <input class="addcart" type="submit" value="Proceed" name="proceed"/>
                            </fieldset>   
                        </form>



                    </section>

                </section>

            </section>
        </section>
        <section style="float: right; width: -webkit-fill-available">
<?php
require_once './footerlayout.php';
?>
        </section>      

    </body>
</html>
