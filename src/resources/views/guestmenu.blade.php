<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation_Service</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/guestmenu.css') }}">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__left">
                <a class="header__button" href="/">✕</a>
            </div>
        </div>
    </header>

    <main>
        <div class="guestmenu">
            <div class="guestmenu__inner">
                <div class="form__button">
                    <a href="/" class="menu__home-button">Home</a>
                    <a href="/register" class="menu__registration-button">Registration</a>
                    <a href="/login" class="menu__login-button">Login</a>
                </div>
            </div>
        </div>
    </main>
</body>

</html>