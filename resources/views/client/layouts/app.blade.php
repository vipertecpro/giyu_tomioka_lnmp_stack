@extends('client.layouts.master')
@push('stylesAndScripts')
    @vite(['resources/css/client.css','resources/js/client.js'])
@endpush
@push('bodyStylesAndScripts')

@endpush
@section('content')
    <div class="flex justify-between flex-col h-screen bg-gray-50 dark:bg-gray-900">
        <div>
            @include('client.layouts.fragments.header')
            <section>
                <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-20 lg:py-16 lg:grid-cols-12">
                    @yield('appContent')
                </div>
            </section>
        </div>
        @include('client.layouts.fragments.footer')
    </div>
@endsection
