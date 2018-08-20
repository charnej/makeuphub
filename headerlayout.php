<?php ob_start(); ?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            #logout{
                background-color: black;
                border: none;
                color: white;
            } 
        </style>
    </head>
    <body>
        <div class="headerTop">
            <ul style="list-style: none; text-align: center">
                <li class="menu"><a href="Cart.php">Cart</a></li>
                <?php
                if (!isset($_COOKIE['customer_details'])) {
                    ?><li class="menu"><a href="Login.php">Sign In</a></li><?php
                    } else {
                        ?> <li class="menu"><a href="Profile.php">Profile</a></li>
                    <form style="display: inline-block;"><li class="menu"><input id="logout" type="submit" value="Log Out" name="logout"></li></form>
                    <?php
                }
                ?>

                <li style="display: inline-block">
                    <form id="search" action="SearchTest.php">
                        <input class="search" type="text" name="searchCrit" placeholder="Search..." required>
                        <input class="addcart" type="submit" value="Search" name="go">
                    </form></li>
            </ul>
        </div>
        <header>

        </header>
        <nav>
            <ol style="list-style: none;text-align: center">
                <li class="navLinks"><a href="Home.php">Home</a></li>
                <li class="navLinks"><a href="Face.php?page=1&subCat=1">Face</a></li>
                <li class="navLinks"><a href="Lips.php?page=1&subCat=7">Lips</a></li> 
                <li class="navLinks"><a href="Eyes.php?page=1&subCat=4">Eyes</a></li>

            </ol>

        </nav>

        <?php
        if (isset($_GET['go'])) {
            $searchcriteria = filter_var($_GET['searchCrit']);
            $_SESSION['searchsession'] = $searchcriteria;
        }
        if (isset($_GET['logout'])) {
            setcookie('customer_details', json_encode($cust_details), time() - 20);
            header('location: Home.php');
            unset($_SESSION['product_info']);
        }
        ?>
    </body>
</html>
