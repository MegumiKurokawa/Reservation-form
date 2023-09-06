<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation_Service</title>

    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
</head>

<body>
    <main>
        <div class="mypage">
            <div class="mypage__inner">
                <div class="mypage__grid-parent">
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
                    <div class="mypage-name">
                        <div class="mypage-name__inner">
                            @if (Auth::check())
                            <h2 class="mypage-name__title">
                                {{ Auth::user()->name }}さん
                            </h2>
                            @endif
                        </div>
                    </div>
                    <div class="mypage-reservation">
                        <div class="reservation-information">
                            <div class="information__header">
                                <h3 class="information__header-title">予約状況</h3>
                            </div>
                            <div class="reservation-information__inner">
                                @foreach ($reservations as $reservation)
                                <div class="reservation-flex__item">
                                    <div class="reservation__card">
                                        <form action="/reservation/delete" class="delete__form" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <div class="cancel-button">
                                                <input type="hidden" name="id" value="{{ $reservation->id }}">
                                                <button class="cancel-button__submit">✕</button>
                                            </div>
                                        </form>
                                        <form action="/reservation/update" class="update__form" method="post">
                                            @method('PATCH')
                                            @csrf
                                            <div class="table__title">
                                                <div class="clock__icon"></div>
                                                <div class="table__information-title">予約{{ $loop->iteration }}</div>
                                            </div>
                                            <table class="information__table">
                                                <tr>
                                                    <th>Shop</th>
                                                    <td class="restaurant-name__td">{{ $reservation->restaurant->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Date</th>
                                                    <td><input type="date" name="date" value="{{ $reservation->reservation_date }}"><input type="hidden" name="id" value="{{ $reservation['id'] }}"></td>
                                                </tr>
                                                <tr>
                                                    <th>Time</th>
                                                    <td><input type="time" name="time" value="{{ $reservation->reservation_time }}"></td>
                                                </tr>
                                                <tr>
                                                    <th>Number</th>
                                                    <td><input type="text" name="people" value="{{ $reservation->people }}"></td>
                                                </tr>
                                            </table>
                                            <div class="update-form__button">
                                                <button class="update-form__button-submit" type="submit">更新</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="mypage-favorite">
                        <div class="mypage-favorite__inner">
                            <h3 class="favorite__header">お気に入り店舗</h3>
                            <div class="flex__item">
                                @foreach ($favorites as $favorite)
                                <div class="restaurant__card">
                                    <div class="restaurant__img">
                                        <img src="{{ $favorite->restaurant->image }}" alt="">
                                    </div>
                                    <div class="restaurant__content">
                                        <div class="restaurant__name">{{ $favorite->restaurant->name }}</div>
                                        <div class="restaurant__tag">
                                            <div class="area__tag">#{{ $favorite->restaurant->area }}</div>
                                            <div class="genre__tag">#{{ $favorite->restaurant->genre }}</div>
                                        </div>
                                        <div class="content__button">
                                            <a href="{{ route('restaurant.show', ['restaurant_id' => $favorite->restaurant_id]) }}" class="index__detail-button">詳しくみる</a>
                                            @if ($favorite)
                                            <form action="{{ route('favorite.destroy') }}" class="favorite-form" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="restaurant_id" value="{{ $favorite->restaurant_id }}">
                                                <button class="heart-button favorited" type="submit">❤</button>
                                            </form>
                                            @else
                                            <form action="{{ route('favorite.store') }}" class="favorite-form" method="post">
                                                @csrf
                                                <input type="hidden" name="restaurant_id" value="{{ $favorite->restaurant_id }}">
                                                <button class="heart-button" type="submit">❤</button>
                                            </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>