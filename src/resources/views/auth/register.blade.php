<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation_Service</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
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
        <div class="register">
            <div class="register__inner">
                <div class="register__content">
                    <div class="register__title">registration</div>
                    <form class="form" action="/register" method="post">
                        @csrf
                        <div class="form__group">
                            <input class="form__input" type="name" name="name" value="{{ old('name') }}" placeholder="Username">
                            <div class="form__error">
                                @error('name')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form__group">
                            <input class="form__input" type="email" name="email" value="{{ old('emal') }}" placeholder="Email">
                            <div class="form__error">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form__group">
                            <input class="form__input" type="password" name="password" value="" placeholder="Password">
                            <div class="form__error">
                                @error('password')
                                {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form__button">
                            <button class="form__button-submit" type="submit">登録</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>