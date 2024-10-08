@extends('client.layouts.master')
@push('stylesAndScripts')
    @vite(['resources/css/client.css','resources/js/client.js'])
@endpush
@push('bodyStylesAndScripts')

@endpush
@section('content')
    <div class="flex flex-col justify-between h-screen">
        <main class="w-full pb-10">
            @include('client.layouts.fragments.header')
            <div class="max-w-screen-xl mx-auto flex flex-col w-full p-2">
                <div class="mb-4">
                    @include('client.layouts.fragments.pageTitleHeader')
                    @include('client.layouts.fragments.crumbs')
                </div>
                @yield('appContent')
            </div>
        </main>
        @include('client.layouts.fragments.footer')
    </div>
@endsection
