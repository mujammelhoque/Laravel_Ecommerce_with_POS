{{-- Nav Bar --}}
<div class="container-fluid bg-dark text-white">
    <div class="container">
        <div class="top-menu d-flex justify-content-between">
            <div class="left-top clocl-padding"> {{ Carbon\Carbon::now()->format('Y/m/d') }} <span id="span"></span>
            </div>
            {{-- <div class="top-left  clock-padding">
                Round-45 POS | Mananf | <a style="color: #18bc9c;" href="#">Logout</a>
            </div> --}}
            <div class="top-left  clock-padding">
                <a href="#">{{ Auth::user()->name }}</a> |
                <a class="" href=" {{ route('logout') }}" onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>

        </div>
    </div>
</div>
<div class="container-fluid main-nav">
    <div class="container">
        <nav class="navbar navbar-expand-lg main-nav py-0">
            <div class="container-fluid">
                <a id="logo" class="navbar-brand" href="{{ url('/dashboard') }}">

                    @php
                        $company_logo = \App\Models\Storeconfig::where('key', 'companylogo')->first();
                        $company_name = \App\Models\Storeconfig::where('key', 'company')->first();
                        // echo $company_logo;
                    @endphp
                    @if ($company_logo->value)
                        {{-- {{ $company_logo->value }} --}}
                        <img width="52px" height="51px" src="{{ asset('uploads/logo/' . $company_logo->value) }}"
                            alt="" srcset="">
                    @elseif ($company_name->value)
                        {{ $company_name->value }}
                    @else
                        R45-POS
                    @endif


                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                </button>
                <div class="float-end collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-5">
                        @if (Auth::user()->role == '1')
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'customer' ? 'active' : '' }}"
                                aria-current="page" href="{{ url('/customer') }}">
                                <img src="{{ asset('assets/images/icons/64/customer.png') }}" alt=""> <br>
                                Customer</a>
                        </li>
                        @endif
                        @if (Auth::user()->role == '1')
                            <li class="nav-item">
                                <a class="nav-link {{ Request::segment(1) == 'category' ? 'active' : '' }}"
                                    aria-current="page" href="{{ route('category.index') }}">
                                    <img src="{{ asset('assets/images/icons/64/categories-988842.png') }}" alt="">
                                    <br>
                                    Category</a>
                            </li>

                        @endif
                        @if (Auth::user()->role == '1')
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'items' ? 'active' : '' }}"
                                aria-current="page" href="{{ url('/items') }}">
                                <img src="{{ asset('assets/images/icons/64/items.png') }}" alt=""> <br>
                                Items</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'itemkits' ? 'active' : '' }}"
                                aria-current="page" href="{{ url('/itemkits') }}">
                                <img src="{{ asset('assets/images/icons/64/item_kits.png') }}" alt=""> <br>
                                Item Kits</a>
                        </li>
                        @endif
                        @if (Auth::user()->role == '1')
                            <li class="nav-item">
                                <a class="nav-link {{ Request::segment(1) == 'suppliers' ? 'active' : '' }}"
                                    aria-current="page" href="{{ url('/suppliers') }}">
                                    <img src="{{ asset('assets/images/icons/64/suppliers.png') }}" alt=""> <br>
                                    Suppliers</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'reports' ? 'active' : '' }}"
                                aria-current="page" href="{{ url('/reports') }}">
                                <img src="{{ asset('assets/images/icons/64/reports.png') }}" alt=""> <br>
                                Reports</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'receiving' ? 'active' : '' }}"
                                aria-current="page" href="{{ url('/receiving') }}">
                                <img src="{{ asset('assets/images/icons/64/receivings.png') }}" alt=""> <br>
                                Receiving</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'sales' ? 'active' : '' }}"
                                aria-current="page" href="{{ url('/sales') }}">
                                <img src="{{ asset('assets/images/icons/64/sales.png') }}" alt=""> <br>
                                Sales</a>
                        </li>
                        @if (Auth::user()->role == '1')
                            <li class="nav-item">
                                <a class="nav-link {{ Request::segment(1) == 'employees' ? 'active' : '' }}"
                                    aria-current="page" href="{{ url('/employees') }}">
                                    <img src="{{ asset('assets/images/icons/64/employees.png') }}" alt=""> <br>
                                    Employees</a>
                            </li>
                        @endif
                        @if (Auth::user()->role == 1)
                            <li class="nav-item">
                                <a class="nav-link {{ Request::segment(1) == 'giftcards' ? 'active' : '' }}"
                                    aria-current="page" href="{{ url('/giftcards') }}">
                                    <img src="{{ asset('assets/images/icons/64/giftcards.png') }}" alt=""> <br>
                                    Gift Cards</a>
                            </li>
                        @endif
                        
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'messages' ? 'active' : '' }}"
                                aria-current="page" href="{{ url('/messages') }}">
                                <img src="{{ asset('assets/images/icons/64/messages.png') }}" alt=""> <br>
                                Messages</a>
                        </li>
                        
                        @if (Auth::user()->role == 1)
                        <li class="nav-item">
                            <a class="nav-link {{ Request::segment(1) == 'storeconfig' ? 'active' : '' }}"
                                aria-current="page" href="{{ url('/storeconfig') }}">
                                <img src="{{ asset('assets/images/icons/64/config.png') }}" alt=""> <br>
                                Store Config</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
{{-- Nav Bar End --}}
