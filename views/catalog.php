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
    <a href="/?c=product&a=catalog&page=<?=$page?>"><div class="pagination">Показать ещё</div></a>
</div>

<script>
    let buttons = document.querySelectorAll('.buy');

    buttons.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (async () => {
                const response = await fetch('/Api/AddBasket/', {
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
            })();
        })
    })


</script>
