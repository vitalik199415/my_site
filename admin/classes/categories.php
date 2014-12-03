<?php
require_once("ACoreAdmin.php");
/**
 * Created by PhpStorm.
 * User: Віталій
 * Date: 02.10.2014
 * Time: 22:58
 */

    class categories extends ACore_Admin {

    	protected function obr(){}

        protected function get_content(){
        	echo "<div id='wrapper'>";
            if ($_SESSION['res']) {
                echo $_SESSION['res'];
                unset($_SESSION['res']);
            }
            print('
            <div id="show">
                <h1>Категорії товарів</h1>
                <table cellspacing="0">
                    <tr>
                        <th>Назва категорії</th>
                        <th>Опис категорії</th>
                        <th>Логотип категорії</th>
                        <th>Редагувати</th>
                        <th>Видалити</th>
                    </tr>
                    ');

                $query = "SELECT c.*, IFNULL(c.image, 'no_image.png') image FROM categories c";
                $res = mysql_query($query) or die(mysql_error());

                if (mysql_num_rows($res)>0) {
                    while ($arr = mysql_fetch_array($res)) {?>

                            <tr>
                                <td><? echo $arr['name']?></td>
                                <td class="memo"><? echo $arr['description']?></td>
                                <td><img src="../images/category/<? echo $arr['image']?>"></td>
                                <td>
                                    <a href="?view=category_edit&id=<? echo $arr['category_id'] ?>" class="edit"><img src="images/edit.png"></a>
                                </td>
                                <td>
                                    <a href="?view=category_delete&del=<? echo $arr['category_id'] ?>" class="delete"><img src="images/delete.png"></a>
                                </td>
                            </tr>
                    <?php
                    }
                }
                else { echo "<tr><td colspan='6'>В таблиці немає записів</td></tr>"; }
        echo "</table>
              <a href='?view=category_add' class='add'> Add category <img src='images/plus.png' width='16px' style='vertical-align: middle'> </a><br>
              <br>
              </div></div>";
        }



    }
?> 