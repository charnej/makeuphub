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
        <style>
            label{
                width: 100px;
                display: inline-block;
            }
            div{
                padding: 5px;
            }
        </style>
    </head>
    <body>
        <form method="POST" enctype="multipart/form-data">
            <div>
                <label for="product_name">Product Name</label><input type="text" name="product_name" value="" />
            </div>
            <div>
                <label for="product_price">Product Price</label><input type="text" name="product_price" value="" />
            </div>
            <div>
                <label for="product_desc">Product Description</label><textarea name="product_desc" rows="4" cols="20">
                </textarea>
            </div>
            <div>
                <label for="subcat">Subcategory</label>
                <select name="subcat">
                    <option>Foundation</option>
                    <option>Concealer</option>
                    <option>Powder</option>
                    <option>Eyeshadow</option>
                    <option>Eyeliner</option>
                    <option>Mascara</option>
                    <option>Lipstick</option>
                    <option>Liquid Lipstick</option>
                    <option>Lip Liner</option>
                </select>
            </div>
            <div>
                <label for="units_in_stock">Nr of stock</label><input type="number" name="units_in_stock" value="" min="1000"/>
            </div>
            
            <div>
                <input type="file" name="image" value="" />
            </div>
            <div>
                <input type="submit" value="Save to database" name="save" />
            </div>
        </form>
        
        
        <?php
         if (isset($_POST['save'])){
             $imagename = $_FILES['image']['name'];
             $filename = $_FILES['image']['tmp_name'];
             $product_name = $_POST['product_name'];
             $product_price = $_POST['product_price'];
             $product_desc = $_POST['product_desc'];
             $subcat = $_POST['subcat'];
             $stock = $_POST['units_in_stock'];
             $sub_id =0;
             if($subcat=='Foundation'){
                 $sub_id = 1;
             }elseif ($subcat=='Concealer') {
                $sub_id = 2;
            }
            elseif ($subcat=='Powder') {
                $sub_id = 3;
            }elseif ($subcat=='Eyeshadow') {
                $sub_id = 4;
            }elseif ($subcat=='Eyeliner') {
                $sub_id = 5;
            }elseif ($subcat=='Mascara') {
                $sub_id = 6;
            }elseif ($subcat=='Lipstick') {
                $sub_id = 7;
            }elseif ($subcat=='Liquid Lipstick') {
                $sub_id = 8;
            }elseif ($subcat=='Lip Liner') {
                $sub_id = 9;
            }
             
             require './ConnectionClass.php';
             $imagename = uniqid().$imagename;
             $conObj->AddProduct($product_name, $product_price, $product_desc,$sub_id, $imagename,$stock);
             
             $destination = "Images/$imagename";
             if(move_uploaded_file($filename, $destination)){
                 echo "success";
             }
             
             //$conObj->DisplayProducts();
             
         }
        ?>
    </body>
</html>
