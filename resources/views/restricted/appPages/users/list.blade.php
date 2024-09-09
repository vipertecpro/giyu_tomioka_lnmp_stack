@extends('restricted.layouts.app')

@section('appContent')
    <div class="p-2 bg-white border border-gray-200 rounded-md shadow dark:bg-gray-800 dark:border-gray-700">
        @include('restricted.appPages.users._table.filters')
        <div class="dataTables relative" data-source-api="{{ $api }}"></div>
    </div>
@endsection
