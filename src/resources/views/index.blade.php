<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation_Service</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
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
                <a href="/" class="header__logo">
                    Rese
                </a>
            </div>
            <form class="form__inner" action="/search" method="get">
                @csrf
                <div class="form__right">
                    <select class="header__select" name="area" onchange="submit(this.form)">
                        <option value="">All area</option>
                        @foreach ($areas as $area)
                        <option value="{{ $area }}">{{ $area }}</option>
                        @endforeach
                    </select>
                    <select class="header__select" name="genre" onchange="submit(this.form)">
                        <option value="">All genre</option>
                        @foreach ($genres as $genre)
                        <option value="{{ $genre }}">{{ $genre }}</option>
                        @endforeach
                    </select>
                    <input class="search-form__item-input" type="text" name="keyword" value="" placeholder="Search…" onchange="submit(this.form)">
                </div>
            </form>
        </div>
    </header>

    <main>
        <div class="index">
            <div class="index__inner">
                <div class="flex__item">
                    @foreach ($restaurants as $restaurant)
                    <div class="restaurant__card">
                        <div class="restaurant__img">
                            <img src="{{ $restaurant->image }}" alt="">
                        </div>
                        <div class="restaurant__content">
                            <div class="restaurant__name">{{ $restaurant->name }}</div>
                            <div class="restaurant__tag">
                                <div class="area__tag">#{{ $restaurant->area }}</div>
                                <div class="category__tag">#{{ $restaurant->genre }}</div>
                            </div>
                            <div class="content__button">
                                <a href="{{ route('restaurant.show', ['restaurant_id' => $restaurant->id]) }}" class="index__detail-button">詳しくみる</a>
                                @if (Auth::check())
                                @if (Auth::user()->is_favorite($restaurant->id))
                                <form action="{{ route('favorite.destroy') }}" class="favorite-form" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
                                    <button class="heart-button favorited" type="submit">❤</button>
                                </form>
                                @else
                                <form action="{{ route('favorite.store') }}" class="favorite-form" method="post">
                                    @csrf
                                    <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
                                    <button class="heart-button" type="submit">❤</button>
                                </form>
                                @endif
                                @else
                                <form action="{{ route('favorite.store') }}" class="favorite-form" method="post" style="pointer-events: nonoe;">
                                    @csrf
                                    <input type="hidden" name="restaurant_id" value="{{ $restaurant->id }}">
                                    <button class="heart-button" type="submit" desabled>❤</button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
</body>

</html>