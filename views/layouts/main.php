<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/style.css">
    <title>Document</title>
</head>
<body>



<div class="auth">
    <?if ($auth):?>
        Добро пожаловать <?=$username?> <a href="/user/logout/"> [Выход]</a>
    <?else:?>
        <form action="/user/login/" method="post">
            <input type="text" name="login" placeholder="Логин"><br>
            <input type="text" name="pass" placeholder="Пароль"><br>
            <input type="submit" name="submit" value="Войти">
        </form>
    <?endif;?><br>
</div>

<div class="menu">
    <?=$menu?>
</div>
<?=$content?>

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
    });

</script>

</body>
</html>