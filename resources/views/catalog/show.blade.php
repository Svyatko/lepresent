@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="product-wrapper-main">
                <div class="product-img flex-center">
                    <div class="main-image">
                        <img src="{{ $item->images()->first()->path }}" alt="">
                    </div>

                    <div class="list-images small-gallery">
                        @foreach($item->images as $image)
                            <div class="image clicked">
                                <img src="{{ $image->path }}" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="product-descr">
                    <div class="top">
                        <div class="special">
                            <p>A.P.C. ATELIER </p>
                            <p>DE PRODUCTION ET DE CRÉATION</p>
                        </div>

                        <div class="price-p">
                            <p>Panther-print silk-cady dress</p>
                            <p class="price"><span>€{{ $item->price }} </span> (€249)</p>
                        </div>
                    </div>

                    <div class="center">

                        {{--<a href="#" class="btn-primary">Added to bag</a>--}}

                        <div class="sizes ">
                            <div class="flex-between">
                                <div class="product-sizes flex-center ">
                                    @foreach($item->sizes as $size)
                                        <button class="button-reset @if($loop->iteration == 1) active-btn @endif" type="button">{{ $size->size }}</button>
                                    @endforeach
                                    {{--<button class="button-reset active-btn" type="button">34</button>--}}

                                    {{--<button class="button-reset" type="button">36</button>--}}

                                    {{--<button class="button-reset" type="button">38</button>--}}

                                    {{--<button class="button-reset not-available" type="button">40</button>--}}

                                    {{--<button class="button-reset" type="button">42</button>--}}
                                </div>

                                <a href="#">Size & Fit</a>
                            </div>

                            <p class="last-size">Look’s like it’s the last one <i class="far fa-frown"></i></p>
                        </div>


                    </div>

                    <div class="bottom">
                        <div>
                            <p class="margin-bottom">{{ $item->translate('ru')->text }}</p>

                            <p> Collection: <a class="active-href" href="">Pre-Fall '17</a> </p>

                            <a class="scroll-down" href="#scroll-to">Scroll down</a>
                        </div>

                        <div>
                            {!!  $item->translate('ru')->character !!}
                            {{--<p>Length (cm): 100</p>--}}
                            {{--<p>Black printed</p>--}}
                            {{--<p>Cady (100% silk)</p>--}}
                            {{--<p> Unlined</p>--}}
                            {{--<p>Hook-and-bar, zip</p>--}}
                            {{--<p>Crêpe</p>--}}
                            {{--<p>Single button cuffs</p>--}}
                            {{--<p>Long sleeves</p>--}}
                            {{--<p>Dry clean</p>--}}
                            {{--<p class="margin-bottom">Made in Italy</p>--}}
                            {{--<p>Style ID: 816811</p>--}}
                        </div>


                        <div class="third-column">
                            <a class="active-href" href="#">Shop the Look
                                You may also like
                                Valentino</a>
                            <a href="#">All</a>
                            <a href="#">Shoes</a>
                            <a href="#">Dresses</a>
                            <a href="#">Bags</a>
                            <a class="margin-bottom" href="#">Sale</a>
                            <a class="active-href" href="#">Returns & Delivery</a>
                            <a class="active-href" href="#">Contacts</a>
                            <a class="active-href" href="#">Share</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection