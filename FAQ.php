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

    </head>
    <body>
        <section id="Container">
            <?php require_once './headerlayout.php'; ?>
            <section id="main">

                <section id="content">
                    <section id="homeContent">
                        <div>
                            <h1>FAQ'S</h1>
                            <h3>How do I ensure I order the right size?</h3>
                            <p>
                                It's easy! On the right-hand side of each product page you'll
                                find a size tab which contains the measurements and dimensions 
                                for that item. Take a look at the measurements on the table, 
                                and compare them to your own measurements. Please note – if the
                                product is a “one size fits all” the size tab won’t include any 
                                information.
                            </p>
                            <h3>What is 3D Secure?</h3>
                            <p>
                                D secure is a new method of security mandated by the Card 
                                Associations to enhance security of online transactions in 
                                South Africa. Mastercard’s product is called “SecureCode” and
                                Visa’s product is called “Verified by Visa”. 
                            </p>
                            <h3>Can I select somebody to receive my order for me if I am not 
                                going to be there when the Courier service delivers to me?</h3>
                            <p>
                                Yes you can, but do note that we will not accept responsibility 
                                for anyone who receives your order at your chosen address, that
                                is not authorised to do so.
                            </p>
                        </div>
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
