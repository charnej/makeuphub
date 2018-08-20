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
             
            table{
                padding: 10px;
                display: inline-block;
            }
            p{
                text-align: center;
                width: 50%;
            }
            .description{
                text-decoration: none;
                color: black;
                height: 60px;
                height: auto;
                margin-left: -25%;
            }
            a:hover{
                text-decoration: none;
            }
            table a{
                text-decoration: none;
            }

        </style>
    </head>
    <body>
        <section id="Container">
            <?php
            require_once './headerlayout.php';
            ;
            ?>
            <section id="main">
                <section id="content">
                    <?php
                    //$criteria = filter_var($_GET['searchCrit']);
                    $criteria = $_SESSION['searchsession'];
                    require './ConnectionClass.php';
                    ?>
                    <div class="displayProducts">
                        <?php
                    $conObj->SearchProducts($criteria);
                    ?>
                    </div>
                    
                    
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
