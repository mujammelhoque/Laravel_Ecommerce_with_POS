@extends('layout.front')
@section('title')
    Search by {{ $search }}
@endsection
@section('style')

@endsection
@section('content')
    <div style="text-align: center">
        <h4 style=""> Search By {{ $search }}</h4>
        <hr>
    </div>
    <div class="prod-items section-items">
        <ul class="slides">
            @forelse ($items as $item)
                <li class="prod-i">
                    <div class="prod-i-top">
                        <a href="{{ url('product/' . $item->id) }}" class="prod-i-img">
                            <!-- NO SPACE --><img style="width: 225px;" src="{{ asset('') . $item->baseimage }}"
                                alt="Aspernatur excepturi rem"><!-- NO SPACE -->
                        </a>
                        <p class="prod-i-info">
                            <a href="{{ url('wishlist/' . $item->id) }}" class="prod-i-favorites"><span>Wishlist</span><i
                                    class="fa fa-heart"></i></a>
                            <a class="prod-i-compare" href="index.html#"><span>Compare</span><i
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
            @empty
                <h3 style="color: red">No Product Found</h3>
            @endforelse

    </div>

@endsection

@section('script')

@endsection
