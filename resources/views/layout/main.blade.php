@include('partial.header')
{{--Nav Bar--}}
@include('partial.nav')
{{--Nav Bar End--}}
<main class="my-5">
    <div class="container">
        @yield('content')
    </div>
</main>


@include('partial.footer')
