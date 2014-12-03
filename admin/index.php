<?php
session_start();
//Admin chapter
header("Content-Type:text/html;charset=utf-8");

require_once("../config.php");
//require_once("classes/AdminACore.php");

if (isset($_SESSION['admin']['is_admin']) && ($_SESSION['admin']['is_admin']==1)) {
    if (isset($_GET['view'])) {
        $class = trim(strip_tags($_GET['view']));
    }
    else {
        $class = 'orders';
    }

    if (file_exists("classes/".$class.".php")) {
        ///
        include("classes/".$class.".php");
        if (class_exists($class)) {
            ///
            $obj = new $class;
            $obj->get_body();
        }
        else {

            exit("<p>Не правильные данные для входа</p>");
        }
    }
    else {
        header("Location: 404_error.php");
    }
}
else {
    require_once("login.php");
}

?>