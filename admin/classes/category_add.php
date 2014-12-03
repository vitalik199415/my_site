<?php
/**
 * Created by PhpStorm.
 * User: Віталій
 * Date: 17.10.2014
 * Time: 10:11
 */

require_once("ACoreAdmin.php");

class category_add extends ACore_Admin {
    protected function obr(){

        $file_size = 5 * 1024 * 1024;

        if (!empty($_FILES['img_src']['tmp_name'])) {
            if ($_FILES['img_src']['size'] < $file_size){
                if (!move_uploaded_file($_FILES['img_src']['tmp_name'], "../images/category/" . $_FILES['img_src']['name'])) {
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

        $name = trim(htmlspecialchars($_POST['title']));
        $description = trim($_POST['description']);
        $meta_title = trim(htmlspecialchars($_POST['meta_title']));
        $meta_description = trim(htmlspecialchars($_POST['meta_description']));
        $meta_keywords = trim(htmlspecialchars($_POST['meta_keywords']));

        $query = "INSERT INTO categories
                    (name, description, image, meta_title, meta_description, meta_keywords)
                     VALUES ('$name','$description','$img_src','$meta_title','$meta_description','$meta_keywords')";
        if (!mysql_query($query)) {
            exit(mysql_error());
        }
        else {
            unset($_SESSION['res']);
            $_SESSION['res'] = "Категорію успішно додано!";
            header("Location:?view=categories");
            exit;
        }
    }

    protected function get_content(){
        echo "<div id='wrapper'>";

        print('
                <h1>Додавання категорії товарів</h1>
                <div id="edit">
                    <form method="post" id="forms" action="" enctype="multipart/form-data">
                        <div>
                            <label for="title">Назва категорії<span class="required"> *</span></label><br>
                            <input id="title" type="text" name="title" size="55" placeholder="Назва категорії" maxlength="255" required="true" pattern="^[A-Za-zА-Яа-яіІїЇьЬ\D]+[0-9]*{255}">
                            <span class="comment">Використовуйте латинські літери, кирилицю, цифри та символи(<strong>максимум</strong> 255 символів)</span><br>
                        </div>
                        <div>
                            <label for="image">Логотип категорії<span class="required"> *</span></label><br>
                            <input id="image" type="file" name="img_src" required="true" accept="image/jpeg,image/png,image/gif">
                            <span class="comment">Дозволено завантаження зображень розміром не більше 5 Мб</span><br>
                        </div>
                        <div>
                            <label for="cke_textarea">Опис категорії<span class="required"> *</span></label><br>
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