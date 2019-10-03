<div class="container">
<?foreach ($catalog as $item):?>

        <div class="gallery">
            <a href="/product/card/?id=<?=$item['id']?>">
                <p><?=$item['name']?></p>
                <img src="<?= IMAGES_DIR_SMALL . $item['name']?>" alt=""><br>
                <p>Просмотрено <?=$item['seen']?> раз</p>
                <p>Цена <?=$item['price']?> руб</p>
            </a>
            <button data-id="<?= $item['id'] ?>" class="buy">Купить</button>
        </div>

<?endforeach;?>
    <a href="/product/catalog/page=<?=$page?>"><div class="pagination">Показать ещё</div></a>
</div>

