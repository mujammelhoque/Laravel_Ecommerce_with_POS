<!-- Logo, Shop-menu - start -->
<div class="header-middle">
    <div class="container header-middle-cont">
        <div class="toplogo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('store.png') }} " alt="Round 45 Store">
            </a>
        </div>
        <div class="shop-menu">
            <ul>
                <li>
                    <a href="{{ url('/wishlist') }}">
                        <i class="fa fa-heart"></i>
                        <span class="shop-menu-ttl">Wishlist</span>
                        (<span id="topbar-favorites">
                            {{ count(\App\Models\Wishlist::where('user_id', \Auth::id())->get()) }}
                        </span>)
                    </a>
                </li>


                @auth
                    @if (Auth::user()->role == 2)
                        <li>
                            <a href="{{ url('/profile') }}">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span
                                    class="">Profile</span>
                </a>
            </li>
                
            @endif
                    <li>
                        <a style="
                                    color: #18bc9c" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endauth
                    @guest
                        <li class="topauth">
                            <a href="{{ route('register') }}">
                                <i class="fa fa-lock"></i>
                                <span class="shop-menu-ttl">Registration</span>
                            </a>
                            <a href="{{ route('login') }}">
                                <span class="shop-menu-ttl">Login</span>
                            </a>
                        </li>
                    @endguest
                    <li>
                        <div class="h-cart">
                            <a href="{{ url('/cart') }}">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="shop-menu-ttl">Cart</span>
                                (<b>{{ count(\App\Models\Cart::where('tempusertoken', Cookie::get('generate_cart_id'))->get()) }}</b>)
                            </a>
                        </div>
                    </li>

            </ul>
        </div>
    </div>
</div>
<!-- Logo, Shop-menu - end -->
