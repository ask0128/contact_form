<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
  @yield('css')
  <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
  <title>Document</title>
</head>
<body style="height: 100%">
  <header class="header">
    <div class="header__inner">
      <div class="header__block">
        <a class="header__logo" href="/">
          FashionablyLate
        </a>
      </div>
      <div class="header__block">
        @if (Auth::check())
        <form action="/logout" method="post">
          @csrf
          <button class="header-nav__button">ログアウト</button>
        </form>
        @else
          @if (request()->route()->getName() == 'login')
          <form action="/register" method="get">
            @csrf
            <button class="header-nav__button">登録</button>
          </form>
          @elseif(request()->route()->getName() == 'register')
          <form action="/login" method="get">
            @csrf
            <button class="header-nav__button">ログイン</button>
          </form>
          @else
          @endif
        @endif
      </div>
    </div>
  </header>
  <main>
    @yield('content')
  </main>
    @yield('js')
</body>
</html>
