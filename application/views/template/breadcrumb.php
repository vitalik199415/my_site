<div class="col-md-10 col-md-offset-1" id="breadcrumb">
    <ol class="breadcrumb">
        <li><a href="#">Головна</a></li>
        <?php foreach($breadcrumb as $tmp):?>
            <?php if(isset($tmp['link'])): ?>
                <li><a href="<?=$tmp['link']?>"><?=$tmp['text']?></a></li>
            <?php else: ?>
                <li><?=$tmp['text']?></li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ol>
</div>