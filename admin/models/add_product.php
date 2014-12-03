<?php
/**
 * Created by PhpStorm.
 * User: Віталій
 * Date: 14.10.2014
 * Time: 13:54
 */

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

?>