<html>
<head>
    <title>Вхід в адмінпанель</title>
    <meta content="text/html" charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style/login.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="script/jquery-2.1.1.js"></script>
    <script type="text/javascript" src="script/script.js"></script>
</head>

<body class="login">
    <div class="opacity">
        <div id="login">
            <div id="center">
                <img src="images/system_login.png" alt="Login" title="Вхід" />
<!--                <h2>Здійсніть вхід</h2>-->
            </div>
            <form method="post" action="login_script.php" id="login_form">
                <hr />
                <input type="text" name="login" id="login_input" placeholder="Login:" required="true" size="43"/><br />
                <input type="password" name="password" id="pass_input" placeholder="Password:" required="true" size="43" spellcheck="*" /><br />
                <input type="image" src="images/login.png" value="Увійти">
                <hr />
            </form>
            <div id="send_pass"><h3>Забули Ваш пароль?</h3>
            <a href="" id="remind_link" onclick="show_remind(); return false;">Натисніть</a>, щоб відновити.</div>
        </div>
        <div id="remind">
            <div id="center">
                <img src="images/mail.png" alt="Mail" title="Remind mail" />
            </div>
            <form action="login_script.php?action=remind" method="post" id="send_mail" style="padding: 5px 10px;">
                <hr />
                <input type="text" name="login" id="login_input" placeholder="Login:" required="true" size="43"/><br />
                <input type="text" name="email" placeholder="Email:" required="true" size="43" style="margin-bottom: 15px;" />
                <a href=""><img src="images/login.png" alt="Login" onclick="show_login(); return false;"></a>
                <input type="image" src="images/remind.png" value="Надіслати">
                <hr />
            </form>


        </div>
    </div>
</body>
</html>