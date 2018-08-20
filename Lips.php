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
            img{
                max-width: 200px;
                height: auto;
            }
            table{
                padding: 10px;
                display: inline-block;
            }
            #content p{
                text-align: center;
            }
            .description{
                text-decoration: none;
                color: black;
            }
            .description a:hover{
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
            require './ConnectionClass.php';
            ?>
            <section id="main">
                <section id="content">
                    <div class="tab">

                        <?php 
                            if (isset($_GET["subCat"]) && $_GET["subCat"] == '7') {
                                ?>
                                    <button class="tablinks active" name="7" onclick="openSubcategory(event, 'Lipstick', '7')" id="defaultOpen">Lipstick</button>
                                    <button class="tablinks" name="8" onclick="openSubcategory(event, 'Liquid Lipstick', '8')">Liquid Lipstick</button>
                                    <button class="tablinks" name="9" onclick="openSubcategory(event, 'Lip Liner', '9')">Lip Liner</button>
                                <?php
                            } else if (isset($_GET["subCat"]) && $_GET["subCat"] == '8') {
                                ?>
                                    <button class="tablinks" name="7" onclick="openSubcategory(event, 'Lipstick', '7')" id="defaultOpen">Lipstick</button>
                                    <button class="tablinks active" name="8" onclick="openSubcategory(event, 'Liquid Lipstick', '8')">Liquid Lipstick</button>
                                    <button class="tablinks" name="9" onclick="openSubcategory(event, 'Lip Liner', '9')">Lip Liner</button>
                                <?php
                            } else if (isset($_GET["subCat"]) && $_GET["subCat"] == '9') {
                                ?>
                                    <button class="tablinks" name="7" onclick="openSubcategory(event, 'Lipstick', '7')" id="defaultOpen">Lipstick</button>
                                    <button class="tablinks" name="8" onclick="openSubcategory(event, 'Liquid Lipstick', '8')">Liquid Lipstick</button>
                                    <button class="tablinks active" name="9" onclick="openSubcategory(event, 'Lip Liner', '9')">Lip Liner</button>
                                <?php
                            } 
                        ?>
                        

                    </div>

                    <?php 
                            if (isset($_GET["subCat"]) && $_GET["subCat"] == '7') { ?>
                                <div id="Lipstick" class="tabcontent">
                                    <h3>Lipstick</h3>
                                    <p>
                                        <?php
                                        $conObj->DisplayProductsTest(7,'Lips');
                                        ?>
                                    </p>
                                </div>
                    <?php
                            } else if (isset($_GET["subCat"]) && $_GET["subCat"] == '8') { ?>                
                                <div id="Liquid Lipstick" class="tabcontent">
                                    <h3>Liquid Lipstick</h3>
                                    <p>
                                        <?php
                                        $conObj->DisplayProductsTest(8,'Lips');
                                        ?>
                                    </p> 
                                </div>
                    <?php
                            } else if (isset($_GET["subCat"]) && $_GET["subCat"] == '9') { ?>   
                                <div id="Lip Liner" class="tabcontent">
                                    <h3>Lip Liner</h3>
                                    <p>
                                        <?php
                                        $conObj->DisplayProductsTest(9,'Lips');
                                        ?>
                                    </p>
                                </div>
                    <?php
                            }
                    ?>
                </section>



            </section>
        </section>      
        <script>

            

            function openSubcategory(evt, subName, categoryNo) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                //document.getElementById(subName).style.display = "block";
                evt.currentTarget.className += " active";


                window.location.href = "Lips.php?page=1&subCat=" + categoryNo;
            }

            // Get the element with id="defaultOpen" and click on it
            //document.getElementById("defaultOpen").click();


        </script>
        <section style="float: right; width: -webkit-fill-available">
            <?php
            require_once './footerlayout.php';
            ?>
        </section>

    </body>
</html>
