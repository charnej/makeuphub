<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConnectionClass
 *
 * @author User
 */
class ConnectionClass {

    private $host, $username, $password, $database;
    private $link;

    function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    function ConnectDB() {
        $this->link = mysqli_connect($this->host, $this->username, $this->password, $this->database);
        if (!$this->link) {
            die("A problem occured");
        }
    }

    function AddProduct($product_name, $product_price, $product_desc, $subcat, $image, $stock) {
        $query = "INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_description`, `product_image`, `subcategory_id`) VALUES (NULL, '$product_name', '$product_price', '$product_desc', '$image', '$subcat');";
        if (mysqli_query($this->link, $query)) {
            echo "Product added";
        } else {
            echo "A problem occured";
        }
        $last_id = mysqli_insert_id($this->link);
        $query = "INSERT INTO `inventory` (`inventory_id`, `units_in_stock`, `product_id`) VALUES (NULL, '$stock', '$last_id');";
        mysqli_query($this->link, $query);
    }

    function DisplayProductsTest($subcat, $cat) {
        $results_per_page = 10;
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        } else {
            $page = 1;
        };

        if (isset($_GET["subCat"])) {
            $subcat = $_GET["subCat"];
        }

        $start_from = ($page - 1) * $results_per_page;

        $query = "SELECT `products`.`product_id`, `products`.`product_name`, `products`.`product_price`, `products`.`product_description`, `products`.`product_image`, `products`.`subcategory_id` FROM `products` WHERE `products`.`subcategory_id` = $subcat LIMIT $start_from," . $results_per_page;
        $result = mysqli_query($this->link, $query);

        while ($row = mysqli_fetch_array($result, 1)) {
            $product_id = $row['product_id'];
            $subcat_id = $row['subcategory_id'];
            $product_name = $row['product_name'];
            ?>
            <ul class="prdisplay" style="list-style: none">
                <li>
                    <a href="Product.php?id=<?php echo $product_id ?>">
                        <img src="Images/<?php echo $row['product_image'] ?>" alt="">
                        <p class="description"><?php echo $row['product_name'] ?></p>
                        <p style="color: black; margin-left: -25%"><?php echo $row['product_price']; ?></p>
                    </a>
                </li>

            </ul>

            <?php
        }
        $sql = "SELECT COUNT(`products`.`product_id`) AS total FROM `products` WHERE `products`.`subcategory_id` = $subcat ";
        $results = mysqli_query($this->link, $sql);
        $row = mysqli_fetch_array($results);
        $total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results

        echo '<ul class="pagination">';

        for ($i = 1; $i <= $total_pages; $i++) {
            ?>
            <a href="<?php echo $cat ?>.php?page=<?php echo $i; ?>&subCat=<?php echo $subcat; ?>"><?php echo $i . " "; ?></a>
            <?php
        }

