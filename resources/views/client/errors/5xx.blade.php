@extends('client.layouts.master')
@push('stylesAndScripts')
    @vite(['resources/css/app.css','resources/js/app.js'])
@endpush
@push('bodyStylesAndScripts')

@endpush
@section('content')
    YO
@endsection
