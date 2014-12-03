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

    <meta content="text/html" charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="style/style.css" />
    <script type="text/javascript" src="script/jquery-2.1.1.js"></script>
    <script type="text/javascript" src="script/script.js"></script>
    <meta name="keywords" content="">

</head>
<body>

    <div id="header">
        <ul id="menu">
            <li class="active"><a href="?view=main"><img src="images/orders.png">  Замовлення</a></li>
            <li><a href="?view=categories"><img src="images/category.png">  Категорії</a></li>
            <li><a href="?view=products"><img src="images/products.png">  Товари</a></li>
            <li><a href="?view=review"><img src="images/comment.png">  Відгуки</a></li>
            <li><a href="?view=users"><img src="images/user.png">  Користувачі</a></li>
            <li class="logout"><a href="?action=logout">Вихід  <img src="images/exit.png"></a></li>
        </ul>
    </div>
    <div id="content">