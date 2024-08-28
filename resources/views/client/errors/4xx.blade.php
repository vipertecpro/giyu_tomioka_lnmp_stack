@extends('client.layouts.app')
@push('stylesAndScripts')
    @vite(['resources/css/app.css','resources/js/app.js'])
@endpush
@push('bodyStylesAndScripts')

@endpush
@section('appContent')
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="max-w-screen-xl flex justify-between mx-auto">
            <div class="mx-auto">
                <img src="{{ asset('assets/images/404_cat.gif') }}" class="w-screen" alt="404">
            </div>
        </div>
    </section>
@endsection
