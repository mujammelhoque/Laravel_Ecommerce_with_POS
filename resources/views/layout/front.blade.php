@include('front/inc/header')

<!-- Header - start -->
<header class="header">
    @include('front/inc/topnav')
    @include('front/inc/middlenav')
    @include('front/inc/bottomnav')
</header>
<!-- Header - end -->


<!-- Main Content - start -->
<main>
    <section class="container">
        @yield('content')
    </section>
</main>
<!-- Main Content - end -->
@include('front/inc/footer')
