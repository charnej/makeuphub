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
            .fs3, .fs4{border-radius: 20px;

                       margin-left: 26%;
                       margin-top: 20px;
                       margin-right: 30%;
                       height: auto;
                       margin: auto;
                       width: 60%;

            }

            h5{
                font-size: 20px;
            }
            #main{
                height: auto;
            }
        </style>
    </head>
    <body>
        <section id="Container">
            <?php require_once './headerlayout.php'; ?>
            <section id="main">
                <form method="POST">

                    <fieldset class="fs3" style="margin-top: 15px">
                        <h5>Sign In</h5>
                        <label class="center">Username /email address</label><br>
                        <input class="form-control" type="text" id="txtusername" name="txtusername" placeholder="Enter username"/>
                        <br>
                        <br>            
                        <label class="center">Password</label><br>
                        <input class="form-control" type="password" id="txtpassword" name="txtpassword" placeholder="Enter password"/>
                        <br>
                        <br>
                        <input class="btn" id="login" type="submit" name="login" value="Login"/>
                        <br>              

                    </fieldset> 
                </form>
                <br>
                <form method="POST" class="form2">
                    <fieldset class="fs4">
                        <h5>New User? Register here</h5>
                        <label>Name</label><br>
                        <input class="form-control" type="text" id="txtname" name="txtname" placeholder="Enter name"/><br>

                        <label>Last Name</label><br>
                        <input class="form-control" type="text" id="txtlast" name="txtlast" placeholder="Enter lastname"/><br>

                        <label>Email Address</label><br>
                        <input class="form-control" type="text" id="txtemail" name="txtemail" placeholder="Enter email"/><br>

                        <label>Phone Number</label><br>
                        <input class="form-control" type="text" id="txtphone" name="txtphone" placeholder="Enter phone number"/><br>
                        <label>Choose username</label><br>
                        <input class="form-control" type="text" id="txtnewusername" name="txtnewusername" placeholder="Enter username"/><br>

                        <label>Choose password</label><br>
                        <input class="form-control" type="password" id="txtpassword" name="txtpassword" placeholder="Enter password"/><br>

                        <label>Confirm password</label><br>
                        <input class="form-control" type="password" id="txtconfirm" name="txtconfirm" placeholder="Confirm password"/><br>

                        <label>Enter Address</label><br>
                        <input class="form-control" type="text" id="txtaddress" name="txtaddress" placeholder="Address Line 1"/><br>
                        <label>Enter City</label><br>
                        <input class="form-control" type="text" id="txtcity" name="txtcity" placeholder="City"/><br>
                        <label>Enter Province</label><br>
                        <input class="form-control" type="text" id="txtprovince" name="txtprovince" placeholder="Province"/><br>
                        <label>Enter Zip Code</label><br>
                        <input class="form-control" type="text" id="txtzip" name="txtzip" placeholder="Zip Code"/><br>



                        <div class="checkboxy">
                            <input name="checky" id="checky" value="1" type="checkbox"/>
                            <label class="terms">I accept the terms of use</label>
                        </div><br>
                        <input class="btn" id="Register" name="Register" type="submit" value="Register"/>
                    </fieldset>
                </form>
            </section>
        </section>
        <?php
        require_once './footerlayout.php';
        require './ConnectionClass.php';

        if (isset($_POST['login'])) {



            $username = filter_var($_POST['txtusername']);
            $password = filter_var($_POST['txtpassword']);

            $conObj->CheckLogin($username, $password);
        }




        if (isset($_POST['Register'])) {
            $regname = filter_var($_POST['txtname']);
            $reglastname = filter_var($_POST['txtlast']);
            $regemail = filter_var($_POST['txtemail']);
            $regphone = filter_var($_POST['txtphone']);
            $regusername = filter_var($_POST['txtnewusername']);
            $regpassword = filter_var($_POST['txtpassword']);
            $regconfirm = filter_var($_POST['txtconfirm']);
            $regaddress = filter_var($_POST['txtaddress']);
            $regcity = filter_var($_POST['txtcity']);
            $regprovince = filter_var($_POST['txtprovince']);
            $regzip = filter_var($_POST['txtzip']);

            if (empty($_POST['txtname']) || empty($_POST['txtlast']) || empty($_POST['txtemail']) || empty($_POST['txtphone']) || empty($_POST['txtnewusername']) || empty($_POST['txtpassword']) || empty($_POST['txtconfirm']) || empty($_POST['txtaddress']) || empty($_POST['txtcity'])) {
                ?><script>alert("Please fill in all fields")</script> <?php
            }


                $conObj->AddCustomer($regname, $reglastname, $regemail, $regphone, $regpassword, $regusername, $regaddress, $regcity, $regprovince, $regzip);

        }
        ?>


    </body>
</html>
