@extends('restricted.layouts.app')

@section('appContent')
    <div class="p-2 bg-white border border-gray-200 rounded-md shadow dark:bg-gray-800 dark:border-gray-700 relative">
        @include('restricted.appPages.users._table.filters')
        <div id="dataTables" data-source-api="{{ $api }}"></div>
        <div id="loadingSpinner" class="flex justify-center items-center p-4">
            <svg class="animate-spin h-5 w-5 text-gray-800 dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
            </svg>
        </div>
    </div>
@endsection
