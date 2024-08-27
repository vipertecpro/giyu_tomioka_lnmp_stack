@extends('client.layouts.master')
@push('stylesAndScripts')
    @vite(['resources/css/client.css','resources/js/client.js'])
@endpush
@push('bodyStylesAndScripts')

@endpush
@section('content')
    @include('client.layouts.fragments.header')
    @yield('appContent')
@endsection
