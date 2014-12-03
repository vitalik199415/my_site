<?php
require_once("ACoreAdmin.php");
/**
 * Created by PhpStorm.
 * User: Віталій
 * Date: 03.10.2014
 * Time: 0:04
 */

    class products extends ACore_Admin {

        protected function obr(){}

        protected function get_content(){

            echo "<div id='wrapper'>";

            if ($_SESSION['res']) {
                echo "<script>alert('".$_SESSION['res']."');</script>";
                unset($_SESSION['res']);
            }

            $query = "SELECT p.*, IFNULL(pi.file_name, 'no_image.png') file_name, c.name as `cat_name` FROM products p LEFT JOIN products_picture pi ON p.product_id=pi.product_id AND pi.is_general=1 LEFT JOIN categories c ON p.category=c.category_id";
            $result = mysql_query($query) or die(mysql_error());

            print("
            <div id='show'>
                <h1>Список товарів</h1>
                <table cellspacing='0' cellpadding='5px'>
                    <tr>
                        <th>Код товару</th>
                        <th>Назва товару</th>
                        <th>Категорія товару</th>
                        <th>К-ть товару</th>
                        <th>Ціна товару</th>
                        <th>Редагувати</th>
                        <th>Видалити</th>
                    </tr>");

            if (mysql_num_rows($result)>0) {
                while ($arr = mysql_fetch_array($result)) {
                    print('
                        <tr>
                            <td>' . $arr['sku'] . '</td>
                            <td>' . $arr['name'] . '</td>
                            <td>' . $arr['cat_name'] . '</td>
                            <td>' . $arr['qty'] . '</td>
                            <td>' . $arr['price'] . ' грн.</td>
                            <td>
                                <a href="?view=product_edit&id=' . $arr['product_id'] . '" class="edit"><img src="images/edit.png"></a>
                            </td>
                            <td>
                                <a href="?view=product_delete&del=' . $arr['product_id'] . '" class="delete"><img src="images/delete.png"></a>
                            </td>
                        </tr>
                    ');
                }
            }
            else { echo "<tr><td colspan='6'>В таблиці немає записів</td></tr>"; }
            echo   "</table>
                    <a href='?view=product_add' class='add'> Add product <img src='images/plus.png' width='16px' style='vertical-align: middle'> </a><br>
                    <br>";
            echo "</div>";


            echo "</div>";
        }

    }

?>