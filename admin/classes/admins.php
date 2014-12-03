<?php
/**
 * Created by PhpStorm.
 * User: Віталій
 * Date: 21.10.2014
 * Time: 14:12
 */

require_once("ACoreAdmin.php");

class admins extends ACore_Admin {
    protected function get_content()
    {
        echo '<div id="wrapper">';

        $query = "SELECT * FROM users_admin";
        $result = mysql_query($query) or die(mysql_error());

        print("
            <div id='show'>
                <h1>Адміністратори магазину</h1>
                <table cellspacing='0' cellpadding='5px'>
                    <tr>
                        <th>Логін</th>
                        <th>Пароль</th>
                        <th>Email</th>
                        <th>Видалити</th>
                    </tr> ");

        if (mysql_num_rows($result)>0) {
            while ($arr = mysql_fetch_array($result)) {
                print('
                    <tr>

                        <td>'.$arr['login'].'</td>
                        <td>'.$arr['password'].'</td>
                        <td>'.$arr['email'].'</td>
                        <td>
                            <a href="?view=admin_delete&del='.$arr['customers_id'].'" class="delete"><img src="images/delete.png"></a>
                        </td>
                    </tr>
                ');
            }
        }
        else {
            echo "<tr><td colspan='6'>В таблиці немає записів</td></tr>";
        }
        echo   "</table>
                <a href='?view=admin_add' class='add'> Add user <img src='images/plus.png' width='16px' style='vertical-align: middle'> </a><br><br>
                </div>";

        echo '</div>';
    }

    protected function obr()
    {

    }

}

?> 