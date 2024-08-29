<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ @$pageTitle }} {{ env('APP_NAME') ? ' | ' . env('APP_NAME') : '' }}</title>
    <meta name="description" content="{{ @$pageDescription ? ' | '.@$pageDescription : '' }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="{{ @$pageTitle }} {{ env('APP_NAME') ? ' | ' . env('APP_NAME') : '' }}">
    <meta property="og:description" content="{{ @$pageDescription }}">
    <meta property="og:image" content="{{ asset('assets/images/logo.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta name="twitter:card" content="{{ asset('assets/images/logo.jpg') }}">
    <meta name="twitter:title" content="{{ @$pageTitle }} {{ env('APP_NAME') ? ' | ' . env('APP_NAME') : '' }}">
    <meta name="twitter:description" content="{{ @$pageDescription }}">
    <meta name="twitter:image" content="{{ asset('assets/images/logo.jpg') }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="icon" href="{{ asset('assets/images/logo.jpg') }}" type="image/x-icon">
    <meta name="author" content="{{ env('APP_NAME') }}">
    <meta name="keywords" content="relevant, keywords, for, your, page">
    <meta name="language" content="English">
    <meta name="theme-color" content="#d97706">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/logo.jpg') }}">
    @stack('stylesAndScripts')
</head>
<body class="dark:bg-gray-900">
   @yield('content')
   @stack('bodyStylesAndScripts')
</body>
</html>
