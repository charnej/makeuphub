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
        <link href="sidenav.css" rel="stylesheet" type="text/css"/>
        <link href="css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <style>
            .form-control{
                width: 80%;
                display: inline-block;
            }
            label{
                width: 100px;
                display: inline-block;
                padding: 5px;
            }
            .totalp p{
                text-align: right;
                width: 100%;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <section id="Container">
            <?php
            require_once './headerlayout.php';
            require './ConnectionClass.php';
            $cust_detail = json_decode($_COOKIE['customer_details']);

            list($cust_id, $cust_name, $cust_surname, $cust_email, $cust_phone, $cust_password, $cust_address, $cust_city, $cust_province, $cust_postalcode) = $cust_detail;
            ?>
            <section id="main">
                <section id="content">
                    <div class="tab">
                        <button class="tablinks" onclick="openDetails(event, 'Profile')" id="defaultOpen">Edit Profile</button>
                        <button class="tablinks" onclick="openDetails(event, 'Orders')">Orders</button>
                    </div>

                    <div id="Profile" class="tabcontent">
                        <h3>Edit Profile</h3>
                        <form method="post">                            
                            <fieldset>
                                <label class="control-label col-sm-2">Name</label>
                                <input class="form-control" type="text" id="txtname" name="txtname" placeholder="Enter name" value="<?php echo $cust_name ?>"/><br>

                                <label class="control-label col-sm-2">Last Name</label>
                                <input class="form-control" type="text" id="txtlast" name="txtlast" placeholder="Enter lastname" value="<?php echo $cust_surname ?>"/><br>

                                <label class="control-label col-sm-2">Email Address</label>
                                <input class="form-control" type="text" id="txtemail" name="txtemail" placeholder="Enter email" value="<?php echo $cust_email ?>"/><br>

                                <label class="control-label col-sm-2">Phone Number</label>
                                <input class="form-control" type="text" id="txtphone" name="txtphone" placeholder="Enter phone number" value="<?php echo $cust_phone ?>"/><br>

                                <label class="control-label col-sm-2">Enter Address</label>
                                <input class="form-control" type="text" id="txtaddress" name="txtaddress" placeholder="Address Line 1" value="<?php echo $cust_address ?>"/><br>
                                <label class="control-label col-sm-2">Enter City</label>
                                <input class="form-control" type="text" id="txtcity" name="txtcity" placeholder="City" value="<?php echo $cust_city ?>"/><br>
                                <label class="control-label col-sm-2">Enter Province</label>
                                <input class="form-control" type="text" id="txtprovince" name="txtprovince" placeholder="Province" value="<?php echo $cust_province ?>"/><br>
                                <label class="control-label col-sm-2">Enter Zip Code</label>
                                <input class="form-control" type="text" id="txtzip" name="txtzip" placeholder="Zip Code" value="<?php echo $cust_postalcode ?>"/><br>

                                <label class="control-label col-sm-2">Choose password</label>
                                <input class="form-control" type="password" id="txtpassword" name="txtpassword" placeholder="Enter password" /><br>

                                <label class="control-label col-sm-2">Confirm password</label>
                                <input class="form-control" type="password" id="txtconfirm" name="txtconfirm" placeholder="Confirm password"/><br>
                                <br>

                                <input class="btn" id="updateprofile" name="updateprofile" type="submit" value="Update Profile"/>
                            </fieldset>
                        </form>
                    </div>

                    <div id="Orders" class="tabcontent container">
                        <h3>Orders</h3>
                        <p>
                        <div class="row">
                            <div class="col-lg-3" style="padding-bottom: 40px; font-size: larger; font-weight: bold;">Product Name</div>
                            <div class="col-lg-3" style="padding-bottom: 40px; font-size: larger; font-weight: bold;">Product Image</div>
                            <div class="col-lg-3" style="padding-bottom: 40px; font-size: larger; font-weight: bold;">Qty</div>
                            <div class="col-lg-3" style="padding-bottom: 40px; font-size: larger; font-weight: bold;">Price</div> 
                            <br/>
                        </div>
                        <?php
                        $customer_orders = $conObj->GetCustomerOrder($cust_id);
                        ?>
                        </p> 
                    </div>


                </section>
            </section>
        </section>
        <?php
        if (isset($_POST['updateprofile'])) {
            $name = filter_var($_POST['txtname']);
            $surname = filter_var($_POST['txtlast']);
            $email = filter_var($_POST['txtemail']);
            $phone = filter_var($_POST['txtphone']);

            $confirm = filter_var($_POST['txtconfirm']);
            $address = filter_var($_POST['txtaddress']);
            $city = filter_var($_POST['txtcity']);
            $province = filter_var($_POST['txtprovince']);
            $postal = filter_var($_POST['txtzip']);


            $password = filter_var($_POST['txtpassword']);

            header('location: Profile.php');
            $conObj->UpdateProfile($name, $surname, $email, $phone, $address, $city, $province, $postal, $cust_id, $password);

            $cust_details = array($cust_id, $name, $surname, $email, $phone, $password, $address, $city, $province, $postal);
            setcookie('customer_details', json_encode($cust_details));
        }
        ?>

        <section style="float: right; width: -webkit-fill-available">
            <?php
            require_once './footerlayout.php';
            ?>
        </section>
        <script>
            function openDetails(evt, detailName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(detailName).style.display = "block";
                evt.currentTarget.className += " active";
            }

            // Get the element with id="defaultOpen" and click on it
            document.getElementById("defaultOpen").click();
        </script>      
    </body>
</html>
