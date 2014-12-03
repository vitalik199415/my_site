<?php
@session_start();
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 11.09.14
 * Time: 11:45
 */
header("Content-Type:text/html;charset=utf-8");
    include "../config.php";
    require_once("email.validate.php");
    mysql_connect(HOST, USER, PASS);
    mysql_select_db(DB);

    if (isset($_POST['login'])&&isset($_POST['password'])) {
        login_user();
    }
    else{

        echo "<script>alert('asff');</script>";
        remind_password();
    }

    function login_user(){
    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM users_admin WHERE login='$login'";
    $result = mysql_query($query) or die("Даного користувача не існує");
    $array = mysql_fetch_array($result);

    if ($password==$array['password']) {
        $_SESSION['admin']['login'] = $login;
        $_SESSION['admin']['is_admin']=1;
        header("Location: index.php");
    }
    else {
        echo("Введений пароль не вірний");
        echo '<script>history.go(-1);</script>';
    }
    }

    function remind_password() {
                $login = $_POST['login'];
                $email = $_POST['email'];

                if (empty($login)){
                    echo "Введите логин!";
                }
                elseif (empty($email)){
                    echo "Введите e-mail!";
                }
                else{
                    $resultat = mysql_query("SELECT * FROM users_admin WHERE login = '$login' AND email = '$email'");
                    $array = mysql_fetch_array($resultat);
                    if (empty($array)){
                        echo 'Ошибка! Такого пользователя не существует';
                    }
                    elseif (mysql_num_rows($resultat) > 0){
                        $chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
                        $max=10;
                        $size=StrLen($chars)-1;
                        $password=null;

                        while($max--) {
                            $password.=$chars[rand(0,$size)];
                        }
                        $newmdPassword = md5($password);
                        $title = 'Востановления пароля пользователю '.$login.' для сайта Rybachok.esy.es!';
                        $letter = 'Вы запросили восстановление пароля для аккаунта '.$login.' на сайте Rybachok.esy.es \r\n Ваш новый пароль: '.$password.' \r\n С уважением администрация сайта Rybachok.esy.es';
                        // Отправляем письмо
                        if (mail($email, $title, $letter, "From: Rybachok.esy.es <noreply@rybachok.esy.es>"."Content-type:text/plain; Charset=utf-8\r\n")) {
                            mysql_query("UPDATE users_admin SET password = '$newmdPassword' WHERE login = '$login'  AND email = '$email'");
                            echo 'Новый пароль отправлен на ваш e-mail!'.$email.'<br><a href="index.php">Главная страница</a>';
                        }
                    }
                }
    }

?>