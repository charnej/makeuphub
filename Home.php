<!DOCTYPE html>
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
                .row img{
                width: 100%;

            }
            
            .slideimg img{
                width: 100%;
            }
        </style>
    </head>
    <body>
        <section id="Container">
            <?php require_once './headerlayout.php'; ?>
            <section id="main">
                <section id="content">

                    <div class="container-fluid ">
                        <div class="row" style="margin-bottom: 52px;">
                            <div class="col-sm-4" style="text-align: center"><a href="Eyes.php?page=1&subCat=4"><img src="Images/eyes.png" class="contactimg"/></a></div>
                            <div class="col-sm-4" style="text-align: center"><a href="Face.php?page=1&subCat=1"><img src="Images/face.jpg" class="contactimg"/></a></div>
                            <div class="col-sm-4" style="text-align: center"><a href="Lips.php?page=1&subCat=7"><img src="Images/lipspic.jpg" class="contactimg"/></a></div>
                        </div>


                    </div>
                    
                    
                    <div class="w3-content w3-section slideimg" style="margin: auto">
                        <img class="mySlides" src="Images/eyesslide1.jpg">
                        <img class="mySlides" src="Images/eyesslide2.jpg">
                    </div>

                </section>

            </section>
            
        </section>
<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 3000);
}
</script>

        <?php
        require_once './footerlayout.php';
        ?>
    </body>
</html>
