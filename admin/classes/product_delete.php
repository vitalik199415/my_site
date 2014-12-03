<?php
/**
 * Created by PhpStorm.
 * User: Віталій
 * Date: 16.10.2014
 * Time: 22:20
 */
require_once("ACoreAdmin.php");

class product_delete extends ACore_Admin {
    protected function get_content() {

    }

    protected function obr(){
        if ($_GET['del']){
            $product_id =(int)$_GET['del'];

            $query = "DELETE FROM products WHERE product_id='$product_id'";
            $query_img = "DELETE FROM products_picture WHERE product_id='$product_id'";
            if(mysql_query($query) && mysql_query($query_img)) {
                unset($_SESSION['res']);
                $_SESSION['res'] = "Запис успішно видалено";
                header("Location:?view=products");
                exit();
            }
            else {
                exit("Помилка при виконанні запиту. ".mysql_error());
            }
        }
    }
}

?>