<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <meta name="format-detection" content="telephone=no">

    <link rel="apple-touch-icon" sizes="57x57" href="fav/apple-icon-57x57.png?v=11">
    <link rel="apple-touch-icon" sizes="60x60" href="fav/apple-icon-60x60.png?v=11">
    <link rel="apple-touch-icon" sizes="72x72" href="fav/apple-icon-72x72.png?v=11">
    <link rel="apple-touch-icon" sizes="76x76" href="fav/apple-icon-76x76.png?v=11">
    <link rel="apple-touch-icon" sizes="114x114" href="fav/apple-icon-114x114.png?v=11">
    <link rel="apple-touch-icon" sizes="120x120" href="fav/apple-icon-120x120.png?v=11">
    <link rel="apple-touch-icon" sizes="144x144" href="fav/apple-icon-144x144.png?v=11">
    <link rel="apple-touch-icon" sizes="152x152" href="fav/apple-icon-152x152.png?v=11">
    <link rel="apple-touch-icon" sizes="180x180" href="fav/apple-icon-180x180.png?v=11">
    <link rel="icon" type="image/png" sizes="192x192"  href="fav/android-icon-192x192.png?v=11">
    <link rel="icon" type="image/png" sizes="32x32" href="fav/fav-32x32.png?v=11">
    <link rel="icon" type="image/png" sizes="96x96" href="fav/fav-96x96.png?v=11">
    <link rel="icon" type="image/png" sizes="16x16" href="fav/fav-16x16.png?v=11">
    <link rel="manifest" href="fav/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png?v=11">

    <title>PT. ABC ERP</title>
    <meta name="keywords" content="MBSS ERP" />
    <meta name="description" content="MBSS ERP" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- select2 -->
    <link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">

    <!-- Custom css -->
    <link rel="stylesheet" href="{{ asset('css/kuiper.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mobile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">

    <!-- Javascript -->
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    @include('layouts.nav')

    @include('layouts.modal')
    @include('layouts.footer')

    <script type="text/javascript">
        $(document).ready(function() {
        })
    </script>
</body>