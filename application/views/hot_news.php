<div style="float:left; width:165px;">
    <strong>Hot News Puskomkreatif : </strong>
</div>

<div id="hot-news">
    <ul id="js-news" class="js-hidden">
        <?php foreach($all_hot as $db): ?>
            <li><?php echo $db['hot_news']; ?></li>
        <?php endforeach; ?>
    </ul>
</div>