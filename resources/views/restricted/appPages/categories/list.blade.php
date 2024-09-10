@extends('restricted.layouts.app')

@section('appContent')
    <div class="grid grid-cols-12 sm:grid-cols-1 md:grid-cols-12 gap-2 ">
        <div class="col-span-12 md:col-span-5 lg:col-span-4 xl:col-span-3">
            <div class="block w-full p-2 bg-white border border-gray-200 rounded-md shadow dark:bg-gray-800 dark:border-gray-700">
                <form action="{{ route('app.dashboard.categories.form') }}" method="POST" class="relative p-2" id="reflectedForm">
                    <h1 class="formTitle text-gray-700 dark:text-white text-md font-bold border-b border-gray-200 dark:border-gray-700 py-2" data-form-title="Add New Category"></h1>
                    @csrf
                    @method('POST')
                    <input type="hidden" value="" name="id">
                    <div class="grid gap-2 grid-cols-1">
                        <div>
                            <label for="name" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="" placeholder="">
                        </div>
                        <div>
                            <label for="slug" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                            <input type="text" name="slug" id="slug" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="" placeholder="">
                        </div>
                        <div>
                            <label for="description" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <textarea name="description" id="description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2 border-t border-t-gray-300 dark:border-t-gray-700  py-2 justify-end mt-5">
                        <button type="button" class="hidden text-white bg-gray-700 hover:bg-gray-800 focus:ring-2 focus:outline-none focus:ring-gray-300 font-medium rounded-md text-sm p-2 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800" data-form-action="resetForm">
                            Cancel
                        </button>
                        <button type="button" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-2 focus:outline-none focus:ring-primary-300 font-medium rounded-md text-sm p-2 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 formSubmit">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-span-12 md:col-span-7 lg:col-span-8 xl:col-span-9">
            <div class="p-2 bg-white border border-gray-200 rounded-md shadow dark:bg-gray-800 dark:border-gray-700">
                @include('restricted.appPages.categories._table.filters')
                <div class="dataTables relative" data-source-api="{{ $api }}"></div>
            </div>
        </div>
    </div>
@endsection
