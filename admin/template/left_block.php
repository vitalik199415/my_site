<div id="left">

    <h2>Категорії товарів</h2>

    <?
        $query = "SELECT * FROM categories";
        $result = mysql_query($query);
        echo "<ul>";
        while ($arr = mysql_fetch_array($result)) {
            echo "<li>".$arr["name"]."</li>";
        }
        echo "</ul>";

    ?>

</div>