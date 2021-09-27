<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="{{ asset('favicon.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Round-45 Store @yield('title')</title>

    <link
        href="https://fonts.googleapis.com/css?family=PT+Serif:400,400i,700,700ii%7CRoboto:300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('front/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/ion.rangeSlider.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/ion.rangeSlider.skinFlat.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/jquery.bxslider.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/flexslider.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/media.css') }}">
    <link rel="stylesheet" href="{{ asset('front/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    @yield('style')

    @if (Request::segment(1) == 'shop')
        <style>
            .header {
                margin-bottom: 0;
            }

        </style>
    @endif
    @if (Request::segment(1) == 'storeconfig')
        <style>
            main {
                height: 100% !important;
            }

        </style>
    @endif



</head>

<body>
