<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ env('APP_NAME')}}</title>
    <link rel="stylesheet" href="{{ asset('css/admin/vendor.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/compiled.min.css') }}">
</head>
<body>
<div id="app" class="d-flex flex-wrap">
    <div class="sidenav">
        <div class="sidenav__label">Меню магазина</div>
        <a href="{{ route('admin.dashboard') }}" class="sidenav__item">
            <span><i class="fas fa-tools"></i> Панель приборов</span>
        </a>
        <a href="{{ route('admin.designers.index') }}" class="sidenav__item">
            <span><i class="fas fa-paint-roller"></i> Дизайнеры</span>
        </a>
        <a href="{{ route('admin.items.index') }}" class="sidenav__item">
            <span><i class="fas fa-tshirt"></i> Товары</span>
        </a>
        <a href="{{ route('admin.brands.index') }}" class="sidenav__item">
            <span><i class="fas fa-tag"></i> Бренды</span>
        </a>
        <a href="{{ route('admin.collections.index') }}" class="sidenav__item">
            <span><i class="far fa-clone"></i> Колекции</span>
        </a>

        <div class="sidenav__label">Страницы</div>
        <a href="{{ route('admin.settings.homepage') }}" class="sidenav__item">
            <span><i class="fas fa-home"></i> Главная страница</span>
        </a>
        <a href="{{ route('admin.pages.contacts') }}" class="sidenav__item">
            <span><i class="far fa-address-book"></i> Контакты</span>
        </a>

        <div class="sidenav__label">Пользователи</div>
        <a href="{{ route('admin.users.index', ['type' => 'all']) }}" class="sidenav__item">
            <span><i class="fas fa-user"></i> Все пользователи</span>
        </a>
        <a href="{{ route('admin.users.index', ['type' => 'vip']) }}" class="sidenav__item">
            <span><i class="fas fa-user-tag"></i> Пользователи VIP</span>
        </a>

        <div class="sidenav__label">Настройки</div>
        <a href="{{ route('admin.sizes.index') }}" class="sidenav__item">
            <span><i class="fas fa-sort-numeric-down"></i> Размера</span>
        </a>
        <a href="{{ route('admin.colors.index') }}" class="sidenav__item">
            <span><i class="fas fa-palette"></i> Цвета</span>
        </a>
        <a href="{{ route('admin.categories.index') }}" class="sidenav__item">
            <span><i class="fas fa-th"></i> Категории</span>
        </a>
    </div>
    <div class="content">
        <main class="p-4">
            @if(Session::has('message'))
                <div class="mb-5">
                    <div class="alert alert-{{ Session::get('message-type', 'info') }}">
                        {{ Session::get('message') }}
                    </div>
                </div>
            @endif
            @if(isset($header))
                <h1>{{ $header  }}</h1>
            @endif
            @yield('content')
        </main>
    </div>
</div>
<script src="{{ asset('js/admin/vendor.min.js') }}"></script>
<script src="{{ asset('js/admin/app.min.js') }}"></script>
@stack('script')
</body>

</html>