@extends('client.layouts.master')
@push('stylesAndScripts')
    @vite(['resources/css/client.css','resources/js/client.js'])
@endpush
@push('bodyStylesAndScripts')

@endpush
@section('content')
    <div class="flex flex-col justify-between h-screen">
        <main class="w-full">
            @include('client.layouts.fragments.header')
            <div class="max-w-screen-xl mx-auto flex flex-col w-full">
                <div class="px-5 py-3  border-b border-gray-200 dark:border-gray-800">
                    <h1 class="inline-block mb-1 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white" id="content">Categories</h1>
                    <p class="mb-2 text-sm text-gray-600 dark:text-gray-400">Learn how to configure and build a dark mode switcher for Tailwind CSS using Flowbite and start developing with the components from the library</p>
                </div>
                <nav class="px-5 py-3 flex text-gray-700" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                        <li class="inline-flex items-center">
                            <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                                </svg>
                                Home
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                                <a href="#" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">Templates</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Flowbite</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <div class="px-5 py-3">
                    @yield('appContent')
                </div>
            </div>
        </main>
        @include('client.layouts.fragments.footer')
    </div>
@endsection
