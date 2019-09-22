<?
/**
 * @var app\models\Product $product
 */
?>

<div class="containerForUnit">

    <div class="gallery-unit">
        <img src="<?= IMAGES_DIR_BIG . $product->name?>" alt=""><br>
        <p>Название товара <?=$product->name?>  </p>
        <p>Описание: <?=$product->description?> </p>
        <p>Цена товара: <?=$product->price?> руб </p>
        <p>Товар был просмотрен <?=$product->seen?> раз </p>
        <button class="buy" data-id="<?=$product->id?>">Купить</button>
        <p><a href='/?c=product&a=catalog'>Назад</a></p>
    </div>

</div>
