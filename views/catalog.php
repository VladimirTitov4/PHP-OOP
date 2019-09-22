<div class="container">
<?foreach ($catalog as $item):?>
    <a href="/?c=product&a=card&id=<?=$item['id']?>">
        <div class="gallery">
                <p><?=$item['name']?></p>
                <img src="<?= IMAGES_DIR_SMALL . $item['name']?>" alt=""><br>
                <p>Просмотрено <?=$item['seen']?> раз</p>
                <p>Цена <?=$item['price']?> руб</p>
            <button class="buy" data-id="<?=$item['id']?>">Купить</button>
        </div>
    </a>
<?endforeach;?>
</div>
