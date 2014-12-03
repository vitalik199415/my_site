

    <div id="edit">
        <input id="close" type="image" src="images/close.png" title="Закрити">
        <form method="post" id="product" action="models/products_model.php">
            <div>
                <label for="title">Назва товару<span class="required"> *</span></label><br>
                <input id="title" type="text" name="title" size="55" placeholder="Назва товару" maxlength="255" required="true" pattern="^[A-Za-zА-Яа-яіІїЇьЬ\D]+[0-9]*{255}">
                <span class="comment">Використовуйте латинські літери, кирилицю, цифри та символи(<strong>максимум</strong> 255 символів)</span><br>
            </div>
            <div>
                <label for="code">Назва товару<span class="required"> *</span></label><br>
                <input id="code" type="text" name="sku" size="55" placeholder="Код товару" required="true" pattern="^[0-9]{7}">
                <span class="comment">Дозволено ввід цифр довжиною 7 символів</span><br>
            </div>
            <div>
                <label for="price">Ціна товару<span class="required"> *</span></label><br>
                <input id="price" type="text" name="price" size="55" placeholder="Ціна товару" required="true" pattern="^[0-9]{1,}\,[0-9]{2}">
                <span class="comment">Дозволено ввід цифр в форматі "000.00"</span><br>
            </div>
            <div>
                <label for="qty">Кількість товару<span class="required"> *</span></label><br>
                <input id="qty" type="text" name="qty" size="55" placeholder="Кількість товару" required="true" pattern="^[0-9]{1,}">
                <span class="comment">Дозволено ввід цифр(<strong>мінімум</strong> 1 символ)</span><br>
            </div>
            <div>
                <label for="category">Категорія товару<span class="required"> *</span></label><br>
                <select id="category" form="product" size="1" required="true" name="category">
                    <? $arr = get_category();
                    while($cat = mysql_fetch_array($arr)){
                        echo "<option value='".$cat['category_id']."'>".$cat['name']."</option>";
                    }
                    ?>
                    </select>
                <span class="comment">Виберіть категорію зі списку</span><br>
            </div>
            <div>
                <label for="image">Зображення товару<span class="required"> *</span></label><br>
                <input id="image" type="file" name="images[]" size="55" placeholder="Кількість товару" required="true">
                <span class="comment">Дозволено завантаження зображень розміром не більше 5 Мб</span><br>
            </div>
            <input type="hidden" value="add" name="action">
            <div>
                <label for="cke_textarea">Опис товару<span class="required"> *</span></label><br>
                <textarea id="textarea" name="description" required="true"></textarea>
                <br>
            </div>
            <div>
                <textarea name="meta_title" placeholder="Meta-title" cols="29"></textarea>
                <textarea name="meta_description" placeholder="Meta-description" cols="29"></textarea>
                <textarea name="meta_keywords" placeholder="Meta-keywords" cols="29"></textarea>
            </div>
                <input id="save" type="image" src="images/save_btn.png">
        </form>

    </div>