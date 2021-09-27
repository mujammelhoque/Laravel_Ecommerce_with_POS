@extends('layout.main')
@section('title')
    Round-45 POS
@endsection
@section('style')
@endsection


@section('content')
    <h4 class="text-center">Welcome to Round-45 OSPOS, click a module below to get started!</h4>
    <div class="row index">
        @if (Auth::user()->role == 1)
        <div class="col-md-2 text-center my-3">
            <a aria-current="page" href="{{ url('/customer') }}">
                <img src="{{ asset('assets/images/icons/128/customer.png') }}" alt=""> <br>
                Customer</a>
        </div>
        @endif
        @if (Auth::user()->role == 1)
            <div class="col-md-2 text-center my-3">
                <a aria-current="page" href="{{ route('category.index') }}">
                    <img src="{{ asset('assets/images/icons/128/category.png') }}" alt=""> <br>
                    Category</a>
            </div>
        

        <div class="col-md-2 text-center my-3">
            <a aria-current="page" href="{{ url('/items') }}">
                <img src="{{ asset('assets/images/icons/128/item.png') }}" alt=""> <br>
                Items</a>
        </div>
        @endif
        @if (Auth::user()->role == 1)
        <div class="col-md-2 text-center my-3">
            <a aria-current="page" href="{{ url('/itemkits') }}">
                <img src="{{ asset('assets/images/icons/128/itemkits.png') }}" alt=""> <br>
                Item Kits</a>
        </div>
        @endif
        @if (Auth::user()->role == 1)
            <div class="col-md-2 text-center my-3">
                <a aria-current="page" href="{{ url('/suppliers') }}">
                    <img src="{{ asset('assets/images/icons/128/supplier.png') }}" alt=""> <br>
                    Suppliers</a>
            </div>
        @endif

        <div class="col-md-2 text-center my-3">
            <a aria-current="page" href="{{ url('/reports') }}">
                <img src="{{ asset('assets/images/icons/128/reports.png') }}" alt=""> <br>
                Reports</a>
        </div>

        <div class="col-md-2 text-center my-3">
            <a aria-current="page" href="{{ url('/receiving') }}">
                <img src="{{ asset('assets/images/icons/128/receiving.png') }}" alt=""> <br>
                Receivings</a>
        </div>
        <div class="col-md-2 text-center my-3">
            <a aria-current="page" href="{{ url('/sales') }}">
                <img src="{{ asset('assets/images/icons/128/sales.png') }}" alt=""> <br>
                Sales</a>
        </div>
        @if (Auth::user()->role == 1)
            <div class="col-md-2 text-center my-3">
                <a aria-current="page" href="{{ url('/employees') }}">
                    <img src="{{ asset('assets/images/icons/128/employees.png') }}" alt=""> <br>
                    Employees</a>
            </div>
        @endif
        @if (Auth::user()->role == 1)
            <div class="col-md-2 text-center my-3">
                <a aria-current="page" href="{{ url('/giftcards') }}">
                    <img src="{{ asset('assets/images/icons/128/giftcards.png') }}" alt=""> <br>
                    Gift Cards</a>
            </div>
        @endif
        <div class="col-md-2 text-center my-3">
            <a aria-current="page" href="{{ url('/messages') }}">
                <img src="{{ asset('assets/images/icons/128/messages.png') }}" alt=""> <br>
                Messages</a>
        </div>
        @if (Auth::user()->role == 1 )
            <div class="col-md-2 text-center my-3">
                <a aria-current="page" href="{{ url('/storeconfig') }}">
                    <img src="{{ asset('assets/images/icons/128/store.png') }}" alt=""> <br>
                    Store Config</a>
            </div>
        @endif
        @auth
            @if (Auth::user()->role == 1)
                <div class="col-md-2 text-center my-3">
                    <a aria-current="page" href="{{ url('/users') }}">
                        <img src="{{ asset('assets/images/menubar/png/128px/unlocked.png') }}" alt=""> <br>
                        Users Permission</a>
                </div>
                <div class="col-md-2 text-center my-3">
                    <a aria-current="page" href="{{ url('/weborder') }}">
                        <img src="{{ asset('assets/images/menubar/png/128px/global.png') }}" alt=""> <br>
                        Web Order</a>
                </div>
                <div class="col-md-2 text-center my-3">
                    <a aria-current="page" href="{{ url('/coupons') }}">
                        <img src="{{ asset('assets/images/menubar/png/128px/megaphone.png') }}" alt=""> <br>
                        Coupons</a>
                </div>
            @endif
        @endauth

    </div>

@endsection
@section('script')
@endsection
