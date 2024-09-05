@extends('restricted.layouts.master')
@push('stylesAndScripts')
    @vite(['resources/css/app.css','resources/js/app.js'])
@endpush
@section('content')
    @include('restricted.layouts.appFragments.header')
    @include('restricted.layouts.appFragments.sidebar')
    <main class="md:ml-48 h-auto pt-14 bg-gray-50 dark:bg-gray-900">
        @include('restricted.layouts.appFragments.pageHeader')
        <div class="p-2">
            @yield('appContent')
        </div>
    </main>
@endsection
