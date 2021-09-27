@extends('layout.front')
@section('style')

@endsection
@section('content')
    <div class="text-center bg-info"
        style="margin-bottom: 5px; height:200px; background-image: url({{ asset('uploads/banner.jpg') }})">
        <h1 style="font-size: 45px; padding-top: 67px; z-index:999;">SHOP</h1>
    </div>
    <div class="fr-pop-tab-cont">
        <h3 class="component-ttl" style="background-color: #eff1fa; padding:20px 0px 20px 15px; "><span>Popular
                products</span></h3>
        <div class="flexslider prod-items fr-pop-tab" id="frpoptab-tab-1">

            <ul class="slides">
                @foreach ($populer_products as $item)
                    <li class="prod-i">
                        <div class="prod-i-top">
                            <a href="{{ url('product/' . $item->id) }}" class="prod-i-img">
                                <!-- NO SPACE --><img style="width: 225px;" src="{{ asset('') . $item->baseimage }}"
                                    alt="Aspernatur excepturi rem"><!-- NO SPACE -->
                            </a>
                            <p class="prod-i-info">
                                <a href="{{ url('wishlist/' . $item->id) }}"
                                    class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                                    <a class="prod-i-qview" href="{{ route('add.cart',['id'=>$item->id]) }}"><span>Add to Cart</span><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                <a class="prod-i-compare" href="#"><span>Compare</span><i
                                        class="fa fa-bar-chart"></i></a>
                            </p>
                            <p class="prod-i-addwrap">
                                <a href="{{ url('product/' . $item->id) }}" class="prod-i-add">Go to detail</a>
                            </p>
                        </div>
                        <h3>
                            <a href="{{ url('product/' . $item->id) }}">{{ $item->name }}</a>
                        </h3>
                        <p class="prod-i-price">
                            <b>{{ $item->unit_price }}</b>
                        </p>

                    </li>

                @endforeach

            </ul>

        </div>
    </div>
    @foreach ($catwize_product as $item)
        <div class="fr-pop-tab-cont">
            <h3 class="component-ttl" style="background-color: #eff1fa; padding:20px 0px 20px 15px; ">
                <span>{{ $item->name }}
                    products</span>
            </h3>
            <div class="flexslider prod-items fr-pop-tab" id="frpoptab-tab-1">

                <ul class="slides">
                    @foreach ($item->item as $item)
                        <li class="prod-i">
                            <div class="prod-i-top">
                                <a href="{{ url('product/' . $item->id) }}" class="prod-i-img">
                                    <!-- NO SPACE --><img style="width: 225px;" src="{{ asset('') . $item->baseimage }}"
                                        alt="Aspernatur excepturi rem"><!-- NO SPACE -->
                                </a>
                                <p class="prod-i-info">
                                    <a href="{{ url('wishlist/' . $item->id) }}"
                                        class="prod-i-favorites"><span>Wishlist</span><i class="fa fa-heart"></i></a>
                                        <a class="prod-i-qview" href="{{ route('add.cart',['id'=>$item->id]) }}"><span>Add to Cart</span><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                                    <a class="prod-i-compare" href="#"><span>Compare</span><i
                                            class="fa fa-bar-chart"></i></a>
                                </p>
                                <p class="prod-i-addwrap">
                                    <a href="{{ url('product/' . $item->id) }}" class="prod-i-add">Go to detail</a>
                                </p>
                            </div>
                            <h3>
                                <a href="{{ url('product/' . $item->id) }}">{{ $item->name }}</a>
                            </h3>
                            <p class="prod-i-price">
                                <b>{{ $item->unit_price }}</b>
                            </p>

                        </li>

                    @endforeach

                </ul>

            </div>
        </div>
    @endforeach
@endsection

@section('script')
    Script Here
@endsection
