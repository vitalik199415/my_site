<?php
/**
 * Created by PhpStorm.
 * User: Віталій
 * Date: 21.10.2014
 * Time: 13:52
 */
require_once("ACoreAdmin.php");

class admin_add extends ACore_Admin {
    protected function get_content()
    {
        echo "<div id='wrapper'>";

        print('
                <h1>Додавання адміністраторів сайту</h1>
                <div id="edit">
                    <form method="post" id="forms" action="" enctype="multipart/form-data">
                        <div>
                            <label for="title">Логін<span class="required"> *</span></label><br>
                            <input id="title" type="text" name="login" size="55" placeholder="Login" maxlength="255" required="true" pattern="^[A-Za-z\D0-9]+{6,100}">
                            <span class="comment">Використовуйте латинські літери, кирилицю, цифри та символи(<strong>мінімум</strong> 6 символів)</span><br>
                        </div>
                        <div>
                            <label for="title">Пароль<span class="required"> *</span></label><br>
                            <input id="title" type="text" name="pass" size="55" placeholder="Password" maxlength="255" required="true" pattern="^[A-Za-z0-9\D]+{6,255}">
                            <span class="comment">Використовуйте латинські літери, кирилицю, цифри та символи(<strong>мінімум</strong> 6 символів)</span><br>
                        </div>
                        <div>
                            <label for="title">Email<span class="required"> *</span></label><br>
                            <input id="title" type="text" name="email" size="55" placeholder="Email" maxlength="255" required="true" pattern="^[A-Za-z0-9\D]+@[a-z]{3,8}.[a-z]{2,3}">
                            <span class="comment">Використовуйте латинські літери, кирилицю, цифри та символи(<strong>максимум</strong> 255 символів)</span><br>
                        </div>
                            <input type="image" src="images/save_btn.png" class="add">
                            <a href="?view=admins" class="add"> Add user <img src="images/plus.png" width="16px" style="vertical-align: middle"> </a>
                    </form>

                </div>
            ');

        echo "</div>";
    }

    protected function obr()
    {

    }

}

?> 