<?php
if (($_GET['action']=='logout')&&(isset($_GET['action']))){
    $_GET['action'] = null;
    session_unset();
    session_destroy();
    echo "<script>history.go(-1);</script>";
}
?>
<html>
<head>
    <title></title>
    <meta content="text/html" charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/style.css" />
    <script type="text/javascript" src="script/jquery-2.1.1.js"></script>
    <script type="text/javascript" src="script/script.js"></script>
    <script type="text/javascript" src="script/ajax_script.js"></script>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
        window.onload = function()
        {
            CKEDITOR.replace( 'textarea' );
        };
    </script>
    <!--[if lt IE 9]>-->
    <script>
        document.createElement('figure');
        document.createElement('figcaption');
    </script>
    <!--[endif]-->
</head>
<body>
    <div id="header">
        <ul id="menu">
            <li><a href="?view=orders" class="menu"><img src="images/orders.png">  Замовлення</a></li>
            <li><a href="?view=categories" class="menu"><img src="images/category.png">  Категорії</a></li>
            <li><a href="?view=products" class="menu"><img src="images/products.png">  Товари</a></li>
            <li><a href="?view=review" class="menu"><img src="images/comment.png">  Відгуки</a></li>
            <li><a href="?view=users" class="menu"><img src="images/user.png">  Користувачі</a></li>
            <li><a href="?view=admins" class="menu"><img src="images/admin.png">  Адміністратори</a></li>
            <li class="logout" title="Натисніть, щоб вийти.">
                <a href="?action=logout" class="menu">Привіт, <? echo $_SESSION['admin']['login']; ?> <img src="images/hello.png"></a>
<!--                <a href="?action=logout">Вихід  <img src="images/exit.png"></a>-->
            </li>
        </ul>
    </div>

