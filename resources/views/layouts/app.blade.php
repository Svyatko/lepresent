<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/frontend/compiled.min.css') }}">

    <title>Main</title>
</head>

<body>
<div class="main feed-selections burger-1200">
    <header class="top-header">
        <div class="container">
            <nav class="flex-between">
                <div class="left">
                    <div class="logo">
                        <a href="">
                            <img src="{{ asset('img/logo.png') }}" alt="Le Present">
                        </a>
                    </div>

                    <div class="menu">
                        <ul class="inline-flex">
                            <li>
                                <p class="knop"><i class="fas fa-caret-down"></i>Women</p>
                                <div class="dropdown-menu">
                                    <a href="#">Men</a>
                                </div>
                            </li>
                            <li class="sub-menu-parent" tab-index="0">
                                <a href="#">New In</a>
                                <ul class="sub-menu">
                                    <li><a href="#">Dior</a></li>
                                    <li><a href="#">Valentino</a></li>
                                    <li><a href="#">Loewe</a></li>
                                    <li><a href="#">Loro Piana</a></li>
                                    <li class="margin-bottom"><a href="#">Rochas</a></li>
                                    <li><a href="#">Blasers</a></li>
                                    <li><a href="#">Glassses</a></li>
                                    <li><a href="#">Bags</a></li>
                                    <li class="margin-bottom"><a href="#">Shoes</a></li>
                                    <div class="img-wrap margin-bottom">
                                        <img src="img/catalog/cat8.jpg" alt="">
                                    </div>

                                    <li><a class="wrap" href="#">Valentino
                                            SS 2019</a></li>
                                </ul>
                            </li>

                            <li><a class="hover-link" href="#">Designers</a></li>

                            <li class="sub-menu-parent" tab-index="0">
                                <a href="#">Clothing</a>
                                <ul class="sub-menu">
                                    <li><a href="#">Dresses</a></li>
                                    <li><a href="#">Jackets & Coats</a></li>
                                    <li><a href="#">Jeans</a></li>
                                    <li><a href="#">Jumpsuits</a></li>
                                    <li><a href="#">Lingerie</a></li>
                                    <li><a href="#">Pants</a></li>
                                    <li><a href="#">Shorts</a></li>
                                    <li><a href="#">Skirts</a></li>
                                    <li><a href="#">Sweaters</a></li>
                                    <li><a href="#">Swimwear</a></li>
                                    <li><a href="#">Tops</a></li>
                                    <li class="margin-bottom"><a href="#">Blazers</a></li>
                                    <div class="img-wrap margin-bottom">
                                        <img src="img/catalog/cat2.jpg" alt="">
                                    </div>

                                    <li><a class="wrap" href="#">Valentino
                                            SS 2019</a></li>
                                </ul>
                            </li>

                            <li><a class="hover-link" href="#">Shoes</a></li>

                            <li><a class="hover-link" href="#">Bags</a></li>

                            <li class="sub-menu-parent" tab-index="0">
                                <a href="#">Accessories</a>
                                <ul class="sub-menu">
                                    <li><a href="#">Backpacks</a></li>
                                    <li><a href="#">Clutches & Pouches</a></li>
                                    <li><a href="#">Duffle & Top Handle Bags</a></li>
                                    <li><a href="#">Messenger Bags & Satchels</a></li>
                                    <li><a href="#">Shoulder Bags</a></li>
                                    <li class="margin-bottom"><a href="#">Tote Bags</a></li>
                                    <div class="img-wrap margin-bottom">
                                        <img src="img/catalog/bag2.jpg" alt="">
                                    </div>

                                    <li><a class="wrap" href="#">Valentino
                                            SS 2019</a></li>
                                </ul>
                            </li>

                            <li><a class="hover-link red-sale" href="#">Sale</a></li>

                            <li>
                                <div class="container-search">
                                    <input type="search" autocomplete="off" placeholder="Search" id="search"/>
                                </div>
                            </li>
                        </ul>
                    </div>

                </div>

                <div class="filter-block">
                    <select name="" id="">
                        <option selected>Sort</option>
                        <option>High to Low Price</option>
                        <option>Low to High Price</option>
                        <option>By Default</option>
                    </select>

                    <select name="" id="">
                        <option selected>Filter</option>
                        <option>All Clothing</option>
                    </select>
                </div>

                <div class="right flex-center">
                    <a class="hover-link" href="#">Bag</a>
                    <select class="lang-selector" name="" id="">
                        <option value="">Eng</option>
                        <option value="">Rus</option>
                    </select>

                    <a class="enter-cabinet flex-center" href="#">
                        <img src="img/keyhole.png" alt="">
                    </a>

                </div>

                <!-- burger menu -->
                <div class="burger">
                    <span></span>
                </div>

                <div class="hidden-menu">
                    <div class="logo">
                        <a href="">
                            <img src="img/logo.png" alt="Le Present">
                        </a>
                    </div>
                    <ul class="main">
                        <li><a href="#">Women</a></li>
                        <li><a href="#">Men</a></li>
                        <li>
                            <div class="sign">
                                <p>Sign In or Sign Up</p>
                                <div class="flex-center">
                                    <a href="#">Facebook</a>
                                    <a href="#">Google+</a>
                                </div>
                            </div>
                        </li>

                        <li>
                            <div class="enter-data">
                                <div class="input-wrap">
                                    <input type="email" placeholder="E-mail">
                                </div>
                                <div class="input-wrap"></div>
                                <input type="password" placeholder="Password">

                                <a href="#">Forgot your password?</a>
                            </div>
                        </li>

                        <li class="search-anim">
                            <div id="wrap">
                                <form action="#" autocomplete="off">
                                    <input id="search" name="search" type="text" placeholder="Search">
                                    <div class="relative flex-between">
                                        <select class="lang-selector" name="" id="">
                                            <option value="">Eng</option>
                                            <option value="">Rus</option>
                                        </select>
                                        <input id="search_submit" type="submit">
                                    </div>
                                </form>
                            </div>

                        </li>
                    </ul>
                </div>
                <div class="overlay"></div>
                <!-- burger menu -->
            </nav>
            @if(!request()->segment(2))
                <div class="bg-wide">
                    <div class="feed-wide" style="background: url('img/catalog_banner.jpg')center center no-repeat;
                        background-size: cover;">
                    </div>
                </div>

                <div class="bottom-catalog flex-between">
                    <div class="left-name">
                        <p> Spring Essentials</p>
                    </div>

                    <div class="descr-text flex-between">
                        <div class="desc">
                            <p>Valentino Garavani was born in Voghera, Italy, on May 11, 1932. Valentino studied fashion
                                design from a young age, completing his formal training in Paris and starting his own
                                line
                                in Rome in 1959. </p>
                        </div>

                        <div class="desc">
                            <p>By the mid-1960s, Valentino was a favorite designer of the world's best-dressed women.
                                Among
                                his signatures is a particular fabric shade, known as "Valentino red."</p>
                        </div>
                    </div>
                </div>

                <div class="breadcrumbs">
                    <ul>
                        <li><a href="#">Women</a></li>
                        <li><a href="#">Selections</a></li>
                        <li><a href="#">Spring Essentials</a></li>
                    </ul>
                </div>
            @endif
        </div>

    </header>

    @yield('content')

    <footer>
        <div class="container">
            <nav class="flex-between">
                <div class="left-nav">
                    <a class="logo-text" href="#">Le Present Store</a>
                    <ul>
                        <li><a href="#">Customer Care</a></li>
                        <li><a href="#">Delivery & Returns</a></li>
                        <li><a href="#">Payment</a></li>
                        <li><a href="#">Membership</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contacts</a></li>
                        <li><a href="#">Newsletters</a></li>
                    </ul>
                </div>

                <div class="right-nav">
                    <ul>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Cookie Policy</a></li>
                    </ul>

                    <div class="social">
                        <p class="follow">Follow us:</p>
                        <a href="#">Instagram</a>
                        <a href="#">Facebook</a>
                    </div>
                </div>
            </nav>
        </div>
    </footer>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="{{ asset('js/frontend/app.min.js') }}"></script>

</body>

</html>