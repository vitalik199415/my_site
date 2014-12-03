<div id="left">

    <!--<h2>Категорії товарів</h2>-->
    <img src="../images/category_logo.png">
    <?
        $query = "SELECT * FROM categories";
        $result = mysql_query($query);
        echo "<ul id='left_menu'>";
        while ($arr = mysql_fetch_array($result)) {
            echo "<li align='center'><a href=''><img src='../images/category/".$arr['image']."'/>".$arr["name"]."</a></li>";
        }
        echo "</ul>";

    ?>

</div>