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
            img{
                border-radius: 100%;
                width: 65%;

            }
            p{
                font-weight: bold;
                padding-top: 10px;
                margin-bottom: 10%;
            }
            .contactform{
                width: 50%;
                margin: auto;
                border: 1px solid lightgray;
                border-radius: 20px;
                padding: 50px;
                margin-top: 100px;
            }
            .error{
                border: 2px solid red;
            }

        </style>
    </head>
    <body>
        <section id="Container">
            <?php require_once './headerlayout.php'; ?>
            <section id="main">
                <section id="content">

                    <div class="container-fluid ">
                        <h1 style="text-align: center;padding-bottom: 10px;">CONTACT US</h1>
                        <div class="row" style="border-bottom: 2px dotted lightgray">
                            <div class="col-sm-4" style="text-align: center"><img src="Images/phone.jpg" class="contactimg"/>
                                <p>012 546 2215</p></div>
                            <div class="col-sm-4" style="text-align: center"><img src="Images/email.jpg" class="contactimg"/><p>help@makeup.com</p></div>
                            <div class="col-sm-4" style="text-align: center"><img src="Images/twittag.jpg" class="contactimg"/><p>@makeuphub</p></div>
                        </div>

                        <div class="contactform">
                            <form method="post">
                                <h2 style="text-align: center">Send us a message</h2>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="custname" onblur="checkifempty('name')" placeholder="Enter name" name="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" onblur="checkifempty('email')" name="custemail" placeholder="Enter email" name="email">
                                </div>
                                <label for="message">Message</label>
                                <textarea class="form-control" name="message" id="message" onblur="checkifempty('message')" rows="4" cols="20">
                                </textarea><br/>
                                <button type="submit" class="btn btn-default" name="contactus">Submit</button>
                            </form>
                        </div>

                    </div>


                </section>

            </section>

        </section>
        <?php
        if (isset($_POST['contactus'])) {
            $name = filter_var($_POST['custname']);
            $email = filter_var($_POST['custemail']);
            $message = filter_var($_POST['message']);

            if (empty($name) || empty($email) || empty($message)) {
                ?>
                <script>alert("Please enter all fields")</script>
                <?php
            } else {
                require './ConnectionClass.php';
                $conObj->AddContactTicket($name, $email, $message);
            }
        }
        ?>


        <?php
        require_once './footerlayout.php';
        ?>
        <script>
            function checkifempty(elementID) {
                var element = document.getElementById(elementID);
                var elemValue = element.value;

                if (elemValue.length == 0) {
                    element.setAttribute('class', 'form-control error');
                } else {
                    element.setAttribute('class', 'form-control');
                }
            }
        </script>

    </body>
</html>
