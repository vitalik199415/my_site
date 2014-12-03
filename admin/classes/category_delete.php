<?php
/**
 * Created by PhpStorm.
 * User: Віталій
 * Date: 17.10.2014
 * Time: 11:48
 */

require_once("ACoreAdmin.php");

class category_delete extends ACore_Admin {
    protected function get_content()
    {
        // TODO: Implement get_content() method.
    }

    protected function obr()
    {
        if ($_GET['del']){
            $id =(int)$_GET['del'];

            $query = "DELETE FROM categories WHERE category_id='$id'";
            if(mysql_query($query)) {
                unset($_SESSION['res']);
                $_SESSION['res'] = "Запис успішно видалено";
                header("Location:?view=categories");
                exit();
            }
            else {
                exit("Помилка при виконанні запиту. ".mysql_error());
            }
        }
    }
}

?>