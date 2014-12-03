        <div id="show">
            <button id="add">Add product <img src='images/plus.png' width='16px' style='vertical-align: middle'> </button><br>
            <br>
            <table cellspacing='0' cellpadding='5px'>
                <tr>
                    <th>Код товару</th>
                    <th>Назва товару</th>
                    <th>Категорія товару</th>
                    <th>К-ть товару</th>
                    <th>Ціна товару</th>
                    <th>Редагувати</th>
                    <th>Видалити</th>
                </tr>

            <?php $res = select_all_products();

            while ($arr = mysql_fetch_array($res)) {
                print('
                    <tr>
                        <td>'.$arr['sku'].'</td>
                        <td>'.$arr['name'].'</td>
                        <td>'.$arr['cat_name'].'</td>
                        <td>'.$arr['qty'].'</td>
                        <td>'.$arr['price'].' грн.</td>
                        <td>
                            <input type="image" class="edit" src="images/edit.png" value="'.$arr['product_id'].'">
                        </td>
                        <td>
                            <input type="image" class="delete" src="images/delete.png" value="'.$arr['product_id'].'">
                        </td>
                    </tr>
                ');
            } ?>
            </table>
        </div>
