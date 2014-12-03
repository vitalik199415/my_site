        <div id="show">
            <button id="add">Додати категорію <img src='images/plus.png' width='16px' style='vertical-align: middle'> </button><br>
            <br>
            <table cellspacing='0' cellpadding='5px'>
                <tr>
                    <th>Назва категорії</th>
                    <th>Опис категорії</th>
                    <th>Логотип категорії</th>
                    <th>Редагувати</th>
                    <th>Видалити</th>
                </tr>

            <?php $res = select_all_categories();

            while ($arr = mysql_fetch_array($res)) {
                print('
                    <tr>
                        <td>'.$arr['name'].'</td>
                        <td>'.$arr['description'].'</td>
                        <td><img src="../images/category/'.$arr['image'].'"></td>
                        <td>
                            <input type="image" class="edit" src="images/edit.png" value="'.$arr['category_id'].'">
                        </td>
                        <td>
                            <input type="image" class="delete" src="images/delete.png" value="'.$arr['category_id'].'">
                        </td>
                    </tr>
                ');
            } ?>
            </table>
        </div>
