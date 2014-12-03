<?php
/**
 * Created by PhpStorm.
 * User: Віталій
 * Date: 17.10.2014
 * Time: 12:10
 */

require_once("ACoreAdmin.php");

class category_edit extends ACore_Admin {
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

        $id = trim(htmlspecialchars($_POST['id']));
        $name = trim(htmlspecialchars($_POST['title']));
        $description = trim($_POST['description']);
        $meta_title = trim(htmlspecialchars($_POST['meta_title']));
        $meta_description = trim(htmlspecialchars($_POST['meta_description']));
        $meta_keywords = trim(htmlspecialchars($_POST['meta_keywords']));

        $query = "UPDATE categories
                  SET name='$name',description='$description',image='$img_src',meta_title='$meta_title',meta_description='$meta_description',meta_keywords='$meta_keywords'
                  WHERE category_id='$id'";
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

        $cat = $this->get_categories($_GET['id']);

        print('
                <h1>Додавання категорії товарів</h1>
                <div id="edit">
                    <form method="post" id="forms" action="" enctype="multipart/form-data">
                        <div>
                            <label for="title">Назва категорії<span class="required"> *</span></label><br>
                            <input id="title" type="text" name="title" value="'.$cat['name'].'" size="55" placeholder="Назва категорії" maxlength="255" required="true" pattern="^[A-Za-zА-Яа-яіІїЇьЬ\D]+[0-9]*{255}">
                            <span class="comment">Використовуйте латинські літери, кирилицю, цифри та символи(<strong>максимум</strong> 255 символів)</span><br>
                        </div>
                        <input type="hidden" name="id" value="'.$cat['category_id'].'">
                        <div>
                            <label for="image">Логотип категорії<span class="required"> *</span></label><br>
                            <input id="image" type="file" name="img_src" accept="image/jpeg,image/png,image/gif">
                            <span class="comment">Дозволено завантаження зображень розміром не більше 5 Мб</span><br>
                        </div>
                        <div>
                            <label for="cke_textarea">Опис категорії<span class="required"> *</span></label><br>
                            <textarea id="textarea" name="description" required="true">'.$cat['description'].'</textarea>
                            <br>
                        </div>
                        <div>
                            <textarea name="meta_title" placeholder="Meta-title" cols="29">'.$cat['meta_title'].'</textarea>
                            <textarea name="meta_description" placeholder="Meta-description" cols="29">'.$cat['meta_description'].'</textarea>
                            <textarea name="meta_keywords" placeholder="Meta-keywords" cols="29">'.$cat['meta_keywords'].'</textarea>
                        </div>
                            <input type="image" src="images/save_btn.png">
                    </form>

                </div>
            ');

        echo "</div>";
    }
}

?>