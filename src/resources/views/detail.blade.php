<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation_Service</title>

    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
</head>

<body>
    <main>
        <div class="detail">
            <div class="detail__inner">
                <div class="detail__grid-parent">
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
                    <div class="restaurant-detail__content">
                        <div class="detail__content-inner">
                            <div class="detail__content-title">
                                <a class="back__button" href="/">＜</a>
                                <div class="detail__title">{{ $restaurant->name }}</div>
                            </div>
                            <div class="detail__content-img">
                                <img src="{{ $restaurant->image }}" alt="">
                            </div>
                            <div class="detail__content-tag">
                                <div class="detail__area">#{{ $restaurant->area }}</div>
                                <div class="detail__category">#{{ $restaurant->genre }}</div>
                            </div>
                            <div class="detail__content-introduction">
                                <p class="restaurant__introduction">{{ $restaurant->introduction }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="restaurant-reservation__content">
                        <div class="reservation__content-inner">
                            <div class="reservation__content-title">
                                <h2 class="reservation">予約</h2>
                            </div>
                            <form class="reservation__form" action="/reservation" method="post">
                                @csrf
                                <div class="form__inner">
                                    <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
                                    <input class="reservation-date" name="reservation_date" type="date" value="{{ old('reservation_date', Session::get('reservation.reservation_date')) }}">
                                    <select class="reservation-time__select" name="reservation_time">
                                        @foreach (config('pulldown.reservation_time') as $key => $val)
                                        <option value="{{ $key }}" {{ $key == '12:00' ? 'selected' : '' }}>{{ $val }}</option>
                                        @endforeach
                                    </select>
                                    <select class="reservation-people__select" name="people">
                                        @foreach (config('pulldown.reservation_people') as $value => $label)
                                        <option value="{{ $value }}">{{ $label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="reservation__confirm">
                                    <table class="resevation__table">
                                        @foreach ($reservations as $reservation)
                                        <tr>
                                            <th>Shop</th>
                                            <td>{{ $restaurant->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>date</th>
                                            <td>{{ $reservation->reservation_date }}</td>
                                        </tr>
                                        <tr>
                                            <th>Time</th>
                                            <td>{{ $reservation->reservation_time }}</td>
                                        </tr>
                                        <tr>
                                            <th>Number</th>
                                            <td>{{ $reservation->people }}</td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="reservation__button">
                                    @if (Auth::check())
                                    <button class="reservation__button-submit" type="submit">
                                        予約する
                                    </button>
                                    @else
                                    <p class="login__message">予約するにはログインが必要です</p>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>