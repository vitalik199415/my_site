<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 09.09.14
 * Time: 12:23
 * Admin Core
 */

abstract class ACore_Admin {

    /**
     * @var resource
     */
    protected $db;

    public function __construct(){
        $this->db = mysql_connect(HOST, USER, PASS);
        if (!$this->db) {
            exit("Помилка з'єднання з БД".mysql_error());
        }
        if (!mysql_select_db(DB,$this->db)) {
            exit("Вибраної БД не існує.".mysql_error());
        }
        mysql_query("SET NAMES 'UTF8'");

    }
    
    protected function get_header(){
        include "views/header.php";
    }

    protected abstract function obr();

    public function get_body(){
        if ($_POST || $_GET['del']){
            $this->obr();
        }
        $this->get_header();
        //$this->get_category();
        $this->get_content();
    }

    protected function get_category(){
        $query = "SELECT category_id,name FROM categories";
        $result = mysql_query($query) or die(mysql_error());

        return $result;
    }

    /**
     * @param product id
     * @return array
     */
    protected function get_product($id){
        $query = "SELECT * FROM products WHERE product_id='$id'";
        $result = mysql_query($query) or die(mysql_error());
        $product = mysql_fetch_array($result);

        return $product;
    }

    protected function get_categories($id){
        $query = "SELECT * FROM categories WHERE category_id='$id'";
        $result = mysql_query($query) or die(mysql_error());
        $category = mysql_fetch_array($result);

        return $category;
    }
}
?>