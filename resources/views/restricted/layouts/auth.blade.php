@extends('restricted.layouts.master')
@push('stylesAndScripts')
    @vite(['resources/css/app.css','resources/js/app.js'])
@endpush
@push('bodyStylesAndScripts')

@endpush
@section('content')
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex flex-col items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-32 mr-2" src="{{ asset('assets/images/logo.jpg') }}" alt="logo">
                {{ env('APP_NAME') }}
            </a>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                @yield('authContent')
            </div>
        </div>
    </section>
@endsection
