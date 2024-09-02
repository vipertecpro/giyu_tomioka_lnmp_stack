<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ @$pageTitle }} {{ env('APP_NAME') ? ' | ' . env('APP_NAME') : '' }}</title>
    @stack('stylesAndScripts')
</head>
<body class="antialiased bg-gray-50 dark:bg-gray-900">
@yield('content')
@stack('bodyStylesAndScripts')
</body>
</html>
