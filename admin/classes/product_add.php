<?php
require_once("ACoreAdmin.php");
/**
 * Created by PhpStorm.
 * User: Віталій
 * Date: 03.10.2014
 * Time: 0:04
 */

class product_add extends ACore_Admin {

    protected function obr(){
        $file_size = 5 * 1024 * 1024;

        if (!empty($_FILES['img_src']['tmp_name'])) {
            if ($_FILES['img_src']['size'] < $file_size){
                if (!move_uploaded_file($_FILES['img_src']['tmp_name'], "../images/products/" . $_FILES['img_src']['name'])) {
                    exit('Помилка завантаження зображення на сервер');
                }
                $img_src = $_FILES['img_src']['name'];
            }
            else {
                exit('Дозволено завантаження зображень розміром не більше 5 Мб');
            }
        }
        else {
            exit('Необхідно вибрати зображення товару');
        }

        $sku = trim(htmlspecialchars($_POST['sku']));
        $name = trim(htmlspecialchars($_POST['title']));
        $description = trim($_POST['description']);
        $price = trim(htmlspecialchars($_POST['price']));
        $category = trim(htmlspecialchars($_POST['category']));
        $qty = trim(htmlspecialchars($_POST['qty']));
        $meta_title = trim(htmlspecialchars($_POST['meta_title']));
        $meta_description = trim(htmlspecialchars($_POST['meta_description']));
        $meta_keywords = trim(htmlspecialchars($_POST['meta_keywords']));

        $query = "INSERT INTO products
                    (product_id, sku, name, description, price, category, qty, meta_title, meta_description, meta_keywords)
                     VALUES ('','$sku','$name','$description','$price','$category','$qty','$meta_title','$meta_description','$meta_keywords')";
        if (!mysql_query($query)) {
            exit(mysql_error());
        }
        else {
            $prod_id = (int)mysql_insert_id();
            $query = "INSERT INTO products_picture
                      (product_id, file_name, is_general)
                      VALUES ('$prod_id','$img_src','1')";
            if (!mysql_query($query)){
                exit(mysql_error());
            }
            unset($_SESSION['res']);
            $_SESSION['res'] = "Товар успішно додано!";
            header("Location:?view=products");
            exit;
        }
    }

    protected function get_content(){
        echo "<div id='wrapper'>";

            $result = $this->get_category();
            print('
                <h1>Додавання нового товару</h1>
                <div id="edit">
                    <form method="post" id="forms" action="" enctype="multipart/form-data">
                        <div>
                            <label for="title">Назва товару<span class="required"> *</span></label><br>
                            <input id="title" type="text" name="title" size="55" placeholder="Назва товару" maxlength="255" required="true" pattern="^[A-Za-zА-Яа-яіІїЇьЬ\D]+[0-9]*{255}">
                            <span class="comment">Використовуйте латинські літери, кирилицю, цифри та символи(<strong>максимум</strong> 255 символів)</span><br>
                        </div>
                        <div>
                            <label for="code">Назва товару<span class="required"> *</span></label><br>
                            <input id="code" type="text" name="sku" size="55" placeholder="Код товару" required="true" pattern="^[0-9]{7}">
                            <span class="comment">Дозволено ввід цифр довжиною 7 символів</span><br>
                        </div>
                        <div>
                            <label for="price">Ціна товару<span class="required"> *</span></label><br>
                            <input id="price" type="text" name="price" size="55" placeholder="Ціна товару" required="true" pattern="^[0-9]{1,}\.[0-9]{2}">
                            <span class="comment">Дозволено ввід цифр в форматі "000.00"</span><br>
                        </div>
                        <div>
                            <label for="qty">Кількість товару<span class="required"> *</span></label><br>
                            <input id="qty" type="text" name="qty" size="55" placeholder="Кількість товару" required="true" pattern="^[0-9]{1,}">
                            <span class="comment">Дозволено ввід цифр(<strong>мінімум</strong> 1 символ)</span><br>
                        </div>
                        <div>
                            <label for="category">Категорія товару<span class="required"> *</span></label><br>
                            <select id="category" form="forms" size="1" required="true" name="category">');
                                while($cat = mysql_fetch_array($result)){
                                    echo "<option value='".$cat['category_id']."'>".$cat['name']."</option>";
                                }

                        print('</select>
                            <span class="comment">Виберіть категорію зі списку</span><br>
                        </div>
                        <div>
                            <label for="image">Зображення товару<span class="required"> *</span></label><br>
                            <input id="image" type="file" name="img_src" required="true" accept="image/jpeg,image/png,image/gif">
                            <span class="comment">Дозволено завантаження зображень розміром не більше 5 Мб</span><br>
                        </div>
                        <input type="hidden" value="add" name="action">
                        <div>
                            <label for="cke_textarea">Опис товару<span class="required"> *</span></label><br>
                            <textarea id="textarea" name="description" required="true"></textarea>
                            <br>
                        </div>
                        <div>
                            <textarea name="meta_title" placeholder="Meta-title" cols="29"></textarea>
                            <textarea name="meta_description" placeholder="Meta-description" cols="29"></textarea>
                            <textarea name="meta_keywords" placeholder="Meta-keywords" cols="29"></textarea>
                        </div>
                            <input type="image" src="images/save_btn.png">
                    </form>

                </div>
            ');

        echo "</div>";
    }

}
?>