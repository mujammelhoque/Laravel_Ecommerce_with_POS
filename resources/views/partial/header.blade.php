<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SOPOS - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/plugins/Datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    {{-- <link rel="stylesheet" href="{{asset('assets/plugins/css/daterangepicker.css')}}"> --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <style>
        main {
                height: 100%;
            }
        .flatly {
            background-color: gray;
        }

        .cosmo {
            background-color: rgb(238, 238, 238);
        }

        /* main {
            height: 67vh;
        } */

    </style>
    @if (Request::segment(2) == 'new_item' || Request::segment(1) == 'items' || Request::segment(1) == 'items' )
        <style>
            main {
                height: 100%;
            }

        </style>
    @endif
    @if (Request::segment(1) == 'suppliers' && Request::segment(2) == 'create')
        <style>
            main {
                height: 100%;
            }

        </style>
    @endif
    @if (Request::segment(1) == 'storeconfig')
        <style>
            main {
                height: 100%;
            }

        </style>
    @endif
    @if (Request::segment(1) == 'customer' && Request::segment(3) == 'edit')
        <style>
            main {
                height: 100%;
            }

        </style>
    @endif
    @yield('style')
</head>

<body class="{{ App\Models\Storeconfig::where('key', 'theme')->first()->value ?? '' }}">
