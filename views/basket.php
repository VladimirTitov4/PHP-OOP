<div class="container_basket">

    <div class="basket_main">
        <p class="basket_header">Корзина товаров:</p><br>
        <?foreach ($basket as $item):?>
            <div class="basket_items" id="item_<?=$item['basket_id']?>">
                <img src="<?= IMAGES_DIR_SMALL . $item['name']?>" alt=""><br>
                <p class="basket_price">Цена: <?=$item['price']?> <br></p>
                <p class="basket_price">Кол-во: <?=$item['qty']?> <br></p>
                <button class="delete" data-id="<?=$item['goods_id']?>">Удалить</button>
            </div>
        <?endforeach;?>
    </div>

</div>
