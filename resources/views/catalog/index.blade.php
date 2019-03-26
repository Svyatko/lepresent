@extends('layouts.app')

@section('content')
    <main>
        <section class="catalog">
            <div class="container">
                <div class="product-wrapper">
                    @foreach($products as $product)
                        <a href="{{ route('items.show', $product->id) }}" class="product">
                            <div class="img">
                                <img src="{{ $product->images()->first()->path }}" alt="">
                            </div>

                            <div class="info">
                                <p class="name">{{ $product->category->translate('ru')->name }}</p>
                                <p class="type">{{ $product->translate('ru')->name }}</p>
                                <p class="price"><span>$ {{ $product->price }}</span> ($ 1490)</p>
                            </div>
                        </a>
                    @endforeach


                    {{--<a href="#" class="product">--}}
                        {{--<div class="img">--}}
                            {{--<img src="img/catalog/cat2.jpg" alt="">--}}
                        {{--</div>--}}

                        {{--<div class="info">--}}
                            {{--<p class="name">Valentino</p>--}}
                            {{--<p class="type">Daughter Dress</p>--}}
                            {{--<p class="sale-price">$ 830</p>--}}
                        {{--</div>--}}
                    {{--</a>--}}

                    {{--<a href="#" class="product">--}}
                        {{--<div class="img">--}}
                            {{--<img src="img/catalog/cat3.jpg" alt="">--}}
                        {{--</div>--}}

                        {{--<div class="info">--}}
                            {{--<p class="name">Valentino</p>--}}
                            {{--<p class="type">Daughter Dress</p>--}}
                            {{--<p class="sale-price">$ 830</p>--}}
                        {{--</div>--}}
                    {{--</a>--}}

                    {{--<a href="#" class="product">--}}
                        {{--<div class="img">--}}
                            {{--<img src="img/catalog/cat4.jpg" alt="">--}}
                        {{--</div>--}}

                        {{--<div class="info">--}}
                            {{--<p class="name">Valentino</p>--}}
                            {{--<p class="type">Daughter Dress</p>--}}
                            {{--<p class="sale-price">$ 830</p>--}}
                        {{--</div>--}}
                    {{--</a>--}}

                    {{--<a href="#" class="product">--}}
                        {{--<div class="img">--}}
                            {{--<img src="img/catalog/cat5.jpg" alt="">--}}
                        {{--</div>--}}

                        {{--<div class="info">--}}
                            {{--<p class="name">Valentino</p>--}}
                            {{--<p class="type">Daughter Dress</p>--}}
                            {{--<p class="sale-price">$ 830</p>--}}
                        {{--</div>--}}
                    {{--</a>--}}

                    {{--<a href="#" class="product two-prod">--}}
                        {{--<div class="small-prod">--}}
                            {{--<div class="img">--}}
                                {{--<img src="img/catalog/bag1.jpg" alt="">--}}
                            {{--</div>--}}


                            {{--<div class="info">--}}
                                {{--<p class="name">Valentino</p>--}}
                                {{--<p class="type">Daughter Dress</p>--}}
                                {{--<p class="sale-price">$ 830</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="small-prod">--}}
                            {{--<div class="img">--}}
                                {{--<img src="img/catalog/bag2.jpg" alt="">--}}
                            {{--</div>--}}


                            {{--<div class="info">--}}
                                {{--<p class="name">Valentino</p>--}}
                                {{--<p class="type">Daughter Dress</p>--}}
                                {{--<p class="sale-price">$ 830</p>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</a>--}}

                    {{--<a href="#" class="product">--}}
                        {{--<div class="img">--}}
                            {{--<img src="img/catalog/cat6.jpg" alt="">--}}
                        {{--</div>--}}

                        {{--<div class="info">--}}
                            {{--<p class="name">Valentino</p>--}}
                            {{--<p class="type">Daughter Dress</p>--}}
                            {{--<p class="sale-price">$ 830</p>--}}
                        {{--</div>--}}
                    {{--</a>--}}

                    {{--<a href="#" class="product">--}}
                        {{--<div class="img">--}}
                            {{--<img src="img/catalog/cat2.jpg" alt="">--}}
                        {{--</div>--}}

                        {{--<div class="info">--}}
                            {{--<p class="name">Valentino</p>--}}
                            {{--<p class="type">Daughter Dress</p>--}}
                            {{--<p class="sale-price">$ 830</p>--}}
                        {{--</div>--}}
                    {{--</a>--}}

                    {{--<a href="#" class="product">--}}
                        {{--<div class="img">--}}
                            {{--<img src="img/catalog/cat3.jpg" alt="">--}}
                        {{--</div>--}}

                        {{--<div class="info">--}}
                            {{--<p class="name">Valentino</p>--}}
                            {{--<p class="type">Daughter Dress</p>--}}
                            {{--<p class="sale-price">$ 830</p>--}}
                        {{--</div>--}}
                    {{--</a>--}}

                    {{--<a href="#" class="product">--}}
                        {{--<div class="img">--}}
                            {{--<img src="img/catalog/cat4.jpg" alt="">--}}
                        {{--</div>--}}

                        {{--<div class="info">--}}
                            {{--<p class="name">Valentino</p>--}}
                            {{--<p class="type">Daughter Dress</p>--}}
                            {{--<p class="sale-price">$ 830</p>--}}
                        {{--</div>--}}
                    {{--</a>--}}

                    {{--<a href="#" class="product">--}}
                        {{--<div class="img">--}}
                            {{--<img src="img/catalog/cat7.jpg" alt="">--}}
                        {{--</div>--}}
                        {{--<div class="info">--}}
                            {{--<p class="name">Valentino</p>--}}
                            {{--<p class="type">Daughter Dress</p>--}}
                            {{--<p class="sale-price">$ 830</p>--}}
                        {{--</div>--}}
                    {{--</a>--}}
                </div>
            </div>
        </section>
    </main>
@endsection