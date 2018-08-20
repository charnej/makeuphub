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
                            if (isset($_GET["subCat"]) && $_GET["subCat"] == '4') {
                                ?>
                                    <button class="tablinks active" name="4" onclick="openSubcategory(event, 'Eyeshadow', '4')" id="defaultOpen">Eyeshadow</button>
                                    <button class="tablinks" name="5" onclick="openSubcategory(event, 'Eyeliner', '5')">Eyeliner</button>
                                    <button class="tablinks" name="6" onclick="openSubcategory(event, 'Mascara', '6')">Mascara</button>
                                <?php
                            } else if (isset($_GET["subCat"]) && $_GET["subCat"] == '5') {
                                ?>
                                    <button class="tablinks" name="4" onclick="openSubcategory(event, 'Eyeshadow', '4')" id="defaultOpen">Eyeshadow</button>
                                    <button class="tablinks active" name="5" onclick="openSubcategory(event, 'Eyeliner', '5')">Eyeliner</button>
                                    <button class="tablinks" name="6" onclick="openSubcategory(event, 'Mascara', '6')">Mascara</button>
                                <?php
                            } else if (isset($_GET["subCat"]) && $_GET["subCat"] == '6') {
                                ?>
                                    <button class="tablinks" name="7" onclick="openSubcategory(event, 'Eyeshadow', '4')" id="defaultOpen">Eyeshadow</button>
                                    <button class="tablinks" name="8" onclick="openSubcategory(event, 'Eyeliner', '5')">Eyeliner</button>
                                    <button class="tablinks active" name="9" onclick="openSubcategory(event, 'Mascara', '6')">Mascara</button>
                                <?php
                            } 
                        ?>
                        

                    </div>

                    <?php 
                            if (isset($_GET["subCat"]) && $_GET["subCat"] == '4') { ?>
                                <div id="Eyeshadow" class="tabcontent">
                                    <h3>Eyeshadow</h3>
                                    <p>
                                        <?php
                                        $conObj->DisplayProductsTest(4,'Eyes');
                                        ?>
                                    </p>
                                </div>
                    <?php
                            } else if (isset($_GET["subCat"]) && $_GET["subCat"] == '5') { ?>                
                                <div id="Eyeliner" class="tabcontent">
                                    <h3>Eyeliner</h3>
                                    <p>
                                        <?php
                                        $conObj->DisplayProductsTest(5,'Eyes');
                                        ?>
                                    </p> 
                                </div>
                    <?php
                            } else if (isset($_GET["subCat"]) && $_GET["subCat"] == '6') { ?>   
                                <div id="Mascara" class="tabcontent">
                                    <h3>Mascara</h3>
                                    <p>
                                        <?php
                                        $conObj->DisplayProductsTest(6,'Eyes');
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


                window.location.href = "Eyes.php?page=1&subCat=" + categoryNo;
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
