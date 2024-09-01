@extends('restricted.layouts.master')
@push('stylesAndScripts')
    @vite(['resources/css/app.css','resources/js/app.js'])
@endpush
@push('bodyStylesAndScripts')

@endpush
@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="grid-cols-2 gap-8 content-center py-8 px-4 mx-auto max-w-screen-xl md:grid lg:py-16 lg:px-6">
            <div class="self-center">
                <h1 class="mb-4 text-4xl font-bold text-primary-600 dark:text-primary-500">
                    Oops! Page Not Found
                </h1>
                <p class="mb-4 text-sm tracking-tight font-bold text-gray-900 lg:mb-10 dark:text-white">
                    It looks like the page you're looking for doesn't exist. It might have been moved or deleted. Please check the URL or return to the homepage.
                </p>
            </div>
            <img class="mx-auto mb-4 md:flex" src="{{ asset('assets/images/404_cat_1.gif') }}" alt="500 Server Error">
        </div>
    </section>
@endsection
