<?php
/**
 * Created by PhpStorm.
 * User: Віталій
 * Date: 02.10.2014
 * Time: 23:18
 */

    function select_all_products()
    {
        $query = "SELECT p.*, IFNULL(pi.file_name, 'no_image.png') file_name, c.name as `cat_name` FROM products p LEFT JOIN products_picture pi ON p.product_id=pi.product_id AND pi.is_general=1 LEFT JOIN categories c ON p.category=c.category_id";
        $result = mysql_query($query) or die(mysql_error());
        return $result;
    }

    function get_category(){
        $query = "SELECT * FROM categories";
        $result = mysql_query($query) or die(mysql_error());
        return $result;
    }



    function delete_product($product_id){
        $query = "DELETE FROM products WHERE product_id=$product_id";
        $result = mysql_query($query) or die(mysql_error());
        return $result;
    }

    function save_product(){
        include_once "../../config.php";
        $conn = mysql_connect(HOST, USER, PASS);
        mysql_select_db(DB, $conn);
        mysql_query("set names 'utf8'");

        $sku = trim(htmlspecialchars($_POST['sku']));
        $name = trim(htmlspecialchars($_POST['title']));
        $description = trim(htmlspecialchars($_POST['description']));
        $price = trim(htmlspecialchars($_POST['price']));
        $category = trim(htmlspecialchars($_POST['category']));
        $qty = trim(htmlspecialchars($_POST['qty']));
        $meta_title = trim(htmlspecialchars($_POST['meta_title']));
        $meta_description = trim(htmlspecialchars($_POST['meta_description']));
        $meta_keywords = trim(htmlspecialchars($_POST['meta_keywords']));

        $query = "INSERT INTO products(product_id, sku, name, description, price, category, qty, meta_title, meta_description, meta_keywords)
                  VALUES ('',$sku,$name,$description,$price,$category,$qty,$meta_title,$meta_description,$meta_keywords)";
        $result = mysql_query($query) or die(mysql_error());
    }


    switch ($_POST['action']){
        case "edit": edit_product();
        case "add": save_product();
    }
?> 