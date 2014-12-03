<?php
/**
 * Created by PhpStorm.
 * User: Віталій
 * Date: 16.10.2014
 * Time: 17:57
 */
require_once("ACoreAdmin.php");

class users extends ACore_Admin {

    protected function obr(){


    }

    protected function get_content(){
        echo '<div id="wrapper">';

        $query = "SELECT * FROM customers";
        $result = mysql_query($query) or die(mysql_error());

        print("
            <div id='show'>
                <h1>Зареєстровані користувачі</h1>
                <table cellspacing='0' cellpadding='5px'>
                    <tr>
                        <th>Прізвище</th>
                        <th>Ім'я</th>
                        <th>Email</th>
                        <th>Телефон</th>
                        <th>Адреса</th>
                        <th>Видалити</th>
                    </tr> ");

        if (mysql_num_rows($result)>0) {
            while ($arr = mysql_fetch_array($result)) {
                print('
                    <tr>
                        <td>'.$arr['name'].'</td>
                        <td>'.$arr['secondname'].'</td>
                        <td>'.$arr['email'].'</td>
                        <td>'.$arr['telephone'].'</td>
                        <td class="memo">'.$arr['address'].'</td>
                        <td>
                            <a href="?view=user_delete&del='.$arr['customers_id'].'" class="delete"><img src="images/delete.png"></a>
                        </td>
                    </tr>
                ');
            }
        }
        else {
            echo "<tr><td colspan='6'>В таблиці немає записів</td></tr>";
        }
        echo   "</table>
                <a href='?view=user_add' class='add'> Add user <img src='images/plus.png' width='16px' style='vertical-align: middle'> </a><br><br>
                </div>";

        echo '</div>';
    }

}

?>