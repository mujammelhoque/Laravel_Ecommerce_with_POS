@extends('layout.main')
@section('title')
    Round-45 POS
@endsection
@section('style')
@endsection


@section('content')
   <h4 class="text-center"> Welcome to Round-45 OSPOS, click a module below to get started!</h4>
   <div class="row index">
       <div class="col-md-2 text-center my-3">
           <a  aria-current="page" href="{{url('/customer')}}">
               <img src="{{asset('assets/images/menubar/png/128px/contacts.png')}}" alt=""> <br>
               Customer</a>
       </div>
       <div class="col-md-2 text-center my-3">
           <a  aria-current="page" href="{{url('/items')}}">
               <img src="{{asset('assets/images/menubar/png/128px/shop.png')}}" alt=""> <br>
               Items</a>
       </div>
       <div class="col-md-2 text-center my-3">
           <a  aria-current="page" href="{{url('/itemkits')}}">
               <img src="{{asset('assets/images/menubar/png/128px/rocket.png')}}" alt=""> <br>
               Item Kits</a>
       </div>
       <div class="col-md-2 text-center my-3">
           <a  aria-current="page" href="{{url('/suppliers')}}">
               <img src="{{asset('assets/images/menubar/png/128px/toolbox.png')}}" alt=""> <br>
               Suppliers</a>
       </div>
       <div class="col-md-2 text-center my-3">
           <a  aria-current="page" href="{{url('/reports')}}">
               <img src="{{asset('assets/images/menubar/png/128px/barchart.png')}}" alt=""> <br>
               Reports</a>
       </div>
       <div class="col-md-2 text-center my-3">
           <a  aria-current="page" href="{{url('/receiving')}}">
               <img src="{{asset('assets/images/menubar/png/128px/dolly.png')}}" alt=""> <br>
               Receivings</a>
       </div>
       <div class="col-md-2 text-center my-3">
           <a  aria-current="page" href="{{url('/sales')}}">
               <img src="{{asset('assets/images/menubar/png/128px/cart.png')}}" alt=""> <br>
               Sales</a>
       </div>
       <div class="col-md-2 text-center my-3">
           <a  aria-current="page" href="{{url('/employees')}}">
               <img src="{{asset('assets/images/menubar/png/128px/profle.png')}}" alt=""> <br>
               Employees</a>
       </div>
       <div class="col-md-2 text-center my-3">
           <a  aria-current="page" href="{{url('/giftcards')}}">
               <img src="{{asset('assets/images/menubar/png/128px/heart.png')}}" alt=""> <br>
               Gift Cards</a>
       </div>
       <div class="col-md-2 text-center my-3">
           <a  aria-current="page" href="{{url('/messages')}}">
               <img src="{{asset('assets/images/menubar/png/128px/tablet.png')}}" alt=""> <br>
               Messages</a>
       </div>
       <div class="col-md-2 text-center my-3">
           <a  aria-current="page" href="{{url('/storeconfig')}}">
               <img src="{{asset('assets/images/menubar/png/128px/gear.png')}}" alt=""> <br>
               Store Config</a>
       </div>

   </div>

@endsection
@section('script')
@endsection
