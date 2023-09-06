<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation_Service</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/usermenu.css') }}">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__left">
                <a href="/" class="header__button">✕</a>
            </div>
        </div>
    </header>

    <main>
        <div class="usermenu">
            <div class="usermenu__inner">
                <div class="form__button">
                    <a href="/" class="menu__home-button">Home</a>
                    <form action="/logout" method="post">
                        @csrf
                        <button class="menu__logout-button" type="submit">Logout</button>
                    </form>
                    <a href="/mypage" class="menu__mypage-button">Mypage</a>
                </div>
            </div>
        </div>
    </main>
</body>

</html>