        echo '</ul>';
    }

    function DisplayProductsTest2($id = NULL) {
        if ($id == NULL) {
            $query = "SELECT `products`.`product_id`,`product_description`, `products`.`product_name`, `products`.`product_price`, `products`.`product_image`, `subcategory`.`subcategory_name` FROM `subcategory` LEFT JOIN `products` ON `products`.`subcategory_id` = `subcategory`.`subcategory_id`";
        } else {
            $query = "SELECT `products`.`product_id`, `product_description`, `products`.`product_name`, `products`.`product_price`, `products`.`product_image`, `subcategory`.`subcategory_name` FROM `subcategory` LEFT JOIN `products` ON `products`.`subcategory_id` = `subcategory`.`subcategory_id` WHERE `products`.`product_id` = $id";
            return mysqli_query($this->link, $query);
        }
    }

    function SearchProducts($criteria) {
        $results_per_page = 10;
        if (isset($_GET["page"])) {
            $page = $_GET["page"];
        } else {
            $page = 1;
        }
        $start_from = ($page - 1) * $results_per_page;
        $counter = 0;
        $query = "SELECT `products`.`product_id`, `products`.`product_name`, `products`.`product_price`, `products`.`product_description`, `products`.`product_image`, `products`.`subcategory_id` FROM `products` WHERE `products`.`product_name` LIKE '%$criteria%'LIMIT $start_from," . $results_per_page;
        $result = mysqli_query($this->link, $query);

        while ($row = mysqli_fetch_array($result, 1)) {
            $product_id = $row['product_id'];
            $subcat_id = $row['subcategory_id'];
            $product_name = $row['product_name'];
            ?>
            <ul class="prdisplay" style="list-style: none">
                <li>
                    <a href="Product.php?id=<?php echo $product_id ?>">
                        <img src="Images/<?php echo $row['product_image'] ?>" alt="">
                        <p class="description"><?php echo $row['product_name'] ?></p>
                        <p style="color: black; margin-left: -25%"><?php echo $row['product_price']; ?></p>
                    </a>
                </li>

            </ul>
            <?php
            $counter ++;
        }
        $sql = "SELECT COUNT(`products`.`product_id`) AS total FROM `products` WHERE `products`.`product_name` LIKE '%$criteria%' ";
        $results = mysqli_query($this->link, $sql);
        $row = mysqli_fetch_array($results);
        $total_pages = ceil($row["total"] / $results_per_page);

        echo '<ul class="pagination">';
        for ($i = 1; $i <= $total_pages; $i++) {
            echo "<li><a href='searchTest.php?page=" . $i . "'";
            if ($i == $page)
                echo " class='curPage'";
            echo ">" . $i . "</a> </li>";
        }
        echo '</ul>';
    }

    function AddCustomer($name, $surname, $email, $phone, $password, $username, $address, $city, $province, $postal) {
        $query = "SELECT `customers`.* FROM `customers`";
        $result = mysqli_query($this->link, $query);
        while ($row = mysqli_fetch_array($result, 1)) {
            $uname = $row['cust_username'];
            if ($username == $uname) {
                ?>
                <script>alert('Username alreadytaken');</script>
                <?php
                    return;
            } else {
                
            }
           
        }
         $query = "INSERT INTO `customers` (`cust_id`, `cust_name`, `cust_surname`, `cust_email`, `cust_phone`, `cust_password`, `cust_username`, `cust_address`, `cust_city`, `cust_province`, `cust_postalcode`) VALUES (NULL, '$name', '$surname', '$email', '$phone', '$password', '$username', '$address', '$city', '$province', '$postal');";
         mysqli_query($this->link, $query);
    }

    function CheckLogin($username, $password) {

        $query = "SELECT `customers`.* FROM `customers` WHERE ((`customers`.`cust_username` = '$username') AND (`customers`.`cust_password` = '$password'))";
        $result = mysqli_query($this->link, $query);

        $row = mysqli_fetch_array($result);

        $cust_id = $row['cust_id'];
        $cust_name = $row['cust_name'];
        $cust_surname = $row['cust_surname'];
        $cust_email = $row['cust_email'];
        $cust_phone = $row['cust_phone'];
        $cust_username = $row['cust_username'];
        $cust_password = $row['cust_password'];
        $cust_address = $row['cust_address'];
        $cust_city = $row['cust_city'];
        $cust_province = $row['cust_province'];
        $cust_postalcode = $row['cust_postalcode'];

        if ($cust_username == $username && $cust_password == $password) {
            $cust_details = array($cust_id, $cust_name, $cust_surname, $cust_email, $cust_phone, $cust_password, $cust_address, $cust_city, $cust_province, $cust_postalcode);
            setcookie('customer_details', json_encode($cust_details));
            header('Location: Home.php');
        } else {
            ?>
            <script>alert("Please Enter Valid Username or Password");</script>
            <?php
        }
    }

    function GetCustomerDetails() {
        $query = "SELECT `customers`.* FROM `customers`";
        mysqli_query($this->link, $query);
    }

    function GetCustomerOrder($cust_id) {
        $query = "SELECT `products`.`product_name`, `products`.`product_image`, `orderdetails`.`quantity`,`products`.`product_price`, `orders`.`total`,`orders`.`order_id` FROM `products` LEFT JOIN `orderdetails` ON `orderdetails`.`od_product_id` = `products`.`product_id` LEFT JOIN `orders` ON `orderdetails`.`od_order_id` = `orders`.`order_id` LEFT JOIN `customers` ON `orders`.`customer_id` = `customers`.`cust_id` WHERE (`customers`.`cust_id`= '$cust_id')ORDER BY `orders`.`order_id`";
        $result = mysqli_query($this->link, $query);

        $orders = array();
        while ($row = mysqli_fetch_array($result)) {
            $order_total = $row['total'];
            $orders[] = $row;
        }
        if (!empty($orders)) {
            $firstorder_id = $orders[0][5];
            $prev_order = $orders[0];
            foreach ($orders as $value) {
                if ($firstorder_id != $value[5]) {
                    ?>
                    <hr>
                    <div class="row totalp">
                        <p> Total : R <?php echo $prev_order[4]; ?> </p>

                    </div>
                    <hr>
                    <?php
                    $firstorder_id = $value[5];
                    $prev_order = $value;
                }
                ?>
                <div class="row">
                    <div class="col-lg-3"><p><?php echo $value[0]; ?></p></div>
                    <div class="col-lg-3"><img class="img-responsive" src="Images/<?php echo $value[1] ?>" width="50%" alt=""/></div>
                    <div class="col-lg-3"><?php echo $value[2]; ?></div>
                    <div class="col-lg-3">R <?php echo $value[3] * $value[2]; ?></div>  
                </div>

                <?php
            }
            ?>
            <hr>
            <div class="row totalp">
                <p>Total : R <?php echo $prev_order[4]; ?> </p>

            </div>
            <hr>
            <?php
        }
    }

    function AddOrder($cust_id, $ship_id, $total, $productdetails, $paymethod) {
        $query = "SELECT `shipping`.`shipping_price` FROM `shipping` WHERE (`shipping`.`shipping_id` = '$ship_id')";
        $result = mysqli_query($this->link, $query);
        $row = mysqli_fetch_array($result);
        $shipprice = $row['shipping_price'];
        $total = $total + $shipprice;
        $query = "INSERT INTO `orders` (`order_id`, `order_date`, `total`, `customer_id`, `shipping_id`) VALUES (NULL, CURDATE(), '$total', '$cust_id', '$ship_id');";
        mysqli_query($this->link, $query);

        $last_id = mysqli_insert_id($this->link);
        foreach ($productdetails as $value) {
            $query = "INSERT INTO `orderdetails` (`order_details_id`, `quantity`, `od_product_id`, `od_order_id`) VALUES (NULL, '$value[4]', '$value[0]', '$last_id');";
            mysqli_query($this->link, $query);
        }

        $query = "INSERT INTO `payments` (`payment_id`, `payment_method_id`, `order_id`) VALUES (NULL, '$paymethod', '$last_id');";
        mysqli_query($this->link, $query);
    }

    function UpdateProfile($name, $surname, $email, $phone, $address, $city, $province, $postal, $custid, $password = NULL) {
        if ($password == NULL) {
            $query = "UPDATE `customers` SET `cust_name` = '$name', `cust_surname` = '$surname', `cust_email` = '$email', `cust_phone` = '$phone', `cust_address` = '$address', `cust_city` = '$city', `cust_province` = '$province', `cust_postalcode` = '$postal' WHERE `customers`.`cust_id` = $custid;";
        } else {

            $query = "UPDATE `customers` SET `cust_name` = '$name', `cust_surname` = '$surname', `cust_email` = '$email', `cust_phone` = '$phone', `cust_password` = '$password', `cust_address` = '$address', `cust_city` = '$city', `cust_province` = '$province', `cust_postalcode` = '$postal' WHERE `customers`.`cust_id` = $custid;";
        }
        mysqli_query($this->link, $query);
    }

    function AddContactTicket($name, $email, $message) {
        $query = "INSERT INTO `contact_form` (`contact_form_id`, `contact_form_name`, `contact_form_email`, `contact_form_message`) VALUES (NULL, '$name', '$email', '$message');";
        mysqli_query($this->link, $query);
    }

}

$conObj = new ConnectionClass('localhost', 'root', '', 'makeuphub');
$conObj->ConnectDB();




