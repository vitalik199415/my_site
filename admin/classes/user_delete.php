<?php
/**
 * Created by PhpStorm.
 * User: Віталій
 * Date: 20.10.2014
 * Time: 21:39
 */

require_once("ACoreAdmin.php");

class user_delete extends ACore_Admin {
    protected function get_content()
    {
        // TODO: Implement get_content() method.
    }

    /**
     *
     */
    protected function obr()
    {
        if ($_GET['del']){
            $id =(int)$_GET['del'];

            $query = "DELETE FROM customers WHERE customers_id='$id'";
            if(mysql_query($query)) {
                unset($_SESSION['res']);
                $_SESSION['res'] = "Запис успішно видалено";
                header("Location:?view=users");
                exit();
            }
            else {
                unset($_SESSION['res']);
                $_SESSION['res'] = "Помилка при виконанні запиту. ".mysql_error();
                header("Location:?view=users");
                exit();
            }
        }
    }

}

?> 