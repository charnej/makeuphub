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
                            if (isset($_GET["subCat"]) && $_GET["subCat"] == '1') {
                                ?>
                                    <button class="tablinks active" name="1" onclick="openSubcategory(event, 'Foundation', '1')" id="defaultOpen">Foundation</button>
                                    <button class="tablinks" name="2" onclick="openSubcategory(event, 'Concealer', '2')">Concealer</button>
                                    <button class="tablinks" name="3" onclick="openSubcategory(event, 'Powder', '3')">Powder</button>
                                <?php
                            } else if (isset($_GET["subCat"]) && $_GET["subCat"] == '2') {
                                ?>
                                    <button class="tablinks" name="1" onclick="openSubcategory(event, 'Foundation', '1')" id="defaultOpen">Foundation</button>
                                    <button class="tablinks active" name="2" onclick="openSubcategory(event, 'Concealer', '2')">Concealer</button>
                                    <button class="tablinks" name="3" onclick="openSubcategory(event, 'Powder', '3')">Powder</button>
                                <?php
                            } else if (isset($_GET["subCat"]) && $_GET["subCat"] == '3') {
                                ?>
                                    <button class="tablinks" name="1" onclick="openSubcategory(event, 'Foundation', '1')" id="defaultOpen">Foundation</button>
                                    <button class="tablinks" name="2" onclick="openSubcategory(event, 'Concealer', '2')">Concealer</button>
                                    <button class="tablinks active" name="3" onclick="openSubcategory(event, 'Powder', '3')">Powder</button>
                                <?php
                            } 
                        ?>
                        

                    </div>

                    <?php 
                            if (isset($_GET["subCat"]) && $_GET["subCat"] == '1') { ?>
                                <div id="Foundation" class="tabcontent">
                                    <h3>Foundation</h3>
                                    <p>
                                        <?php
                                        $conObj->DisplayProductsTest(1,'Face');
                                        ?>
                                    </p>
                                </div>
                    <?php
                            } else if (isset($_GET["subCat"]) && $_GET["subCat"] == '2') { ?>                
                                <div id="Concealer" class="tabcontent">
                                    <h3>Concealer</h3>
                                    <p>
                                        <?php
                                        $conObj->DisplayProductsTest(2,'Face');
                                        ?>
                                    </p> 
                                </div>
                    <?php
                            } else if (isset($_GET["subCat"]) && $_GET["subCat"] == '3') { ?>   
                                <div id="Powder" class="tabcontent">
                                    <h3>Powder</h3>
                                    <p>
                                        <?php
                                        $conObj->DisplayProductsTest(3,'Face');
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


                window.location.href = "Face.php?page=1&subCat=" + categoryNo;
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
