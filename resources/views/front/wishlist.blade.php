@extends('layout.front')
@section('style')

@endsection
@section('content')
    <ul class="b-crumbs">
        <li>
            <a href="{{ url('/') }}">
                Home
            </a>
        </li>
        <li>
            <span>Wishlist</span>
        </li>
    </ul>
    <h1 class="main-ttl"><span>Wishlist</span></h1>
    <!-- Catalog Items | Full - start -->
    <div class="section-cont section-full">
        @forelse ($wishlists as $item)
            <div class="prod-items section-items">
                <div class="prod-i">
                    <div class="prod-i-top">
                        <a href="product.html" class="prod-i-img">
                            <!-- NO SPACE --><img src="{{ asset($item->item->baseimage) }}"
                                alt="Fuga impedit inciduntipsa"><!-- NO SPACE -->
                        </a>
                        <p class="prod-i-info">
                            <a href="{{ route('remove.wishlist', ['id' => $item->id]) }}"
                                class="prod-i-favorites"><span>Remove
                                    from Wishlist</span><i class="fa fa-remove"></i></a>
                            <a href="{{ url('product/' . $item->item->id) }}" class="qview-btn prod-i-qview"><span>Quick
                                    View</span><i class="fa fa-search"></i></a>
                        </p>
                        <a href="{{ route('add.cart', ['id' => $item->item->id]) }}" class="prod-i-buy">Add to
                            cart</a>
                        {{-- <div class="prod-sticker">
                            <p class="prod-sticker-3">-30%</p>
                            <p class="prod-sticker-4 countdown" data-date="29 Jan 2017, 14:30:00"></p>
                        </div> --}}
                    </div>
                    <h3>
                        <a href="{{ url('product/' . $item->item->id) }}">{{ $item->item->name }}</a>
                    </h3>
                    <p class="prod-i-price">
                        <b>{{ $item->item->unit_price }}</b>
                    </p>
                </div>
            </div>
        @empty
            <div class="text-center text-danger">No Wishlist Found</div>
        @endforelse


    </div>
    <!-- Catalog Items | Full - end -->

    <!-- Quick View Product - start -->
    <div class="qview-modal">
        <div class="prod-wrap">
            <a href="product.html">
                <h1 class="main-ttl">
                    <span>Reprehenderit adipisci</span>
                </h1>
            </a>
            <div class="prod-slider-wrap">
                <div class="prod-slider">
                    <ul class="prod-slider-car">
                        <li>
                            <a data-fancybox-group="popup-product" class="fancy-img"
                                href="{{ asset('front') }}/img/popup/1.jpg">
                                <img src="img/popup/1.jpg" alt="">
                            </a>
                        </li>
                        <li>
                            <a data-fancybox-group="popup-product" class="fancy-img"
                                href="{{ asset('front') }}/img/popup/2.jpg">
                                <img src="img/popup/2.jpg" alt="">
                            </a>
                        </li>
                        <li>
                            <a data-fancybox-group="popup-product" class="fancy-img"
                                href="{{ asset('front') }}/img/popup/3.jpg">
                                <img src="img/popup/3.jpg" alt="">
                            </a>
                        </li>
                        <li>
                            <a data-fancybox-group="popup-product" class="fancy-img"
                                href="{{ asset('front') }}/img/popup/4.jpg">
                                <img src="img/popup/4.jpg" alt="">
                            </a>
                        </li>
                        <li>
                            <a data-fancybox-group="popup-product" class="fancy-img"
                                href="{{ asset('front') }}/img/popup/5.jpg">
                                <img src="img/popup/5.jpg" alt="">
                            </a>
                        </li>
                        <li>
                            <a data-fancybox-group="popup-product" class="fancy-img"
                                href="{{ asset('front') }}/img/popup/6.jpg">
                                <img src="img/popup/6.jpg" alt="">
                            </a>
                        </li>
                        <li>
                            <a data-fancybox-group="popup-product" class="fancy-img"
                                href="{{ asset('front') }}/img/popup/7.jpg">
                                <img src="img/popup/7.jpg" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="prod-thumbs">
                    <ul class="prod-thumbs-car">
                        <li>
                            <a data-slide-index="0" href="wishlist.html#">
                                <img src="{{ asset('front') }}/img/popup/1.jpg" alt="">
                            </a>
                        </li>
                        <li>
                            <a data-slide-index="1" href="wishlist.html#">
                                <img src="{{ asset('front') }}/img/popup/2.jpg" alt="">
                            </a>
                        </li>
                        <li>
                            <a data-slide-index="2" href="wishlist.html#">
                                <img src="{{ asset('front') }}/img/popup/3.jpg" alt="">
                            </a>
                        </li>
                        <li>
                            <a data-slide-index="3" href="wishlist.html#">
                                <img src="{{ asset('front') }}/img/popup/4.jpg" alt="">
                            </a>
                        </li>
                        <li>
                            <a data-slide-index="4" href="wishlist.html#">
                                <img src="{{ asset('front') }}/img/popup/5.jpg" alt="">
                            </a>
                        </li>
                        <li>
                            <a data-slide-index="5" href="wishlist.html#">
                                <img src="{{ asset('front') }}/img/popup/6.jpg" alt="">
                            </a>
                        </li>
                        <li>
                            <a data-slide-index="6" href="wishlist.html#">
                                <img src="{{ asset('front') }}/img/popup/7.jpg" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="prod-cont">
                <p class="prod-actions">
                    <a href="wishlist.html#" class="prod-favorites"><i class="fa fa-heart"></i> Add to Wishlist</a>
                    <a href="wishlist.html#" class="prod-compare"><i class="fa fa-bar-chart"></i> Compare</a>
                </p>
                <div class="prod-skuwrap">
                    <p class="prod-skuttl">Color</p>
                    <ul class="prod-skucolor">
                        <li class="active">
                            <img src="{{ asset('front') }}/img/color/blue.jpg" alt="">
                        </li>
                        <li>
                            <img src="{{ asset('front') }}/img/color/red.jpg" alt="">
                        </li>
                        <li>
                            <img src="{{ asset('front') }}/img/color/green.jpg" alt="">
                        </li>
                        <li>
                            <img src="{{ asset('front') }}/img/color/yellow.jpg" alt="">
                        </li>
                        <li>
                            <img src="{{ asset('front') }}/img/color/purple.jpg" alt="">
                        </li>
                    </ul>
                    <p class="prod-skuttl">Sizes</p>
                    <div class="offer-props-select">
                        <p>XL</p>
                        <ul>
                            <li><a href="wishlist.html#">XS</a></li>
                            <li><a href="wishlist.html#">S</a></li>
                            <li><a href="wishlist.html#">M</a></li>
                            <li class="active"><a href="wishlist.html#">XL</a></li>
                            <li><a href="wishlist.html#">L</a></li>
                            <li><a href="wishlist.html#">4XL</a></li>
                            <li><a href="wishlist.html#">XXL</a></li>
                        </ul>
                    </div>
                </div>
                <div class="prod-info">
                    <p class="prod-price">
                        <b class="item_current_price">$238</b>
                    </p>
                    <p class="prod-qnt">
                        <input type="text" value="1">
                        <a href="wishlist.html#" class="prod-plus"><i class="fa fa-angle-up"></i></a>
                        <a href="wishlist.html#" class="prod-minus"><i class="fa fa-angle-down"></i></a>
                    </p>
                    <p class="prod-addwrap">
                        <a href="wishlist.html#" class="prod-add">Add to cart</a>
                    </p>
                </div>
                <ul class="prod-i-props">
                    <li>
                        <b>SKU</b> 05464207
                    </li>
                    <li>
                        <b>Manufacturer</b> Mayoral
                    </li>
                    <li>
                        <b>Material</b> Cotton
                    </li>
                    <li>
                        <b>Pattern Type</b> Print
                    </li>
                    <li>
                        <b>Wash</b> Colored
                    </li>
                    <li>
                        <b>Style</b> Cute
                    </li>
                    <li>
                        <b>Color</b> Blue, Red
                    </li>
                    <li><a href="wishlist.html#" class="prod-showprops">All Features</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Quick View Product - end -->
@endsection

@section('script')

@endsection
