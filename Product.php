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
            #content{
                background-color: yellow;
            }
            .productImage{
                display: inline-block;
                width: 40%;
            }
            .productInfo{
                float: right;
                display: inline-block;
                width: 50%;
                margin-top: 30px;
            }
            product{
                margin: 50px;
                padding: 20px;
            }
            h3{
                font-size: 23px;
                letter-spacing: 1px;
                font-weight: 600;
            }
            h5{
                font-size: 20px;
                letter-spacing: 1px;
            }
            select{
                padding: 5px 21px;
            }


            .ProductDescription{
                width: 60%;
                height: auto;
                float: left;
                margin-left: 25%;
                border: 1px black solid;
            }
            .ProductDescription p{
                padding: 20px;
                text-align: justify
            }

            .productform{

                width: 70%;
                margin: auto;
            }
            img{
                width: 100%;
            }
            
        </style>
    </head>
    <body>
        <?php
        require './ConnectionClass.php';


        $id = $_GET['id'];
        $result = $conObj->DisplayProductsTest2($id);
        $row = mysqli_fetch_array($result);
        $pr_id = $row['product_id'];
        $pr_name = $row['product_name'];
        $pr_image = $row['product_image'];
        $pr_price = $row['product_price'];
        $pr_desc = $row['product_description'];
        ?>

        <section id="Container">
            <?php require_once './headerlayout.php'; ?>
            <section id="main">
                <section class="container-fluid">
                    <form class="productform"action="Product.php?action=addcart">
                        <div class="productImage" class="container-fluid">
                            <img id="product" class="img-responsive" src="Images/<?php echo $pr_image ?>" alt=""/>
                        </div>
                        <div class="productInfo">
                            <h3><?php echo $pr_name ?></h3>
                            <p style="font-size:25px"><?php echo $pr_price ?></p>
                            <div class="qty">
                                <h5>Quantity</h5>

                                <select name="qty_amount">
                                    <?php
                                    for ($qty = 1; $qty < 5; $qty++) {
                                        echo "<option>$qty</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <input type="hidden" name="id" value="<?php echo $pr_id; ?>">
                            <input type="submit" class="addcart" name="add" value="ADD TO CART">
                            <div class="PD">
                                <h2 style="font-size: 20px">Description</h2>
                                <p>
                                    <?php echo $pr_desc ?>
                                </p>
                            </div>
                        </div>
                    </form>
                </section>
            </section>

        </section>
        <?php
        if (isset($_GET['add'])) {
            $detail_id = $_GET['id'];
            if (isset($_GET['qty_amount'])) {
                $quant = $_GET['qty_amount'];
            }

            if (empty($_SESSION['product_info'])) {
                $productinfo = array(
                    array($detail_id, $pr_image, $pr_name, $pr_price * $quant, $quant)
                );
                $_SESSION['product_info'] = $productinfo;
            } else {
                $getarray = $_SESSION['product_info'];
                $productinfo = array($detail_id, $pr_image, $pr_name, $pr_price * $quant, $quant);
                array_push($getarray, $productinfo);
                $_SESSION['product_info'] = $getarray;
            }

            
        }
        ?>
        <section style="float: right; width: -webkit-fill-available">
            <?php
            require_once './footerlayout.php';
            ?>
        </section>
    </body>
</html>
