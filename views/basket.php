<div class="container_basket">

    <div class="basket_main">
        <p class="basket_header">Корзина товаров:</p><br>
        <?foreach ($basket as $item):?>
            <div class="basket_items" id="<?=$item['basket_id']?>">
                <img src="<?= IMAGES_DIR_SMALL . $item['name']?>" alt=""><br>
                <p class="basket_price">Цена: <?=$item['price']?> <br></p>
                <p class="basket_price">Кол-во: <?=$item['qty']?> <br></p>
                <button class="delete" data-id="<?=$item['basket_id']?>">Удалить</button>
            </div>
        <?endforeach;?>
    </div>

</div>
<script>

    let deleteButtons = document.querySelectorAll('.delete');

    deleteButtons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (async () => {
                const response = await fetch('/Api/DeleteBasket/', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        id: id
                    }),
                });
                const answer = await response.json();
                document.getElementById('count').innerText = answer.count;
                document.getElementById(id).remove();
            })();
        })
    })
</script>