<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Miljana Šmigić 234/15">
    <link rel="shortcut icon" href="{{ asset('/img/favicon.ico') }}">
    <link rel="icon" type="image/png" href="{{ asset('/img/favicon.ico') }}">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/') }}vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('/') }}css/modern-business.css" rel="stylesheet">
    <script src="{{asset('/')}}vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('/')}}js/imageModal.js"></script>

    @yield('head')

</head>