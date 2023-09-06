<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation_Service</title>

    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__left">
                @auth
                <a href="/usermenu" class="header__button"></a>
                @else
                <a href="/guestmenu" class="header__button"></a>
                @endauth
                <a href="/" class="header__logo">Rese</a>
            </div>
        </div>
    </header>

    <main>
        <div class="login">
            <div class="login__inner">
                <div class="login__content">
                    <div class="login__icon"></div>
                    <div class="login__title">Login</div>
                    <form class="form" action="/login" method="post">
                        @csrf
                        <div class="form__group">
                            <div class="mail-icon"></div>
                            <input class="form__input" type="email" name="email" value="{{ old('email') }}" placeholder="Email">
                            <div class="form__error">
                                @error('email')
                                {{ $message}}
                                @enderror
                            </div>
                        </div>
                        <div class="form__group">
                            <div class="lock-icon"></div>
                            <input class="form__input" type="password" name="password" value="" placeholder="Password">
                            <div class="form__error">
                                @error('password')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form__button">
                            <button class="form__button-submit" type="submit">ログイン</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    </div>
</body>

</html>