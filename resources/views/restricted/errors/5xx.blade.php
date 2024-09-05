@extends('restricted.layouts.master')
@push('stylesAndScripts')
    @vite(['resources/css/app.css','resources/js/app.js'])
@endpush
@push('bodyStylesAndScripts')

@endpush
@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="grid-cols-2 gap-8 content-center py-8 px-4 mx-auto max-w-screen-xl md:grid lg:py-16 lg:px-6 h-screen">
            <div class="self-center">
                <h1 class="mb-4 text-4xl font-bold text-primary-600 dark:text-primary-500">
                    {{ $pageTitle }}
                </h1>
                <p class="mb-4 text-sm tracking-tight font-bold text-gray-900 lg:mb-10 dark:text-white">
                    {{ $pageDescription }}
                </p>
                <a href="{{ url()->previous() }}" class="inline-block px-6 py-3 text-sm font-semibold text-white transition-colors duration-200 transform bg-primary-600 rounded-md hover:bg-primary-700 dark:bg-primary-500 dark:hover:bg-primary-600">
                    Previous
                </a>
                <a href="{{ route('app.dashboard.index') }}" class="inline-block px-6 py-3 text-sm font-semibold text-white transition-colors duration-200 transform bg-primary-600 rounded-md hover:bg-primary-700 dark:bg-primary-500 dark:hover:bg-primary-600">
                    Go back to dashboard
                </a>
            </div>
            <img class="mx-auto mb-4 md:flex" src="{{ asset('assets/images/500_cat.webp') }}" alt="500 Server Error">
        </div>
    </section>
@endsection
