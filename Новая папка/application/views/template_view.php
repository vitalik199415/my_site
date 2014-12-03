<!DOCTYPE html>
<html lang="en">
    <? include 'application/views/head.php'; ?>
<body>

<div class="container">
    <?php
        include 'application/views/navigation.php';
        include 'application/views/message_view.php';
        include 'application/views/'.$content_view.'.php';
    ?>
</div>
</body>
</html>